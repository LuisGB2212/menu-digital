<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Check;
use App\Diner;
use App\Http\Controllers\Controller;
use App\MenuTableDiner;
use App\Table;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class MenuTableDinerController extends Controller
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
        //return Cart::instance($request->menu_table_diner)->content();
        foreach (Cart::instance($request->menu_table_diner)->content()->groupBy('options.diner_id') as $contents){
            //return $contents[0];
            foreach ($contents as $key => $content) {
                $diner = Diner::findOrFail($content->options->diner_id);
                //return $diner->tableDiner;
                # code...
                $menu_table_diner_create = MenuTableDiner::create([
                    'menu_id' => $content->id,
                    'table_diner_id' => $diner->tableDiner->id,
                    'comments' => $content->options->comments,
                    'quantity' => $content->qty
                ]);
            }
        }

        Cart::instance($request->menu_table_diner)->destroy();

        return redirect()->back();
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuTableDiner  $menuTableDiner
     * @return \Illuminate\Http\Response
     */
    public function show($menu_table_diner)
    {        

        $check = Check::where('invoice',$menu_table_diner)->first();
        //return $check;
        $categories = Category::orderBy('category_name','asc')->get();
        $branchOfficeMenus = $check->table->area->branchOffice->menuBranchOffices;

        $menu_table_diner = $check;

        return view('backend.menu_table_diners.menu',compact('branchOfficeMenus','categories','menu_table_diner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuTableDiner  $menuTableDiner
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuTableDiner $menuTableDiner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuTableDiner  $menuTableDiner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuTableDiner $menuTableDiner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuTableDiner  $menuTableDiner
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuTableDiner $menuTableDiner)
    {
        //
    }
}
