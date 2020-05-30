
<div align="center">
	<h5>{{$menu->name}}</h5>
	<h6>Precio: ${{number_format($menu->price,2,'.',',')}}</h6>
	
	<textarea class="form-control" name="comments" rows="4" placeholder="Comentarios"></textarea>
	
	<input type="hidden" name="menu_id" value="{{$menu->id}}">
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