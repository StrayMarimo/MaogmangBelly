<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Show all products and categories on the products page.
     *
     * @return View - the products view.
     */
    function getProducts()
    {
        $isAdmin = false;
        $user = Auth::user();

        // check if user is an admin
        if ($user != null) {
            if ($user->is_admin) {
                $isAdmin = true;
            }
        }

        // retrieve all products and categories
        $products = Product::all();
        $categories = Category::all();

        $featured_products = Product::where('is_featured', true)->get();
        $trending_products = Product::where('is_trending', true)->get();

        // return the products view with all the products and categories, and the isAdmin flag
        return view('layouts.products.products', [
            'products' => $products,
            'categories' => $categories,
            'isAdmin' => $isAdmin,
            'featured_products' => $featured_products,
            'trending_products' => $trending_products
        ]);
    }

    /**
     * Show the details of a specific product.
     *
     * @param int $id - the ID of the product.
     * @return View - the details view.
     */
    function getProduct(Request $req)
    {
        // get the product with the given ID
        $data = Product::find($req->id);

        // get the category of the product
        $cat_id = $data['category_id'];
        $category = Category::find($cat_id);

        // return the details view with the product and category information
        return view('layouts.products.details', ['product' => $data, 'category' => $category]);
    }


    /**
     * Search for products based on user input.
     *
     * @param Request $req - the HTTP request containing the user input.
     * @return View - the search view with the matching products.
     */
    function searchProducts(Request $req)
    {
        $query = $req->input('query');

        // retrieve all products whose names contain the search query
        $products = Product::where('name', 'like', '%' . $query . '%')->get();

        // return search results view
        return view('layouts.search.search', ['products' => $products]);
    }

    /**
     * Add a new product to the database.
     *
     * @param  Request  $req  The HTTP request containing the new product's info.
     * @return RedirectResponse  A redirect back to the products page.
     */
    function addProduct(Request $req)
    {

        // return dd($req->all());
        // get the filename of image uploaded
        $filename = $req->img->getClientOriginalName();

        // store in public folder
        $req->img->move(public_path('assets/product_assets/'), $filename);

        // Create a new Product object and set its data
        $product = new Product;
        $product->name = $req->product_name;
        $product->description = $req->product_desc;
        $product->price = $req->product_price;
        $product->price_10pax = $req->product_price_10;
        $product->price_20pax = $req->product_price_20;
        $product->stock = $req->product_stock;
        $product->gallery = $filename;
        $product->total_sold = 0;
        $product->category_id = $req->category_id;
        $product->is_trending = $req->has('is_trending');
        $product->is_featured = $req->has('is_featured');

        // Save the new product to the database
        $product->save();

        // Redirect back to the products page
        return redirect("/products");
    }

    function deleteProduct(Request $req)
    {
        return dd("Under Construction");
    }

     function updateProduct(Request $req)
    {
        return dd("Under Construction");
    }
}
