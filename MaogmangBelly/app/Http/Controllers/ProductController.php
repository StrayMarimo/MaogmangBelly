<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Show all products and categories on the products page.
     *
     * @return View - the products view.
     */
    function index()
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

        // return the products view with all the products and categories, and the isAdmin flag
        return view('layouts.products.products', [
            'products' => $products,
            'categories' => $categories,
            'isAdmin' => $isAdmin
        ]);
    }

    /**
     * Show the details of a specific product.
     *
     * @param int $id - the ID of the product.
     * @return View - the details view.
     */
    function details($id)
    {
        // get the product with the given ID
        $data = Product::find($id);

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
    function searchProduct(Request $req)
    {
        // retrieve all products whose names contain the search query
        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')
            ->get();

        // return the search view with the matching products
        return view('layouts.search.search', ['products' => $data]);
    }



    /**
     * Adds product to user's cart
     *
     * @param Request $req request object containing product_id and quantity
     *
     * @return RedirectResponse|HttpResponse returns redirect to checkout_order if user is logged in,
     * else redirects user to login page
     */
    function addToOrder(Request $req)
    {
        // user must be logged in first
        if (!Auth::check()) {
            return redirect('/login');
        }
        // create new Order Line
        $order_line = new OrderLine;

        // get all needed data [user_id, product, total_price]
        $user = Auth::user()->id;
        $product = Product::find($req->product_id);
        $total_price = $product['price'] * $req->quantity;

        // check if user has an already saved unpurchased order
        $orders = Order::where([
            ['user_id', '=', $user],
            ['is_purchased', 0],
        ])->get();

        // if no order exists, create new one
        if (count($orders) == 0) {
            $newOrder = new Order;
            $newOrder->user_id = $user;
            $newOrder->order_type = 'X';
            $newOrder->is_purchased = false;
            $newOrder->save();
        }

        // get id of order
        $order = Order::where([
            ['user_id', '=', $user],
            ['is_purchased', 0],
        ])->first();

        // update grand total of order by adding it with the total_price
        $grand_total = $order['grand_total'] + $total_price;
        DB::table("orders")
        ->where('id', $order['id'])
        ->update(['grand_total' => $grand_total]);

        // store and save details of order line
        $order_line->order_id = $order['id'];
        $order_line->product_id = $req->product_id;
        $order_line->quantity = $req->quantity;
        $order_line->total_price = $total_price;

        $order_line->save();

        return redirect('/checkout_order');
    }

    /**
     * Edit a category's name or delete a category entirely.
     *
     * @param  Request  $req  The HTTP request containing the category ID, name, and whether to delete the category.
     * @return RedirectResponse  A redirect back to the products page.
     */
    function editCategory(Request $req)
    {
        // Check if the category should be deleted or just updated
        if ($req->to_delete == "0") {
            // Update the category's name in the database
            DB::table("categories")
            ->where('id', (int) $req->category_id)
                ->update(['name' => $req->category_name]);
        } else {
            // Delete the category from the database
            DB::table("categories")
            ->where('id', (int) $req->to_delete)
                ->delete();
        }

        // Redirect back to the products page
        return redirect("/products");
    }

    /**
     * Add a new category to the database.
     *
     * @param  Request  $req  The HTTP request containing the new category's name.
     * @return RedirectResponse  A redirect back to the products page.
     */
    function addCategory(Request $req)
    {
        // Create a new Category object and set its name
        $category = new Category;
        $category->name = $req->category_name;

        // Save the new category to the database
        $category->save();

        // Redirect back to the products page
        return redirect("/products");
    }

}
