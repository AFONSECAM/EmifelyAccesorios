@extends('layouts.admin')
@section('title','Editar producto')
@section('styles')
{!! Html::style('melody/vendors/summernote/dist/summernote-bs4.css') !!}
{!! Html::style('melody/vendors/lightgallery/css/lightgallery.css') !!}
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Edición de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de producto</li>
            </ol>
        </nav>
    </div>
    {!! Form::model($product,['route'=>['products.update',$product], 'method'=>'PUT','files' => true]) !!}
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $product->name) }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">Código de barras</label>
                                <input type="text" name="code" id="code"
                                    class="form-control @error('code') is-invalid @enderror"
                                    value="{{ old('code', $product->code) }}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sell_price">Precio de venta</label>
                                <input type="number" name="sell_price"
                                    value="{{ old('sell_price', $product->sell_price) }}" id="sell_price"
                                    class="form-control @error('sell_price') is-invalid @enderror"
                                    aria-describedby="helpId" required>
                                @error('sell_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Extracto</label>
                        <textarea class="form-control @error('short_description') is-invalid @enderror"
                            name="short_description" id="short_description"
                            rows="3">{{ old('short_description', $product->short_description) }}</textarea>
                        @error('short_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Descripción</label>
                        <textarea name="long_description" id="summernoteExample" rows="8"
                            class="form-control @error('long_description') is-invalid @enderror">{{ old('long_description', $product->long_description) }}</textarea>
                        @error('long_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category">Categoría</label>
                        <select class="select2 form-control @error('category_id') is-invalid @enderror"
                            name="category_id" id="category_id" style="width: 100%;">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if ($category->id == $product->subcategory->category_id)
                                selected
                                @endif
                                >{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subcategory_id">Subcategoria</label>
                        <select class="select2 form-control @error('subcategory_id') is-invalid @enderror"
                            name="subcategory_id" id="subcategory_id" style="width: 100%;">
                            @if(isset($product->subcategory_id))
                            <option value="{{ $product->subcategory_id}}">{{ $product->subcategory->name}}</option>
                            @endif
                        </select>
                        @error('subcategory_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="provider_id">Proveedor</label>
                        <select class="select2 form-control @error('provider_id') is-invalid @enderror"
                            name="provider_id" id="provider_id" style="width: 100%;">
                            @foreach ($providers as $provider)
                            <option value="{{$provider->id}}" @if ($provider->id == $product->provider_id)
                                selected
                                @endif
                                >{{$provider->name}}</option>
                            @endforeach
                        </select>
                        @error('provider_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Etiquetas</label>
                        <select class="select2 @error('tags[]') is-invalid @enderror" name="tags[]" id="tags"
                            style="width: 100%;" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{$tag->id}}"
                                {{ collect($product->tags->pluck('id'))->contains($tag->id) ? 'selected' : ''}}>
                                {{$tag->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('tags[]')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h4 class="card-title">Cargar imágenes</h4>
                        <div class="file-upload-wrapper">
                            <div id="fileuploader">Subir</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Imagenes del producto</h4>
                    <div id="lightgallery" class="row lightGallery">
                        @foreach($product->images as $image)
                        <a href="{{$image->url}}" class="image-tile">
                            <img src="{{$image->url}}" alt="image small">
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mr-2">Editar</button>
    <a href="{{route('products.index')}}" class="btn btn-light">
        Cancelar
    </a>
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/select2.js') !!}
<script>
$(document).ready(function() {
    $('#category').select2();
    $('#subcategory_id').select2();
    $('#provider_id').select2();
    $('#tags').select2();
});
</script>
<script>
(function($) {
    'use strict';
    if ($("#fileuploader").length) {
        $("#fileuploader").uploadFile({
            url: "/upload/product/{{$product->id}}/image",
            fileName: "image"
        });
    }
})(jQuery);
</script>


{!! Html::script('melody/vendors/tinymce/tinymce.min.js') !!}
{!! Html::script('melody/vendors/tinymce/themes/modern/theme.js') !!}
{!! Html::script('melody/vendors/summernote/dist/summernote-bs4.min.js') !!}
{!! Html::script('melody/vendors/lightgallery/js/lightgallery-all.min.js') !!}
{!! Html::script('melody/js/editorDemo.js') !!}
{!! Html::script('melody/js/light-gallery.js') !!}


<script>
var category = $('#category_id');
var subcategory = $('#subcategory_id');
category.change(function() {
    $.ajax({
        url: "{{ route('get_subcategories')}}",
        method: 'GET',
        data: {
            category: category.val(),
        },
        success: function(data) {
            console.log(data);
            subcategory.empty();
            subcategory.append('<option disabled selected>-- Seleccione algo --</option>');
            $.each(data, function(index, element) {
                subcategory.append('<option value="' + element.id + '">' + element.name +
                    '</option>');
            })

        }
    })
})
</script>

@endsection