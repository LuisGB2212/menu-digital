@extends('layouts.backend')

@section('content')
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Crear Area</h4>
                    <p>
                        <br>
                        Sucursal : {{-- {{$category->restaurant->restaurant_name}} --}}
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
                                    <div class="col-7 col-lg-7">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nombre</label>
                                            <input type="text" class="form-control" autocomplete="false" name="area_name" placeholder="Nombre del area">
                                        </div>
                                    </div>
                                    <div class="col-7 col-lg-7 ">
                                        <div class="col-lg-12 justify-content-center d-flex">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Cantidad de Mesas</label>
                                               
                                                <div class="input-group bootstrap-touchspin">
                                                    <input type="number" class="touchspin-min-max form-control" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" name="table_number" id="number_table" onchange="load_number_packs()" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="data_table_numer" class="my-1 row col-md-12"></div>
                                        
                                    </div>


                                    <input type="hidden" name="branch_office_id" value="{{$branchOffice->id}}">
                                    
                                    <div class="col-12" align="right">
                                       {{--  <a href="{{ route('categories.show',$category->id.'?restaurant_id='.$category->restaurant->id) }}" class="btn btn-info mr-1 mb-1">Regresar</a> --}}
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

        $(document).ready(function() {
            $('#number_table').change();
        });

        $('#select_all').click(function () {
            $('input[type=checkbox]').prop('checked', $(this).prop('checked'));
        });
        
        var touchspinValue = $(".touchspin-min-max"),
        counterMin = 1;
        if (touchspinValue.length > 0) {
            touchspinValue.TouchSpin({
                min: counterMin,
                max: 10000,
            }).on('touchspin.on.startdownspin', function () {
                var $this = $(this);
                $('.bootstrap-touchspin-up').removeClass("disabled-max-min");
                if ($this.val() == counterMin) {
                    $(this).siblings().find('.bootstrap-touchspin-down').addClass("disabled-max-min");
                }
            }).on('touchspin.on.startupspin', function () {
                var $this = $(this);
                $('.bootstrap-touchspin-down').removeClass("disabled-max-min");
            });
        }

        function load_number_packs() {
            var number_packs = $('#number_table').val();
            $('#data_table_numer').html('');
            for (var i = 0; i < number_packs; i++) {
                $('#data_table_numer').append('<div class="col-lg-4">Mesa '+(i+1)+'</div><div class="col-lg-8"> <input class="form-control" type="number" placeholder="Ingrese número de packs" required name="table_number_packs[]"></div>');
            }
        }

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
                url: '{{ route('areas.store') }}', // form action url
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