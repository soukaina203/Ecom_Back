<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $items = User::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_id' => 'required',
            'userName' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNbr' => 'required',
            'statut' => 'required',
        ]);

        $item = new User($request->all());
        $item->save();

        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = User::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address_id' => 'required',
            'userName' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNbr' => 'required',
            'statut' => 'required',
        ]);

        $item = User::findOrFail($id);
        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
