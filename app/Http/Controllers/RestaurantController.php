<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    //Creación restaurante
    public function create(Request $request)
    {
        $restaurant = new Restaurant;
        $restaurant ->name = $request->input('name');
        $restaurant ->address = $request ->input('address');
        $restaurant ->phone = $request ->input('phone');
        $restaurant->save();

        return response()->json(['message' => 'Restaurant added successfully'], 201);
    }

    //Lectura de todos los restaurantes
    public function readAll()
    {
        $restaurant = Restaurant::all();

        return response()->json($restaurant);

    }

    //Lee el restaurante del ID dado
    public function read($id)
    {
        $restaurant = Restaurant::find($id);
        if (!$restaurant) {
            return response()->json(['message' => 'Unable to find a restaurant with id ' . $id], 404);
        }

        return response()->json($restaurant);
    }

    //Actualiza el restaurante del ID dado
    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::find($id);
        if (!$restaurant) {
            return response()->json(['message' => 'Unable to find a restaurant with id ' . $id], 404);
        }

        if($request->has("name")){
            $restaurant->name = $request->input('name');

        }
        if($request->has("phone")){
            $restaurant->phone = $request->input('phone');

        }

        if($request->has("address")){
            $restaurant->address = $request->input('address');

        }

        $restaurant->save();

        return response()->json(['message' => 'Restaurant updated successfully'], 200);

    }

    //Elimina el restaurante del ID dado
    public function delete($id)
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json(['message' => 'Unable to find a restaurant with id ' + $id], 404);
        }

        $restaurant->delete();

        return response()->json(['message' => "Restaurant deleted successfully"],200);
    }

}
