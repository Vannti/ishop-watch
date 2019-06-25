<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CurrencyRequest;
use App\Models\Category;
use App\Models\Currency;
use App\Http\Controllers\Controller;


class CurrencyController extends Controller
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
        $currencies = Currency::orderBy('id')->paginate(5);
        return view('admin.currency.index', [
            'currencies' => $currencies
        ]);
    }

    public function create(CurrencyRequest $request)
    {
        $currency = Currency::create([
            'title' => $request->get('title'),
            'code' => $request->get('code'),
            'symbol' => $request->get('symbol'),
            'value' => $request->get('value')
        ]);

        if (!$currency){
            return redirect()->back();
        }

        session()->flash('flash_message', "Currency {$request->get('title')} created");
        return redirect()->back();
    }

    public function edit($id){
        $currency = Currency::findOrFail($id);

        return view('admin.currency.edit', [
            'currency' => $currency
        ]);
    }

    public function update(CurrencyRequest $request, $id)
    {
        $currency = Currency::findOrFail($id);
        $currency->fill($request->all());

        if(!$currency->save()){
            return redirect()->back()->withErrors('Update Error');
        }

        session()->flash('flash_message', "Category {$currency->title} updated");
        return redirect()->route('admin.currencies');
    }

    public function delete($id){
        $currency = Currency::findOrFail($id);

        if (!$currency->delete()){
            return redirect()->back()->withErrors('Delete Error');
        }

        session()->flash('flash_message', 'Currency deleted');
        return redirect()->back();
    }
}
