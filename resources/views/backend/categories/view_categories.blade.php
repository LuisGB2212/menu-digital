@extends('layouts.backend')

@section('content')
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        {{$category->category_name}} registrados
                    </h4>
                    <p>
                        <br>
                        Restaurant : {{$category->restaurant->restaurant_name}}
                        <br>
                    </p>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="mb-3" align="right">
                            <a href="{{ route('menus.create','foodType_id='.$category->id) }}" class="btn btn-success mr-1 mb-1 waves-effect waves-light">Agregar {{$category->category_name}}</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Descripción</th>
                                        <th>Sucursales</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($category->menus as $menu)
                                       <tr>
                                           <td>{{$menu->id}}</td>
                                           <td>{{$menu->name}}</td>
                                           <td>${{number_format($menu->price,2,'.',',')}}</td>
                                           <td>{{$menu->description}}</td>
                                           <td>
                                               @foreach ($menu->menuBranchOffices as $menuBranchOffice)
                                                   {{$menuBranchOffice->branchOffice->branch_office_name}},
                                               @endforeach
                                           </td>
                                           <td>
                                                <button type="button" onclick="data_user({{$menu->id}})" class="btn btn-info mr-1 mb-1 waves-effect waves-light" data-toggle="modal" data-target="#data_user">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <a href="{{ url('admin/restaurant-users/'.$menu->id.'/edit?restaurant_id='.$category->restaurant->id) }}" class="btn btn-warning mr-1 mb-1 waves-effect waves-light">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                           </td>
                                       </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer" align="right">
                    <a href="{{ route('categories.index','restaurant='.$category->restaurant->id) }}" class="btn btn-info mr-1 mb-1">Regresar</a>
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