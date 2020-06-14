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