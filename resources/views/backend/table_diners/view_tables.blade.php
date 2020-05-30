@extends('layouts.backend')

@section('content')
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Mesas de la suscursal</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="mb-3" align="right">
                            {{-- <a href="{{ route('tables.create','area_id='.$area->id) }}" class="btn btn-success mr-1 mb-1 waves-effect waves-light">Agregar Mesa</a> --}}
                        </div>

                    </div>
                </div>
            </div>
                {{-- <div class="card-footer" align="right">
                    <a href="{{ route('restaurants.show',$restaurant->id) }}" class="btn btn-info mr-1 mb-1">Regresar</a>
                </div> --}}

            <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                @foreach ($branchOffice->areas as $key => $area)
                    <li class="nav-item">
                        <a class="nav-link {{$key == 0 ? 'active' : ''}}" data-toggle="tab" href="#table{{$area->id}}">{{$area->area_name}}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content pt-1">
                @foreach ($branchOffice->areas as $key2 => $area_list)
                    <div class="tab-pane {{$key2 == 0 ? 'active' : ''}}" id="table{{$area_list->id}}">
                        {{-- {{ $area_list->tables }} --}}
                        <div class="row">                            
                            @foreach ($area_list->tables as $table)
                                <div class="col-xl-2 col-md-3 col-sm-4">
                                    <div class="card text-center">
                                        <a href="#" onclick="open_table({{$table->id}})">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                                        <div class="avatar-content">
                                                            <i class="fa fa-cube text-info font-medium-5"></i>
                                                        </div>
                                                    </div>
                                                    <h6 class="text-bold-700">{{$table->table_name}}</h6>
                                                    <p class="mb-0 line-ellipsis">
                                                        @switch($table->table_status)
                                                            @case('reserved')
                                                                <strong class="text-warning">Reservado</strong>
                                                                @break
                                                            @case('ocupied')
                                                                <strong class="text-danger">Ocupado</strong>
                                                                @break
                                                            @case('available')
                                                                <strong class="text-success">Disponible</strong>
                                                                @break
                                                            @default
                                                                <strong class="text-danger">Fuera de servicio</strong>
                                                        @endswitch
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection

@section('modals')
    <div class="modal fade text-left" id="openTable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            
            <div class="modal-content">
                <form action="{{ route('table-diners.store') }}" method="POST" >
                        @csrf
                    <div class="modal-header bg-success white">
                        <h5 class="modal-title" id="myModalLabel110">Abrir Mesa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="info_table"></div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function open_table(id) {

            $.ajax({
                url: '/admin/table-diners/'+id,
                type:'GET',
                data:{},
                success:function(result) {
                    $('#info_table').html(result);
                }
            });

            $('#openTable').modal('show');
        }
    </script>
@endsection