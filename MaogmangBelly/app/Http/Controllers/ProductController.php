<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Show all products and categories on the products page.
     *
     * @return View - the products view.
     */
    public function index()
    {
        $user = Auth::user();
        return view('layouts.products.products', [
            'products' => Product::all(),
            'categories' => Category::all(),
            'isAdmin' => $user != null && $user->is_admin,
            'featured_products' => Product::featured(),
            'trending_products' => Product::trending()
        ]);
    }

    /**
     * Show the details of a specific product.
     *
     * @param int $id - the ID of the product.
     * @return JSON|View  - containing the product details
     */
    public function show(Request $req)
    {
        $product = Product::find($req->product);
        if ($req->ajax()) return response()->json($product);
        return view('layouts.products.details', 
            ['product' => $product, 'category' => $product->category]);
    }


    /**
     * Search for products based on user input.
     *
     * @param Request $req - the HTTP request containing the user input.
     * @return View - the search view with the matching products.
     */
    public function search(Request $req)
    {
        return view('layouts.search.search', 
            ['products' => Product::ofPattern($req->input('query'))]);
    }

    /**
     * Add a new product to the database.
     *
     * @param  Request  $req  The HTTP request containing the new product's info.
     * @return RedirectResponse  A redirect back to the products page.
     */
    public function store(Request $req)
    {
        $filename= ""; 
        // get the filename of image uploaded
        if($req->img)
        {
            $filename = $req->img->getClientOriginalName();
            // store in public folder
            $req->img->move(public_path('assets/product_assets/'), $filename);
        }

        // Create a new product object and set its data
        $product = Product::create([
            'name' =>  $req->product_name,
            'description' => $req->product_desc,
            'price' => $req->product_price,
            'price_10pax' => $req->product_price_10,
            'price_20pax' =>  $req->product_price_20,
            'stock' => $req->product_stock,
            'gallery' => $filename,
            'category_id' => $req->category_id,
            'is_trending' => $req->has('is_trending'),
            'is_featured' => $req->has('is_featured')
        ]);

        return redirect()->route('product.index')->with($this->retSession(
            ($product ? 'added ' : "adding ") . $req->product_name, 
            $product != null));
    }

    /**
     * deletes a product
     * @param int id of product to be deleted
     * @return RedirectResponse to products tab with a session message
     * indicating whether the product was successfully deleted or not 
     */
    public function destroy(int $id)
    {
        // gets name of the product
        $name = Product::find($id)['name'];

        // deletes the product
        $rowDeleted = Product::destroy($id);

        return redirect()->route('product.index')->with(
            $this->retSession(
                ($rowDeleted? "deleted " : "deleting ") . $name,
                $rowDeleted));
    }

    /**
     * updates a product
     * @param Request req contains the product data
     * @param int id of the product to be updated
     * @return RedirectResponse to products tab with a session message
     * indicating whether the product was successfully updated or not
     */
    public function update(Request $req, int $id)
    {
        $product = Product::find($id);
        $filename = "";

        // get the filename of image uploaded
        if ($req->img) 
        {
            $filename = $req->img->getClientOriginalName();
            // store in public folder
            $req->img->move(public_path('assets/product_assets/'), $filename);
        }
        else
            $filename = Product::find($req->product_id)['gallery'];
        

        // Update the product's data in the database
        $rowAffected = $product->update([
            'name' => $req->product_name,
            'description' =>  $req->product_desc,
            'price' => $req->product_price,
            'price_10pax' => $req->product_price_10,
            'price_20pax' => $req->product_price_20,
            'stock' => $req->product_stock,
            'gallery' => $filename,
            'category_id' => $req->category_id,
            'is_trending' => $req->has('is_trending'),
            'is_featured' => $req->has('is_featured')
        ]);
    
            
        return redirect()->route('product.index')->with(
        $this->retSession(
            ($rowAffected? "updated " : "updating ") . $product['name'],
            $rowAffected));
    }

    /**
     * returns session data for the redirect response
     * 
     * @param String msg is a string indicating the action performed
     * @param bool success A boolean value indicating whether the operation was
     * successful or not
     * 
     * @return array<associative> with two keys -- 'message' and 'success' --
     * for the session message and session status respectively
     */
    private function retSession(String $msg, bool $success)
    {  
        return [
            'message' => ($success? "Successfully " : "Failed ") . $msg . "!",
            'success' => $success
        ];
    }
}

