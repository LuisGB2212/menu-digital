<?php

namespace App\Http\Controllers\backend;

use App\Area;
use App\BranchOffice;
use App\Http\Controllers\Controller;
use App\Table;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branchOffice = BranchOffice::findOrFail($request->branch_office_id);
        return view('backend.areas.list_areas',compact('branchOffice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $branchOffice = BranchOffice::findOrFail($request->branch_office_id);   
        return view('backend.areas.create_area',compact('branchOffice'));
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
            'area_name' => 'required',
            'branch_office_id' => 'required',
        ]);


        $area = Area::create($request->all());
        if (isset($request->table_number)) {
            for ($i=0; $i < $request->table_number ; $i++) { 
                $tables = Table::create([
                    'table_name' => str_replace(" ", "",$area->area_name."-Mesa-".($i+1)),
                    'area_id' => $area->id
                ]);
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
