@extends('layouts.admin')
@section('title','Registrar producto')
@section('styles')
{!! Html::style('melody/vendors/summernote/dist/summernote-bs4.css') !!}
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route'=>'products.store', 'method'=>'POST','files' => true]) !!}
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" aria-describedby="helpId" required>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">Código de barras</label>
                                <input type="text" name="code" id="code"
                                    class="form-control @error('code') is-invalid @enderror">
                                <small id="helpId" class="text-muted">Campo opcional</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sell_price">Precio de venta</label>
                                <input type="number" name="sell_price" id="sell_price"
                                    class="form-control @error('sell_price') is-invalid @enderror"
                                    aria-describedby="helpId" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Extracto</label>
                        <textarea class="form-control" name="short_description" id="short_description"
                            rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Descripción</label>
                        <textarea name="long_description" id="summernoteExample" rows="8"
                            class="form-control"></textarea>
                    </div>
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title d-flex">Imagenes</h4>
                                <input type="file" class="dropify" name="images[]" multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category">Categoría</label>
                        <select class="select2 form-control" name="category_id" id="category_id" style="width: 100%;">
                            <option value="">Seleccione una categoría</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory_id">Subcategoria</label>
                        <select class="select2 form-control @error('subcategory_id') is-invalid @enderror"
                            name="subcategory_id" id="subcategory_id" style="width: 100%;">

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="provider_id">Proveedor</label>
                        <select class="select2 form-control" name="provider_id" id="provider_id" style="width: 100%;">
                            @foreach ($providers as $provider)
                            <option value="{{$provider->id}}">{{$provider->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Etiquetas</label>
                        <select class="select2" name="tags[]" id="tags" style="width: 100%;" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
    <a href="{{route('products.index')}}" class="btn btn-light">
        Cancelar
    </a>
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/dropify.js') !!}
{!! Html::script('melody/js/dropzone.js') !!}
{!! Html::script('melody/js/select2.js') !!}


{!! Html::script('melody/vendors/tinymce/tinymce.min.js') !!}
{!! Html::script('melody/vendors/tinymce/themes/modern/theme.js') !!}
{!! Html::script('melody/vendors/summernote/dist/summernote-bs4.min.js') !!}
{!! Html::script('melody/js/editorDemo.js') !!}
<script>
$(document).ready(function() {
    $('#category').select2();
    $('#subcategory_id').select2();
    $('#provider_id').select2();
    $('#tags').select2();
});
</script>
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
            // subcategory.append('<option disabled selected>-- Seleccione algo --</option>');
            $.each(data, function(index, element) {
                subcategory.append('<option value="' + element.id + '">' + element.name +
                    '</option>');
            })

        }
    })
})
</script>
@endsection