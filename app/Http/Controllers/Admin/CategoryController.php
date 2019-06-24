<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
        $categories = Category::orderBy('id')->paginate(5);
        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    public function create(CategoryRequest $request)
    {
        $category = Category::create([
            'title' => $request->get('title'),
            'alias' => $request->get('alias'),
            'keywords' => $request->get('keywords'),
            'description' => $request->get('description')
        ]);

        if (!$category){
            return redirect()->back();
        }

        session()->flash('flash_message', "Category {$request->get('title')} created");
        return redirect()->back();
    }

    public function edit($id){
        $category = Category::findOrFail($id);

        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->fill($request->all());

        if(!$category->save()){
            return redirect()->back()->withErrors('Update Error');
        }

        session()->flash('flash_message', "Category {$category->title} updated");
        return redirect()->route('admin.categories');
    }

    public function delete($id){
        $category = Category::findOrFail($id);

        if (!$category->delete()){
            return redirect()->back()->withErrors('Delete Error');
        }

        session()->flash('flash_message', 'Category deleted');
        return redirect()->back();
    }
}
