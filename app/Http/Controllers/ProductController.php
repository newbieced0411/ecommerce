<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function new(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        Product::create([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Product succecssfully created.'
        ], 201);
    }
}
