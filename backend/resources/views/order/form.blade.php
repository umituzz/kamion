@csrf

<div class="form-group row">

    <div class="col-sm-3 mb-3 mb-sm-0">
        @isset($product->image)
            <div>
                <img src="{{ asset(ProductEnums::UPLOAD_PATH . $product->image) }}" width="250" height="100">
            </div>
        @endisset
        <input name="image" type="file" class="form-control-file" id="exampleInputEmail"
               placeholder="{{ __('Image') }}">
            @if($errors->has('image'))
                <span style="color:red">{{ $errors->first('image') }}</span>
            @endif
    </div>

    <div class="col-sm-3 mb-3 mb-sm-0">
        <input name="name" type="text" class="form-control form-control-user" id="name"
               placeholder="{{ __('Product Name') }}" value="{{ $product->name ?? NULL }}">
        @if($errors->has('name'))
            <span style="color:red">{{ $errors->first('name') }}</span>
        @endif
    </div>

</div>

