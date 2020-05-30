@extends('layouts.backend')

@section('content')
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ingredientes</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <form action="{{ route('branch-office-ingredients.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="branch_office_id" value="{{$branchOffice->id}}">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ingrediente</th>
                                            <th>Presentación</th>
                                            <th>Cantidad</th>
                                            <th>Saldo</th>
                                            <th>Cantidad en sucursal</th>
                                            <th>Mínimo en almacén</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($branchOffice->restaurant->ingredients as $ingredient)
                                            @php
                                            $min_balance = $branchOffice->branchOfficeIngredients->where('ingredient_id',$ingredient->id)->count() > 0 ? $branchOffice->branchOfficeIngredients->where('ingredient_id',$ingredient->id)->first()->min_balance : '';

                                                $balance = $branchOffice->branchOfficeIngredients->where('ingredient_id',$ingredient->id)->count() > 0 ? $branchOffice->branchOfficeIngredients->where('ingredient_id',$ingredient->id)->last()->entryIngredients->last()->balance : '';

                                                $qty = $branchOffice->branchOfficeIngredients->where('ingredient_id',$ingredient->id)->count() > 0 ? $branchOffice->branchOfficeIngredients->where('ingredient_id',$ingredient->id)->last()->entryIngredients->last()->quantity : '';
                                            @endphp
                                            <tr>
                                               <td>{{$ingredient->id}}</td>
                                               <td>{{$ingredient->ingredient_name}}</td>
                                               <td>{{$ingredient->ingredientUnit->ingredient_unit_name}}</td>
                                               <td>
                                                   {{$qty}}
                                               </td>
                                               <td>{{$balance }}</td>
                                               <td>
                                                    <input type="number" name="quantity[{{$ingredient->id}}][]" class="form-control col-lg-6" placeholder="Cantidad en sucursal" value="{{$balance}}" min="{{$balance}}">
                                               </td>
                                               <td>
                                                   <input type="number" name="min_balance[{{$ingredient->id}}][]" class="form-control col-lg-6" placeholder="Mínimo en almacén" value="{{$min_balance}}">
                                               </td>
                                           </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12" align="right">
                                <button type="submit" class="btn btn-success mr-1 mb-1">Guardar</button>
                                <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Limpar datos</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <div class="card-footer" align="right">
                    <a href="{{ route('restaurants.show',$branchOffice->restaurant->id) }}" class="btn btn-info mr-1 mb-1">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    <script type="text/javascript">
        $('.dataex-html5-selectors').DataTable({
            "order": [
                [0, 'desc']
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });
    </script>
@endsection