@extends('layouts.backend')

@section('content')
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Crear {{$category->category_name}}</h4>
                    <p>
                        <br>
                        Restaurant : {{$category->restaurant->restaurant_name}}
                    </p>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="col-12" align="center">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <form class="form form-vertical" id="add_food_form" {{-- action="{{ route('categories.store') }}" --}} method="POST">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="row justify-content-center">
                                    <div class="col-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nombre</label>
                                            <input type="text" class="form-control" autocomplete="false" name="name" placeholder="Nombre de Categoría">
                                        </div>
                                    </div>
                                    <div class="col-2 col-lg-2">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Precio</label>
                                            <input type="number" step="any" class="form-control" name="price" placeholder="Nombre de Categoría">
                                        </div>
                                    </div>
                                    <div class="col-2 col-lg-2">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Tipo de alimento</label>
                                            <select class="form-control type_id" name="type_id">
                                                <option value="">Selecciona una opción</option>
                                                @foreach ($types as $type)
                                                    <option value="{{$type->id}}">{{$type->type_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-5">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Descripción</label>
                                            <textarea class="form-control" name="description" rows="4" placeholder="Escribe la descripción"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 col-lg-5">
                                        <div class="form-group">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sucursal</th>
                                                        <th>
                                                            <input type="checkbox" id="select_all">
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($category->restaurant->branchOffices as $branchOffice)
                                                        <tr>
                                                            <td>
                                                                {{$branchOffice->branch_office_name}}
                                                            </td>
                                                            <td>
                                                                <input class="all" type="checkbox" name="branch_office_id[]" value="{{$branchOffice->id}}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <input type="hidden" name="category_id" value="{{$category->id}}">
                                    
                                    <div class="col-12" align="right">
                                        <a href="{{ route('categories.show',$category->id.'?restaurant_id='.$category->restaurant->id) }}" class="btn btn-info mr-1 mb-1">Regresar</a>
                                        <button type="submit" class="btn btn-success mr-1 mb-1 btn_add_type">Guardar</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Limpar datos</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    <script type="text/javascript">
        $('#select_all').click(function () {
            $('input[type=checkbox]').prop('checked', $(this).prop('checked'));
        });
        
        $(".type_id").select2({
            dropdownAutoWidth: true,
            width: '100%',
            tags:true,
        });
        $('#add_food_form').on('submit', function(e) {
            e.preventDefault(); // prevent default form submit
            var form = $('#add_food_form'); // contact form
            var submit = $('.btn_add_type'); // submit button
            $.ajax({
                url: '{{ route('menus.store') }}', // form action url
                type: 'POST', // form submit method get/post
                data: form.serialize(),
                beforeSend: function() {
                    //alert.html('El producto se esta guardando').fadeIn().fadeOut();
                    submit.prop('disabled', true);
                    submit.html('Guardando...'); // change submit button text
                },
                success: function(data) {
                    form.trigger('reset');
                    submit.prop('disabled', false);
                    submit.html('Guardado'); // reset submit button text
                },
                error: function(e) {
                    console.log(e)
                    alert('Hubo algún problema, recargue la página e intente de nuevo');
                }
            });
        });
    </script>
@endsection