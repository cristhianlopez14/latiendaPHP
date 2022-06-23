@extends('layouts.menu')

@section('contenido')
@if(session('mensajito'))
<div class="row">
    <p file-path-wrapper>{{ session('mensajito') }}</p>
</div>
@endif
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="row">
    <h1 class="brown-text text-darken-4">Nuevo Producto</h1>
</div>
<div class="row">
    <form action="{{ route('productos.store')}}" class="col s8" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col s8 input-field">
                <input  type="text" id="nombre" name="nombre" placeholder="Nombre Producto" />
                <label for="nombre">Nombre Producto</label>
                <strong>{{ $errors->first('nombre') }}</strong>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <textarea name="desc" id="desc" class="materialize-textarea" placeholder="Descripcion Producto"></textarea>
                <label for="desc">Descripción</label>
                <strong>{{ $errors->first('desc') }}</strong>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <input type="text" id="precio" name="precio" placeholder="Precio Producto">
                <label for="precio">Precio Producto</label>
                <strong>{{ $errors->first('precio') }}</strong>
            </div>
        </div>
        <div class="row">
            <div class="col s8 file-field input-field">
                <div class="btn"> 
                <span>Imagen Del Producto</span>
                <input type="file" name="imagen"/>
             </div>
            <div class="file-path-wrapper">
                <input type="text" class="file-path">
            </div>
            </div>
            <strong>{{ $errors->first('imagen') }}</strong>
        </div>

        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca">
                <option value="">Seleccione Marca</option>
                    @foreach($marcas as $marca)
                    <option value="{{$marca->id}}">{{ $marca->nombre }}</option>
                    @endforeach
                </select>
                <label>Selecione Marca</label>
                <strong>{{ $errors->first('marca') }}</strong>
            </div>
        </div>
        <div class="row">
        <div class="col s8 input-field">
                <select name="categoria" id="categoria">
                    <option value="">Seleccione Categoria</option>
                     @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}" >{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <label>Selecione Categoria</label>
                <strong>{{ $errors->first('categoria') }}</strong>
                </div>
        </div>
        <div class="row">
            <button class="btn waves-effect waves-light" type="submit" >Guardar Producto
            <i class="material-icons right">send</i>
             </button>
        </div>
    </form>
</div>
@endsection