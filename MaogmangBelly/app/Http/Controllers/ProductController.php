<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    //

    function index()
    {
        $data = Product::all();
        return view('products', ['products' => $data]);
    }

    function details($id)
    {
        $data = Product::find($id);
        $cat_id = $data['category_id'];
        $category = Category::find($cat_id);
        return view('details', ['product' => $data, 'category' => $category]);
    }

    function searchProduct(Request $req)
    {

        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')
            ->get();

        return view('search', ['products' => $data]);
    }

    function addToOrder(Request $req)
    {
        if ($req->session()->has('user')) {
            $order_line = new OrderLine;
            $user = $req->session()->get('user')['id'];
            $product = Product::find($req->product_id);
            $quantity = 1;
            $total_price = $product['price'] * $quantity;
            $orders = Order::where([
                ['user_id', '=', $user],
                ['is_purchased', 0],
            ])->get();

            if (count($orders) == 0) {
                $newOrder = new Order;
                $newOrder->user_id = $user;
                $newOrder->order_type = 'd';
                $newOrder->address = 'dummy address';
                $newOrder->is_purchased = false;
                $newOrder->save();
            }

            $order = Order::where([
                ['user_id', '=', $user],
                ['is_purchased', 0],
            ])->first();

            $grand_total = $order['grand_total'] + $total_price;

            DB::table("orders")
                ->where('id', $order['id'])
                ->update(['grand_total' => $grand_total]);

            $order_line->order_id = $order['id'];
            $order_line->product_id = $req->product_id;
            $order_line->quantity = $quantity;
            $order_line->total_price = $total_price;
            $order_line->save();
            return redirect('/');
            // return redirect('/details/'.$req->product_id);
        } else {
            return redirect('/login');
        }
    }
}
