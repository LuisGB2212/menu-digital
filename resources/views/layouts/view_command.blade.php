<div class="customizer d-none d-md-block">
    <a class="customizer-close" href="javascript:;"><i class="feather icon-x"></i></a><a class="customizer-toggle" href="#"><i class="feather icon-settings fa fa-spin fa-fw white"></i></a>
    <div class="customizer-content p-2 ps ps--active-y">
        <h4 class="text-uppercase mb-0">Camanda</h4>
        <small>Customize &amp; Preview in Real Time</small>
        <hr />
        <!-- Menu Colors Starts -->
        <div id="customizer-theme-colors">
            <div id="list_commands">
                @include('backend.menu_table_diners.list_command',['table_name' => $menu_table_diner->table_name])
            </div>
        </div>
    </div>
</div>
