<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:add-content');
        $this->middleware('can:edit-content');
        $this->middleware('can:delete-content');
    }

    public function index()
    {
        $users = User::orderBy('id')->paginate(5);
        return view('admin.user.index', [
            'users' => $users,
        ]);
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::where('id', $id)->first();
        return view('admin.user.edit', [
            'roles' => $roles,
            'user' => $user
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        try{
            $user->login = $request->get('login');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
        }
        catch(\Exception $ex){
            return redirect()->back()->withErrors('Update error');
        }

        if(!$user->save()){
            return redirect()->back()->withErrors('Update Error');
        }

        // Detach categories from Categories_Products
        $roles = Role::All();
        for ($id=1; $id<=count($roles); $id++){
            $role = Role::where('id', $id)->first();
            $user->roles()->detach($role);
        }

        // Attach category to Categories_Products
        $roles_ids = $request->get('roles');
        if ($roles_ids){
            foreach ($roles_ids as $role_id){
                $role = Role::where('id', (int)$role_id)->first();
                $user->roles()->attach($role);
            }
        }

        session()->flash('flash_message', "User {$user->login} updated");
        return redirect()->route('admin.users');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        if (!$user->delete()){
            return redirect()->back()->withErrors('Delete Error');
        }

        session()->flash('flash_message', "User {$user->login} deleted");
        return redirect()->back();
    }
}
