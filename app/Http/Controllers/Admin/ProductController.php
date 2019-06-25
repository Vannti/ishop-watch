<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::orderBy('id')->paginate(5);
        return view('admin.product.index', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    public function create(ProductRequest $request)
    {
        $img_name = $_FILES['img']['name'];
        if (!$img_name){
            $img_name = 'no_image.jpg';
        }

        try {
            $product = Product::create([
                'title' => $request->get('title'),
                'brand_id' => $request->get('brand_id'),
                'alias' => $request->get('alias'),
                'content' => $request->get('content'),
                'price' => $request->get('price'),
                'old_price' => $request->get('old_price'),
                'status' => $request->get('status'),
                'keywords' => $request->get('keywords'),
                'description' => $request->get('description'),
                'img'   => $img_name,
                'hit' => $request->get('hit')
            ]);
        }
        catch (\Exception $ex){
            return redirect()->back()->withErrors('Add error');
        }

        if (!$product){
            return redirect()->back()->withErrors('Add error');
        }

        // Attach category to Categories_Products
        $category_ids = $request->get('categories');
        foreach ($category_ids as $category_id){
            $category = Category::where('id', (int)$category_id)->first();
            $product->categories()->attach($category);
        }

        session()->flash('flash_message', "Product {$request->get('title')} created");
        return redirect()->route('admin.products');
    }

    public function edit($id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        try{
            $product->fill($request->all());
        }
        catch(\Exception $ex){
            return redirect()->back()->withErrors('Update error');
        }

        if(!$product->save()){
            return redirect()->back()->withErrors('Update Error');
        }

        // Detach categories from Categories_Products
        $categories = Category::All();
        for ($id=1; $id<=count($categories); $id++){
            $category = Category::where('id', $id)->first();
            $product->categories()->detach($category);
        }

        // Attach category to Categories_Products
        $category_ids = $request->get('categories');
        if ($category_ids){
            foreach ($category_ids as $category_id){
                $category = Category::where('id', (int)$category_id)->first();
                $product->categories()->attach($category);
            }
        }

        session()->flash('flash_message', "Product {$product->title} updated");
        return redirect()->route('admin.products');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        if (!$product->delete()){
            return redirect()->back()->withErrors('Delete Error');
        }

        session()->flash('flash_message', "Product {$product->title} deleted");
        return redirect()->back();
    }
}
