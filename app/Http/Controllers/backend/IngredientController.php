<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Ingredient;
use App\IngredientUnit;
use App\Restaurant;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurant = Restaurant::findOrFail($request->restaurant_id);
        //return $restaurant;
        return view('backend.ingredients.list_ingredients',compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $restaurant = Restaurant::findOrFail($request->restaurant_id);
        $ingredient_units = IngredientUnit::all();
        //return $restaurant;
        return view('backend.ingredients.create_ingredient',compact('restaurant','ingredient_units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'ingredient_name' => 'required',
            'ingredient_unit_id' => 'required',
            'restaurant_id' => 'required'
        ]);
        
        if (!ctype_digit($request->ingredient_unit_id)) {
            $ingredient_unit = IngredientUnit::create([
                'ingredient_unit_name' => $request->ingredient_unit_id,
            ]);
            $request['ingredient_unit_id'] = $ingredient_unit->id;
        }

        $ingredient = Ingredient::create($request->all());

        return response()->json(['message' => 'success','ingredient' => $ingredient]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
