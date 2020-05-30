
<div align="center">
	<h5>{{$table_diner->table_name}}</h5>

	@switch($table_diner->table_status)
	    @case('available')
	        <label for="first-name-vertical">Número de Comensales</label>
	                                               
			<div class="input-group bootstrap-touchspin">
			    <input type="number" class="touchspin-min-max form-control" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" name="number_packs" value="{{$table_diner->table_number_packs}}">
			</div>

			<input type="hidden" name="table_id" value="{{$table_diner->id}}">

			<div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect waves-light">Abrir</button>
            </div>

	        @break
		@case('ocupied')
	        <a href="{{ route('menu-table-diners.show',$table_diner->id) }}" class="btn btn-info">Ver más</a>
	        @break
	    @default
	         Default case...
	@endswitch
	
	
</div>

<script type="text/javascript">
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
</script>