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
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($branchOffice->restaurant->ingredients as $ingredient)
                                            @php
                                                $balance = $branchOffice->branchOfficeIngredients->where('ingredient_id',$ingredient->id)->count() > 0 ? $branchOffice->branchOfficeIngredients->where('ingredient_id',$ingredient->id)->last()->entryIngredients->last()->balance : '';
                                                $qty = $branchOffice->branchOfficeIngredients->where('ingredient_id',$ingredient->id)->count() > 0 ? $branchOffice->branchOfficeIngredients->where('ingredient_id',$ingredient->id)->last()->entryIngredients->last()->quantity : '';
                                            @endphp
                                            <tr>
                                               <td>{{$ingredient->id}}</td>
                                               <td>{{$ingredient->ingredient_name}}</td>
                                               <td>{{$ingredient->ingredient_unit}}</td>
                                               <td>
                                                   {{$qty}}
                                               </td>
                                               <td>{{$balance }}</td>
                                               <td>
                                                    <input type="number" name="quantity[{{$ingredient->id}}][]" class="form-control" value="{{$balance}}" min="{{$balance}}">
                                                    {{-- <a class="btn btn-info mr-1 mb-1 waves-effect waves-light" href="{{ route('categories.show',$category->id.'?restaurant_id='.$restaurant->id) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('admin/restaurant-users/'.$category->id.'/edit?restaurant_id='.$restaurant->id) }}" class="btn btn-warning mr-1 mb-1 waves-effect waves-light">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">
                                                        <i class="fa fa-trash"></i>
                                                    </button> --}}
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