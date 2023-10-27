<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        $items = Address::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([            'id' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'street' => 'required',
        ]);

        $item = new Address($request->all());
        $item->save();

        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = Address::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'street' => 'required',
        ]);

        $item = Address::findOrFail($id);

        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        $item = Address::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Address deleted successfully']);
    }
}
