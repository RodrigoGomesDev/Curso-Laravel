<!--Praticamente importando o app.blade, para usar um layout padrão-->
@extends('admin.layouts.app')

@section('title', "Detalhes do produto $product->name ")


@section('content')
<h1>Produto {{ $product->name }}</h1>
<a href="{{ route('products.index')}}">Voltar</a>

<ul>
    <li><strong>Nome: </strong> {{ $product->name }}
    <li><strong>Price: </strong> {{ $product->price }}
    <li><strong>Description: </strong> {{ $product->description }}
</ul>

<form action="{{ route('products.destroy', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
<button type="submit" class="btn btn-danger">Deletar o produto> {{ $product->name }}</button>
</form>
@endsection