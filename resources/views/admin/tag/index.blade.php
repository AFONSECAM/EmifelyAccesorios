@extends('layouts.admin')
@section('title','Gestión de tags')
@section('styles')
<style type="text/css">
.unstyled-button {
    border: none;
    padding: 0;
    background: none;
}
</style>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Tags
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tags</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card tarjeta">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <div class="card-title"></div>
                        <div class="btn-group pb-2">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('tags.create')}}" class="dropdown-item">Agregar</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                <tr>
                                    <th scope="row">{{$tag->id}}</th>
                                    <td class="text-center">
                                        <strong>{{$tag->name}}</strong>
                                    </td>
                                    <td>{{$tag->description}}</td>
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['tags.destroy',$tag], 'method'=>'DELETE'])
                                        !!}

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('tags.edit', $tag)}}"
                                            title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit"
                                            title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>

                                        <button type="button" class="jsgrid-button jsgrid-delete-button unstyled-button"
                                            data-toggle="modal" data-target="#exampleModal-{{ $tag->id}}"> <i
                                                class="far fa-plus-square" title="Agregar subcategoría"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                <!-- Modal starts -->
                                <div class="modal fade" id="exampleModal-{{$tag->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel-{{$tag->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel-{{$tag->id}}">
                                                    Registrar Subcategoría
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            {!! Form::open(['route'=>'subcategories.store', 'method'=>'POST']) !!}
                                            <div class="modal-body">
                                                <input type="hidden" name="category_id" value="{{$tag->id}}">
                                                <div class="form-group">
                                                    <label for="name">Nombre</label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        placeholder="Nombre" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Descripción</label>
                                                    <textarea class="form-control" name="description" id="description"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                                                <button type="button" class="btn btn-light"
                                                    data-dismiss="modal">Cancelar</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    <!-- Modal Ends -->
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection