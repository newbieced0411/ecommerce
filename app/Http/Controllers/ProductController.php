<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function new(Request $request)
    {
        $product = $request->validate([
            'name' => 'required'
        ]);

        Product::create([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Product succecssfully created.'
        ], 201);
    }
}
