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
     *    gets all products to be displayed
     *   @return view products
     */
    function index()
    {
        $data = Product::all();
        return view('products', ['products' => $data]);
    }
    /*
        gets all product details
        @param int $id
        @return view details
    */
    function details($id)
    {
        $data = Product::find($id);
        $cat_id = $data['category_id'];
        $category = Category::find($cat_id);
        return view('details', ['product' => $data, 'category' => $category]);
    }

    /**
     * gets all products similar to search input
     * @param Request $req
     */
    function searchProduct(Request $req)
    {
        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')
            ->get();
        return view('search', ['products' => $data]);
    }


    /**
     *   Creates new order line in db
     *   If user has unpurchased order already
     *     add price of order line to grand total of current order
     *   else
     *    create new order
     *   @param Request $req
     *   @return checkout post request if user is logged in
     *   @return else redirect user to login 
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
            $newOrder->order_type = 'd';
            $newOrder->address = 'dummy address';
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
        // return $order_line;
        $order_line->save();

        return redirect('/checkout_order');
    }
}
