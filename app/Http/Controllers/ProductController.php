<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View | RedirectResponse
    {
        $product = Product::findOrFail($id);
        #if (isset($product)) {
            $viewData = [];
            $viewData['title'] = $product['name'].' - Online Store';
            $viewData['subtitle'] = $product['name'].' - Product information';
            $viewData['product'] = $product;

            return view('product.show')->with('viewData', $viewData);
        #} else {
            #return redirect()->route('home.index');
        #}
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:10',
            'price' => 'required|numeric|min:0',
        ]);
        /**$viewData = [];
        $viewData['title'] = 'Exito';
        $viewData['subtitle'] = 'yeeeeeeeeeiiiiiiii';
        $viewData['name'] = $_POST['name'];*/
        Product::create($request->only(["name","price"]));
        return back();
        //return view('product.saved')->with('viewData', $viewData);
        //dd($request->all());
    }

    public function saved($name): View
    {
        $viewData = [];
        $viewData['title'] = 'Exito';
        $viewData['subtitle'] = 'yeeii';
        $viewData['name'] = $name;

        return view('product.saved')->with('viewData', $viewData);
    }
}
