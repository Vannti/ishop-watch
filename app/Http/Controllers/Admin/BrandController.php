<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;

class BrandController extends Controller
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
        $brands = Brand::orderBy('id')->paginate(5);
        return view('admin.brand.index', [
            'brands' => $brands
        ]);
    }

    public function create(BrandRequest $request)
    {
        $img_name = $_FILES['img']['name'];
        if (!$img_name){
            $img_name = 'no_image.jpg';
        }

        $brand = Brand::create([
            'title' => $request->get('title'),
            'alias' => $request->get('alias'),
            'img' => $img_name,
            'description' => $request->get('description')
        ]);

        if (!$brand){
            return redirect()->back();
        }

        session()->flash('flash_message', "Brand {$request->get('title')} created");
        return redirect()->route('admin.brands');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brand.edit', [
            'brand' => $brand
        ]);
    }

    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->fill($request->all());

        if(!$brand->save()){
            return redirect()->back()->withErrors('Update Error');
        }

        session()->flash('flash_message', "Brand {$brand->title} updated");
        return redirect()->route('admin.brands');
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);

        if (!$brand->delete()){
            return redirect()->back()->withErrors('Delete Error');
        }

        session()->flash('flash_message', 'Brand deleted');
        return redirect()->back();
    }
}
