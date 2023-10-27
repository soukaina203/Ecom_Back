<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $items = Order::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([            'id' => 'required',
            'user_id' => 'required',
            'product_i' => 'required',
            'date' => 'required',
            'statut' => 'required',
            'qte' => 'required',
        ]);

        $item = new Order($request->all());
        $item->save();

        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = Order::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $request->validate([            'id' => 'required',
            'user_id' => 'required',
            'product_i' => 'required',
            'date' => 'required',
            'statut' => 'required',
            'qte' => 'required',
        ]);

        $item = Order::findOrFail($id);
        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        $item = Order::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}