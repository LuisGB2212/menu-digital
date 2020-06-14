@extends('layouts.backend')

@section('content')
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <h4 class="card-title">Mesas de la suscursal</h4>
                @include('backend.table_diners.list_table', ['branchOffice' => $branchOffice])
            </div>
        </div>
    </section>
@endsection

@section('modals')
    <div class="modal fade text-left" id="openTable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form id="table_diner_form" action="{{ route('table-diners.store') }}" method="POST" >
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
        $('#table_diner_form').on('submit', function(e) {
            e.preventDefault(); // prevent default form submit
            var form = $('#table_diner_form'); // contact form
            var submit = $('.btn_diner_form'); // submit button
            $.ajax({
                url: '{{ route('table-diners.store') }}', // form action url
                type: 'POST', // form submit method get/post
                data: form.serialize(),
                beforeSend: function() {
                    //alert.html('El producto se esta guardando').fadeIn().fadeOut();
                    submit.prop('disabled', true);
                    submit.html('Abriendo...'); // change submit button text
                },
                success: function(data) {
                    
                    window.location.href = '/admin/menu-table-diners/'+data.table.id
                },
                error: function(e) {
                    console.log(e)
                    alert('Hubo algún problema, recargue la página e intente de nuevo');
                }
            });
        });
    </script>
@endsection