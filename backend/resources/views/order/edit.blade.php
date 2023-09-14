@extends('layouts.master')

@section('content')

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">{{ __('Order Details') }}</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('orders.update', $order->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">

                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <select name="order_status_id" class="form-select form-control"
                                            aria-label="{{ __('Order Status') }}">
                                        @isset($statuses)
                                            @forelse($statuses as $status)
                                                <option
                                                    {{ $status->id == ($order->order_status_id ?? NULL) ? 'selected' : NULL }}
                                                    value="{{ $status->id }}">{{ $status->name }}</option>
                                            @empty
                                            @endforelse
                                        @endisset
                                    </select>
                                    @if($errors->has('order_status_id'))
                                        <span style="color:red">{{ $errors->first('order_status_id') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Edit') }}
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
