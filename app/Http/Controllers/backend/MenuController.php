<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Menu;
use App\MenuBranchOffice;
use App\Type;
use Illuminate\Http\Request;

class MenuController extends Controller
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
    public function create(Request $request)
    {
        $category = Category::findOrFail($request->foodType_id);
        $types = Type::all();
        return view('backend.menus.create_menu',compact('category','types'));
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
            'price' => 'required',
            'name' => 'required',
            'description' => 'required',
            'type_id' => 'required',
            'category_id' => 'required'
        ]);

        if (!ctype_digit($request->type_id)) {
            $type = Type::create([
                'type_name' => $request->type_id,
            ]);
            $request['type_id'] = $type->id;
        }

        $menu = Menu::create($request->all());

        if (isset($request->branch_office_id)) {
            foreach ($request->branch_office_id as $key => $branch_office) {
                $branch = MenuBranchOffice::create([
                    'menu_id' => $menu->id,
                    'branch_office_id' => $branch_office
                ]);
            }
        }

        return response()->json(['message' => 'success','menu' => $menu]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
