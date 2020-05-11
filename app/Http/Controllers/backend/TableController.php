<?php

namespace App\Http\Controllers\backend;

use App\Area;
use App\Http\Controllers\Controller;
use App\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $area = Area::findOrFail($request->area_id);
        return view('backend.tables.list_tables',compact('area'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $area = Area::findOrFail($request->area_id);   
        return view('backend.tables.create_table',compact('area'));
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
            'table_number' => 'required',
            'area_id' => 'required',
        ]);


        $area = Area::findOrFail($request->area_id);
        if (isset($request->table_number)) {
            $coutTables = $area->tables->count()+1;
            for ($i=0; $i < $request->table_number ; $i++) { 

                $tables = Table::create([
                    'table_name' => str_replace(" ", "",$area->area_name."-Mesa-".($coutTables)),
                    'area_id' => $area->id
                ]);
                $coutTables++;
            }
        }
        return response()->json(['message' => 'success','area' => $area ]);
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
