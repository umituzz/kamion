@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">{{ __('Order Management') }}</h1>
    <div class="row">
        <div class="col-md-11 mb-2">
            <form class="col-md-12 row" action="{{ route('orders.search') }}" method="POST">
                @csrf
                <input name="search" type="text" class="form-control form-control-user col-md-2 mr-3 " id="search"
                       placeholder="{{ __('Search') }}">
                <button type="submit" class="btn btn-primary btn-user btn-block col-md-1">{{ __('Search') }}</button>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Orders') }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Load Type') }}</th>
                        <th>{{ __('Currency') }}</th>
                        <th>{{ __('Commodity') }}</th>
                        <th>{{ __('Departure City') }}</th>
                        <th>{{ __('Arrival City') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Created At') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($orders as $order)

                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->load_type  }}</td>
                            <td>{{ $order->currency }}</td>
                            <td>{{ $order->commodity }}</td>
                            <td>{{ $order->departure_city }}</td>
                            <td>{{ $order->arrival_city }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order['created_at'] }}</td>
                            <td>
                                <a href="{{ route('orders.edit', $order->id) }}"
                                   class="btn btn-primary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-flag"></i>
                                                    </span>
                                    <span class="text">{{ __('Edit') }}</span>
                                </a>
                                <a href="{{ route('orders.destroy', $order->id) }}"
                                   class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text">{{ __('Delete') }}</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                    <tfoot>
                    {{--                        {{ $orders->links() }}--}}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
