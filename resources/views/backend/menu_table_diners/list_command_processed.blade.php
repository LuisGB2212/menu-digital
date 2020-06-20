<ul class="list-group list-group-flush">
    <li class="list-group-item">
        <strong>Cuenta</strong>
    </li>
    <li style="list-style-type: none;">
        <div class="default-collapse collapse-bordered">
            <div class="card collapse-header">
                @php
                    $subtotal = 0;
                @endphp
                @foreach ($menu_table_diner->tableDiners as $table_diner)
                    {{$table_diner->diner->diner_nickname}}
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
                            @foreach ($table_diner->menuTableDiners as $command)
                                <tr>
                                    <td>
                                        <strong>{{$command->menu->name}}</strong>
                                        <br>
                                        <small>{{$command->comments}}</small>
                                    </td>
                                    <td>{{$command->quantity}}</td>
                                    <td>${{number_format($command->menu->price,2,'.',',')}}</td>
                                    @php
                                        $subtotal += $command->subtotal();
                                    @endphp
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
                {{-- @foreach (Cart::instance($table_name)->content()->groupBy('options.diner_id') as $content)
                    <div id="headingdiner{{$content[0]->options->diner_id}}" class="card-header" data-toggle="collapse" role="button" data-target="#diner{{$content[0]->options->diner_id}}" aria-expanded="false" aria-controls="diner{{$content[0]->options->diner_id}}">
                        <span class="lead collapse-title">
                            @php
                                $diner = \App\Diner::findOrFail($content[0]->options->diner_id);
                            @endphp
                            {{$diner->diner_nickname}}
                        </span>
                    </div>
                    
                    
                    <div id="diner{{$content[0]->options->diner_id}}" role="tabpanel" aria-labelledby="headingdiner{{$content[0]->options->diner_id}}" class="collapse">
                        <div class="card-content">
                            <div class="card-body">
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
                                        @foreach ($content as $command)
                                            <tr>
                                                <td>
                                                    <strong>{{$command->name}}</strong>
                                                    <br>
                                                    <small>{{$command->options->comments}}</small>
                                                </td>
                                                <td>{{$command->qty}}</td>
                                                <td>${{number_format($command->price,2,'.',',')}}</td>
                                                <td>
                                                    <i class="fa fa-trash" onclick="delete_item('{{$command->rowId}}_{{$table_name}}',)"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach --}}

                
            </div>
        </div>
    </li>
</ul>

<ul class="list-group list-group-flush">
    {{-- <li class="list-group-item" align="right">
        Subtotal : ${{number_format(str_replace(",","",Cart::instance($table_name)->subtotal()),2,'.',',')}}
    </li> --}}
    <li class="list-group-item" align="right">
        Total: ${{number_format($subtotal,2,'.',',')}}
    </li>
    <li class="list-group-item">
        <form action="{{ route('menu-table-diners.store') }}" method="POST">
            @csrf
            <button class="btn btn-success btn-block">
                <i style="font-size: 20px" class="fa fa-caret-right"></i> <strong style="font-size: 20px"> &nbsp &nbsp Cerrar cuenta </strong>
            </button>
        </form>
    </li>
</ul>
