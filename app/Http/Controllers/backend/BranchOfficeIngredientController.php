<?php

namespace App\Http\Controllers\backend;

use App\BranchOffice;
use App\BranchOfficeIngredient;
use App\EntryIngredient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchOfficeIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branchOffice = BranchOffice::findOrFail($request->branch_office_id);
        //return $restaurant;
        return view('backend.branch_office_ingredients.list_ingredients',compact('branchOffice'));
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
            'quantity' => 'required',
            'branch_office_id' => 'required',
        ]);

        foreach ($request->quantity as $key => $qty) {
            //return $qty[0];
            if($qty[0] != null){
                //return $request->min_balance[$key];
                $branch_office_ingredient = BranchOfficeIngredient::firstOrCreate([
                    'ingredient_id' => $key,
                    'branch_office_id' => $request->branch_office_id,
                    'min_balance' => $request->min_balance[$key][0],
                ]);

                $entry_ingredient = EntryIngredient::where('branch_office_ingredient_id',$branch_office_ingredient->id)->get();

                if ($entry_ingredient->count() > 0) {
                    if($entry_ingredient->last()->balance != $qty[0]){
                        $entry_ingredient = EntryIngredient::create([
                            'quantity' => $qty[0],
                            'balance' => $qty[0],
                            'balance_decrease' => $qty[0],
                            'branch_office_ingredient_id' => $branch_office_ingredient->id
                        ]);
                    }
                }else{
                    $entry_ingredient = EntryIngredient::create([
                        'quantity' => $qty[0],
                        'balance' => $qty[0],
                        'balance_decrease' => $qty[0],
                        'branch_office_ingredient_id' => $branch_office_ingredient->id
                    ]);
                }

            }
        }
        return redirect()->back();
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
