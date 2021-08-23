@extends('layouts.admin')
@section('title','Categoria ' . $category->name)
@section('styles')
<style type="text/css">
.unstyled-button {
    border: none;
    padding: 0;
    background: none;
}
</style>
@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalles categoría {{ $category->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="far fa-futbol"></i>
                        {{$category->name}}
                    </h4>
                    <ul class="solid-bullet-list">
                        <li>
                            <h5>4 people shared a post
                                <span class="float-right text-muted font-weight-normal small">8:30 AM</span>
                            </h5>
                            <p class="text-muted">It was an awesome work!</p>
                            <div class="image-layers">
                                <div class="img-sm profile-image-text bg-warning rounded-circle image-layer-item">M
                                </div>
                                <img class="img-sm rounded-circle image-layer-item" src="images/faces/face3.jpg"
                                    alt="profile">
                                <img class="img-sm rounded-circle image-layer-item" src="images/faces/face5.jpg"
                                    alt="profile">
                                <img class="img-sm rounded-circle image-layer-item" src="images/faces/face8.jpg"
                                    alt="profile">
                            </div>
                        </li>

                    </ul>

                </div>
                <div class="card-footer">
                    {!! Form::open(['route'=>['categories.destroy',$category], 'method'=>'DELETE'])
                    !!}


                    <a href="{{route('categories.edit', $category)}}"
                        class="btn btn-sm btn-info btn btn-outlline-dark">Editar</a>
                    <button type="submit"
                        class="btn btn-sm btn-danger btn btn-outlline-dark float-right">Eliminar</button>



                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">Subcategorías</div>
                        <div class="btn-group pb-2">
                            <button class="btn btn-sm btn-primary btn-icon-text" data-toggle="modal"
                                data-target="#createModal">
                                Agregar <i class="btn-icon-append fas fa-plus"></i>
                            </button>
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
                                @foreach($subcategories as $subcategory)
                                <tr>
                                    <th scope="row">{{$subcategory->id}}</th>
                                    <td class=" text-center">
                                        <a href="#" class="getProducts"
                                            data-artid="{{$subcategory->id}}">{{$subcategory->name}}</a>
                                    </td>
                                    <td>{{$subcategory->description}}</td>
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['subcategories.destroy',$subcategory],
                                        'method'=>'DELETE'])
                                        !!}

                                        <a class="jsgrid-button jsgrid-edit-button"
                                            href="{{route('subcategories.edit', $subcategory)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit"
                                            title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createModal">
                                        Registrar Subcategoría
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {!! Form::open(['route'=>'subcategories.store', 'method'=>'POST']) !!}
                                <div class="modal-body">
                                    <input type="hidden" name="category_id" value="{{$category->id}}">
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
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">Productos</div>
                    </div>

                    <div class="table-responsive">
                        <table id="products" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th>Precio</th>
                                    <th>Existencias</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
<script>
$(function() {
    $('.getProducts').click(function() {
        var elem = $(this);
        $.ajax({
            type: 'GET',
            url: '/getProductsBySubcategory',
            data: "subcategory_id=" + elem.attr('data-artid'),
            dataType: 'json',
            success: function(data1) {
                //Destruir la tabla primero
                $('#products').dataTable().fnDestroy();
                $('#products').DataTable({
                    "data": data1.data,
                    "columns": [{
                            "data": "id"
                        },
                        {
                            "data": "name"
                        },
                        {
                            "data": "sell_price"
                        },
                        {
                            "data": "stock"
                        },
                    ]
                });
            }
        });
        return false;
    });
});
</script>
@endsection