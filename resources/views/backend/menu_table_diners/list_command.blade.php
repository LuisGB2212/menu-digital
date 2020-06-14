<ul class="list-group list-group-flush">
    <li class="list-group-item">
        <span class="badge badge-pill bg-primary float-right">{{Cart::instance($table_name)->content()->count()}}</span>
        <strong>Comanda</strong>
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
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach (Cart::instance($table_name)->content(); as $content)
                <tr>
                    <td>
                        <strong>{{$content->name}}</strong>
                        <br>
                        <small>{{$content->options->comments}}</small>
                    </td>
                    <td>{{$content->qty}}</td>
                    <td>${{number_format($content->price,2,'.',',')}}</td>
                    <td>
                        <i class="fa fa-trash" onclick="delete_item('{{$content->rowId}}_{{$table_name}}',)"></i>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <li class="list-group-item">
        Subtotal : ${{number_format(Cart::instance($table_name)->subtotal(),2,'.',',')}}
    </li>
    <li class="list-group-item">
        Total : ${{number_format(Cart::instance($table_name)->total(),2,'.',',')}}
    </li>
    <li class="list-group-item">
        <button class="btn btn-success btn-block">
            <i style="font-size: 40px" class="fa fa-caret-right"></i> <strong style="font-size: 40px"> &nbsp &nbsp Ordenar </strong>
        </button>
    </li>
</ul>

<script type="text/javascript">
    function delete_item(id) {
        $.ajax({
            url: '/admin/table-products/'+id,
            type: 'DELETE',
            data:{'_token' : '{{csrf_token()}}' },
            success:function(result) {
                $('#list_commands').html(result);
            }
        });
    }
</script>