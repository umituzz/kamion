@extends('layouts.master')

@section('content')

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">{{ __('Create Product') }}</h1>
                        </div>

                        <form class="user" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">

                            @include('product.form')

                            <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Create') }}</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
