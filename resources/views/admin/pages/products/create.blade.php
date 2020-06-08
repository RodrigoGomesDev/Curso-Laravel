@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')
    
@section('content')
    <h1>Cadastrar Novo Produto</h1>

    
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ old('name') }}">
        </div class="form-group">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Preço:" name="price" value="{{ old('price') }}" >
        </div class="form-group">
        <div class="form-group">
            <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ old('description') }}">
        </div class="form-group">
        <div class="form-group">
            <input type="file" class="form-control" name="image" >
        </div class="form-group">
        @include('admin.includes.alerts')
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
            <a href="{{ route('products.index')}}">Voltar</a>            
        </div class="form-group">
        
</form>

@endsection