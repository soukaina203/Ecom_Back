<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function index()
    {
        $items = Card::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([            'id' => 'required',
            'user_id' => 'required',
            'product_id' => 'required',
            'qte' => 'required',
        ]);

        $item = new Card($request->all());
        $item->save();

        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = Card::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $request->validate([            'id' => 'required',
            'user_id' => 'required',
            'product_id' => 'required',
            'qte' => 'required',
        ]);

        $item = Card::findOrFail($id);
        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        $item = Card::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Card deleted successfully']);
    }
}