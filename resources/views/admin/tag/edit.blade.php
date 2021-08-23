@extends('layouts.admin')
@section('title','Editar tag')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar tag
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('tags.index')}}">Tags</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar tag</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    {!! Form::model($tag,['route'=>['tags.update',$tag], 'method'=>'PUT']) !!}


                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" value="{{$tag->name}}" class="form-control"
                            placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" id="description"
                            rows="3">{{$tag->description}}</textarea>
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{ URL::previous() }}" class="btn btn-light">
                        Cancelar
                    </a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection