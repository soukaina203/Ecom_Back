<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'priceOld' => 'required',
            'priceNew' => 'required',
            'qteStock' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
        ]);

        $item = new Product($request->all());
        $item->save();

        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = Product::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $request->validate([            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'priceOld' => 'required',
            'priceNew' => 'required',
            'qteStock' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
        ]);

        $item = Product::findOrFail($id);
        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}