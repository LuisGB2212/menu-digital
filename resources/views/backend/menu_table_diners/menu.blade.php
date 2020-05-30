@extends('layouts.backend')

@section('content')
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <h3>Menú</h3>
            
                {{-- <div class="card-footer" align="right">
                    <a href="{{ route('restaurants.show',$restaurant->id) }}" class="btn btn-info mr-1 mb-1">Regresar</a>
                </div> --}}
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="badge badge-pill bg-primary float-right">{{$menu_table_diner->tableDiners->count()}}</span>
                            Comensales
                        </li>
                        @foreach ($menu_table_diner->tableDiners as $tableDiner)
                            <li class="list-group-item">
                                {{$tableDiner->diner->diner_nickname}} <input type="radio" name="diner_id" value="{{$tableDiner->diner->id}}">
                            </li>
                        @endforeach

                    </ul>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <ul class="nav nav-tabs nav-fill" id="myTab2" role="tablist">
                @foreach ($categories as $key => $category)
                    @php
                        $bandera = 0;
                    @endphp
                    @foreach ($category->menus as $menu)
                        @foreach ($branchOfficeMenus as $branchOfficeMenu)
                            @if ($menu->id == $branchOfficeMenu->menu_id && $bandera == 0)
                                <li class="nav-item">
                                    <a class="nav-link {{$key == 0 ? 'active' : ''}}" data-toggle="tab" href="#table{{$category->id}}">{{$category->category_name}}</a>
                                </li>
                                @php
                                    $bandera = 1;
                                @endphp
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
            </ul>
            <div class="tab-content pt-1">
                @foreach ($categories as $key2 => $category_list)
                    <div class="tab-pane {{$key2 == 0 ? 'active' : ''}}" id="table{{$category_list->id}}">
                        <div class="row">
                            @foreach ($category_list->menus as $menu)
                                @foreach ($branchOfficeMenus as $branchOfficeMenu)
                                    @if ($menu->id == $branchOfficeMenu->menu_id)
                                        <div class="col-xl-2 col-md-3 col-sm-4">
                                            <div class="card text-center">
                                                <a href="#" onclick="add_product({{$branchOfficeMenu->menu_id}})">
                                                    <div class="card-content">
                                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                                            <div class="avatar-content">
                                                                <i class="fa fa-cube text-info font-medium-5"></i>
                                                            </div>
                                                        </div>
                                                        <h6 class="text-bold-700" style="font-size: 12px;">{{$menu->name}}</h6>
                                                        <h6 class="text-bold-700">${{number_format($menu->price,2,'.',',')}}</h6>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="badge badge-pill bg-primary float-right">{{Cart::content()->count()}}</span>
                            Comanda
                        </li>
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Cantidad
                                    </th>
                                    <th>
                                        Precio
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $content)
                                    <tr>
                                        <td>
                                            <strong>{{$content->name}}</strong>
                                            <br>
                                            <small>{{$content->options->comments}}</small>
                                        </td>
                                        <td>{{$content->qty}}</td>
                                        <td>${{number_format($content->price,2,'.',',')}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <li class="list-group-item">
                            Subtotal : ${{number_format(Cart::subtotal(),2,'.',',')}}
                        </li>
                        <li class="list-group-item">
                            Total : ${{number_format(Cart::total(),2,'.',',')}}
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('modals')
    <div class="modal fade text-left" id="openTable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            
            <div class="modal-content">
                <form id="add_product">
                    @csrf
                    
                    <div class="modal-header bg-success white">
                        <h5 class="modal-title" id="myModalLabel110">Agregar Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="info_table"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        function add_product(id) {

            $.ajax({
                url: '{{ url('admin/menus') }}/'+id,
                type:'GET',
                data:{},
                success:function(result) {
                    $('#info_table').html(result);
                }
            });

            $('#openTable').modal('show');
        }

        $('#add_product').on('submit', function(e) {
            e.preventDefault(); // prevent default form submit
            var form = $('#add_product'); // contact form
            var submit = $('.btn_add_type'); // submit button
            $.ajax({
                url: '{{ route('table-products.store') }}', // form action url
                type: 'POST', // form submit method get/post
                data: form.serialize(),
                beforeSend: function() {
                    //alert.html('El producto se esta guardando').fadeIn().fadeOut();
                    submit.prop('disabled', true);
                    submit.html('Guardando...'); // change submit button text
                },
                success: function(data) {
                    console.log(data);
                    form.trigger('reset');
                    submit.prop('disabled', false);
                    submit.html('Guardado'); // reset submit button text
                    $('#openTable').modal('hide');
                },
                error: function(e) {
                    console.log(e)
                    alert('Hubo algún problema, recargue la página e intente de nuevo');
                }
            });
        });

    </script>
@endsection