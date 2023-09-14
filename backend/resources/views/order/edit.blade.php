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
                                    <input name="name" type="text" class="form-control form-control-user" id="name"
                                           placeholder="{{ __('Product Name') }}" value="{{ $product->name ?? NULL }}">
                                    @if($errors->has('name'))
                                        <span style="color:red">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Edit') }}</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
