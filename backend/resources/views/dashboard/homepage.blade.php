@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-lg-12">

            <div class="card mb-4">
                <div class="card-header">
                    {{ __('Welcome!') }}
                </div>
                <div class="card-body">
                    {{ __('You can create your own refrigerator and putting inside your products. You can see recipes and make comments about them. And also you can like or dislike.') }}
                </div>
            </div>

        </div>

    </div>

    @can('Order Management')
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    {{ __('Total Refrigerators') }}
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOrders }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan


@endsection
