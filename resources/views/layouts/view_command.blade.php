<div class="customizer d-none d-md-block">
    <a class="customizer-close" href="javascript:;"><i class="feather icon-x"></i></a><a class="customizer-toggle" href="#"><i class="feather icon-settings fa fa-spin fa-fw white"></i></a>
    <div class="customizer-content p-2 ps ps--active-y">
        <h4 class="text-uppercase mb-0">Comanda</h4>
        <hr />
        <!-- Menu Colors Starts -->
        <div id="customizer-theme-colors">
            <div id="list_commands">
                @include('backend.menu_table_diners.list_command',['table_name' => $menu_table_diner->invoice])
            </div>
        </div>
        @php
            $bandera = 0;
        @endphp
        @foreach ($menu_table_diner->tableDiners as $table_diner)
            @if ($table_diner->menuTableDiners->count() > 0)
                @php
                    $bandera ++;
                @endphp
            @endif
        @endforeach
        @if ($bandera > 0)
            <div id="customizer-theme-colors">
                <div id="list_commands">
                    @include('backend.menu_table_diners.list_command_processed',['menu_table_diner' => $menu_table_diner])
                </div>
            </div>
        @endif
    </div>
</div>
