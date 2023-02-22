<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public static $products = [
        ["id"=>"1", "name"=>"TV", "description"=>"Best TV","price"=>"500"],
        ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone","price"=>"3500"],
        ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast","price"=>"3500"],
        ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses","price"=>"3500"]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View
    {
        if(array_key_exists($id, ProductController::$products)) {
            $viewData = [];
            $product = ProductController::$products[$id-1];
            $viewData["title"] = $product["name"]." - Online Store";
            $viewData["subtitle"] =  $product["name"]." - Product information";
            $viewData["product"] = $product;
            return view('product.show')->with("viewData", $viewData);
        } else {
            return view('home.index');
        }
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";
        
        return view('product.create')->with("viewData",$viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:10",
            "price" => "required|numeric|min:0"
        ]);
        $viewData = [];
        $viewData["title"] = "Exito";
        $viewData["subtitle"] = "yeeeeeeeeeiiiiiiii";
        $viewData["name"] = $_POST["name"];
        return view('product.saved')->with("viewData",$viewData);
        //dd($request->all());
        //$id = str(count(self::$products)+1);
        //self::addProduct($_POST['name'],$_POST['price']);
        //self::saved($_POST['name']);
    }

    public function addProduct($name, $price)
    {
        $product = ["id"=>str(count(self::$products)+1), "name"=>$name, "description"=>"Lorem ipsum","price"=>$price];
        array_push(self::$products, $product);
    }

    public function saved($name)
    {
        $viewData = [];
        $viewData["title"] = "Exito";
        $viewData["subtitle"] = "yeeii";
        $viewData["name"] = $name;
        return view('product.saved')->with("viewData",$viewData);
    }
}

?>