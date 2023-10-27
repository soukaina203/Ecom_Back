<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $items = Review::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([            'id' => 'required',
            'product_id' => 'required',
            'user_id' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $item = new Review($request->all());
        $item->save();

        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = Review::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $request->validate([            'id' => 'required',
            'product_id' => 'required',
            'user_id' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $item = Review::findOrFail($id);
        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        $item = Review::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Review deleted successfully']);
    }
}