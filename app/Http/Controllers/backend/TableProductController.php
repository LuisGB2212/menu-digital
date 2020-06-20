<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Menu;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class TableProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $table_name = $request->instance_table;
        //$table_name = 'diner'.$request->table_diner_id;
        $menu = Menu::findOrFail($request->menu_id);

        Cart::instance($table_name)->add($menu->id, $menu->name, 1, $menu->price,0,['comments' => $request->comments,'diner_id' => $request->table_diner_id]);

        return response()->json(view('backend.menu_table_diners.list_command',compact('table_name'))->render());
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
        $table = explode('_', $id);
        $row_id = $table[0];
        $table_name = $table[1];
        //return $table;

        Cart::instance($table_name)->remove($row_id);
        return response()->json(view('backend.menu_table_diners.list_command',compact('table_name'))->render());
    }
}
