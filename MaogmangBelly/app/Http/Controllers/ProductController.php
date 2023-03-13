<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    //

    function index() 
    {
        $data= Product::all();
        return view('products', ['products'=>$data]);
    }

    function details($id)
    {
        $data = Product::find($id);
        $cat_id = $data['category_id'];
        $category = Category::find($cat_id);
        return view('details', ['product'=>$data, 'category'=>$category]);
    }

}
