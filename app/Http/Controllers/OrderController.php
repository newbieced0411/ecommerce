<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return auth()->user()->id;
    }

    public  function new(Product $product, Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer'
        ]);

        if($product->stock <= 0){
            return response()->json([
                'message' => $product->name . ' is out of stock.'
            ]);
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'total_amount' => 0,
            'status' => 'Pending',
        ]);

        try {
            $orderedItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->price
            ]);
    
            $product->update([ 'stock' => $product->stock - $orderedItems->quantity ]);
            $order->update([ 'total_amount' => $orderedItems->price * $orderedItems->quantity ]);

        } catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'You have successfully ordered this product.'
        ], 201);
    }
}
 