<?php

namespace App\Http\Controllers\backend;

use App\BranchOffice;
use App\Diner;
use App\Http\Controllers\Controller;
use App\Table;
use App\TableDiner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TableDinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branchOffice = BranchOffice::findOrFail($request->branch_office_id);
        return view('backend.table_diners.view_tables',compact('branchOffice'));
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

        $this->validate(request(),[
            'number_packs' => 'required',
            'table_id' => 'required',
        ]);

        $table = Table::findOrFail($request->table_id);



        for ($i=0; $i < $request->number_packs; $i++) { 
            $diner = Diner::create([
                'diner_name' => ($i+1),
                'diner_nickname' => 'Comensal '.($i+1),
            ]);

            $table_diner = TableDiner::create([
                'diner_id' => $diner->id,
                'table_id' => $table->id,
            ]);
        }

        $table->table_status = 'ocupied';
        $table->save();

        return redirect('admin/menu-table-diners/'.$table->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TableDiner  $tableDiner
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table_diner)
    {
        return view('backend.table_diners.table_data_status',compact('table_diner'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TableDiner  $tableDiner
     * @return \Illuminate\Http\Response
     */
    public function edit(TableDiner $tableDiner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TableDiner  $tableDiner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableDiner $tableDiner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TableDiner  $tableDiner
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableDiner $tableDiner)
    {
        //
    }
}
