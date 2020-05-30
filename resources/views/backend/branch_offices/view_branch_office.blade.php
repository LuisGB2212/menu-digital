@extends('layouts.backend')

@section('content')
<section id="statistics-card">
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6" align="left">
                                <h2 class="text-bold-700">Información Restaurant / Empresa</h2>
                                <p>
                                    {{-- <strong>Nombre:</strong> {{$restaurant->restaurant_name}} <br>
                                    <strong>RFC:</strong> {{$restaurant->rfc}} --}}
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <a href="{{ route('areas.index','branch_office_id='.$branchOffice->id) }}">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">Areas</h2>
                            <p class="mb-0 line-ellipsis">{{-- {{$restaurant->restaurantUsers->count()}} --}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <a href="{{ route('branch-office-ingredients.index','branch_office_id='.$branchOffice->id) }}">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">Ingredientes</h2>
                            <p class="mb-0 line-ellipsis">{{-- {{$restaurant->restaurantUsers->count()}} --}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <a href="{{ route('restaurant-users.index') }}">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">Usuarios</h2>
                            <p class="mb-0 line-ellipsis">{{-- {{$restaurant->restaurantUsers->count()}} --}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <a href="{{ route('restaurant-users.index') }}">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">Alimentos y Bebidas</h2>
                            <p class="mb-0 line-ellipsis">{{-- {{$restaurant->restaurantUsers->count()}} --}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <a href="{{ route('table-diners.index','branch_office_id='.$branchOffice->id) }}">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">Comedor</h2>
                            <p class="mb-0 line-ellipsis">{{-- {{$restaurant->restaurantUsers->count()}} --}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection
@section('script')
@endsection