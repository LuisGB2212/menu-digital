<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\MenuTableDiner;
use App\Table;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuTableDiner  $menuTableDiner
     * @return \Illuminate\Http\Response
     */
    public function show(Table $menu_table_diner)
    {
        //return $menu_table_diner->tableDiners;
        $categories = Category::orderBy('category_name','asc')->get();
        $branchOfficeMenus = $menu_table_diner->area->branchOffice->menuBranchOffices;
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
