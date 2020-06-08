@extends('admin.layouts.app')

@section('title', "Editar Produto {$product->name}")
    
@section('content')
<h1>Editar Produto {{ $product->name }}</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ old('name') }}">
        </div class="form-group">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Preço:" name="price" value="{{ old('price')}}" >
        </div class="form-group">
        <div class="form-group">
            <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ old('description') }}">
        </div class="form-group">
        <div class="form-group">
            <input type="file" class="form-control" name="image" >
        </div class="form-group">
        @include('admin.includes.alerts')

        <button type="submit">Enviar</button>
    <a href="{{ route('products.index')}}">Voltar</a>

    </form>   

@endsection