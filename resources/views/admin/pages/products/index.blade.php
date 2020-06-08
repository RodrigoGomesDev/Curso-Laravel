
<!--Praticamente importando o app.blade, para usar um layout padrão-->
@extends('admin.layouts.app')

@section('title', 'Gestão de Conteúdo')


@section('content')
<h1 class="text-center mb-4">Exibindo os produtos</h1>

<div class="container">
    <a href="{{ route('products.create') }}" class="btn btn-primary" >Cadastrar</a>

    <hr />

    <form action="{{ route('products.search') }}" method="post" class="form form-inline">
        @csrf
    <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}" />
        <button type="submit" class="btn btn-info">Pesquisar</button>
    </form>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th width="-10">Image</th>
                <th>Nome</th>
                <th>Preço</th>
                {{-- <th><a href="{{Order::url("$product->name")}}">Nome</a></th> --}}
                {{-- <th><a href="{{Order::url("$product->price")}}">Preço</a></th> --}}
                <th width="100">Ações</th>
            <tr>
        <thead>
        <tbody>            
            @foreach ($products as $product)
                <tr>
                    <td>
                        @if ($product->image)
                            <img src={{ url("storage/$product->image") }} alt="{{$product->name}}" style="width: 100px; height: 100px; border-radius:5px" >
                        @else
                            
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                    <div class="d-flex flex-row ">
                        <a href="{{ route('products.edit', $product->id ) }}" class="mr-2">Editar</a>
                        <a href="{{ route('products.show', $product->id ) }}" class="ml-2">Detalhes</a>
                    </div> 
                    </td>
                <tr>
            @endforeach
        </tbody>
    </table>

</div>

@if (isset($filters))
{!! $products->appends($filters)->links() !!}
@else
{!! $products->links() !!}
@endif
@endsection


    {{-- @component('admin.components.card')
    @slot('title')
        <h1>titulo</h1>
    @endslot
    Um card de exemplo
    @endcomponent

    <!--Incluindo o arquivo alerts dentro deste arquivo, e setando o content dela-->

    <hr />

    @include('admin.includes.alerts', ['content'=> 'O valor execedeu o limite'])

    <hr />

    <!--===============================================================================-->


    <!--Se a variavel existir, o foreach desestrutura ela, e mostra cada elemento que ela contém-->

    @if (isset($products))
        @foreach ($products as $product)
            <p>{{ $product }}</p>
        @endforeach
    @endif

    <hr />

    <!--Forma mais simplificada de se fazer-->

    @forelse ($products as $product)
        <p>{{ $product }}</p>
    @empty
        <p>Não existem produtos cadastrados.</p>
    @endforelse

    <hr />

    @forelse ($products as $product)
        <p class="@if ($loop->last) last @endif">{{ $product }}</p>
    @empty
        <p>Não existem produtos cadastrados.</p>
    @endforelse

    <hr />
    <!--===============================================================================-->


    <!--else e if basico-->

    @if ($teste_num === 123)
        é igual
    
        @elseif ($teste_num == '123')
            É igual a 123 string

            @else 
                É diferente
    @endif

    <!--===============================================================================-->

    <br />
    <br />

    <!--É tipo um if/else, só que ao contrário, ele mostra apenas o valor falso-->
    <!--Ele aceita else, mas como o else não da pra colocar valor, ele sempre aparecera-->

    @unless ($teste_num === '123')
        É falso :)
    @endunless

    <!--===============================================================================-->


    <!--Um estilo de if/else que verifíca se uma variável existe-->
    <!--É possível utilizar o else tambem-->
    @isset($teste2)
        <p>Váriavel existênte</p>
        @else 
        <p>Variável inexistênte</p>
    @endisset

    <!--===============================================================================-->

    <!--Verifica se a variável tem conteúdo dentro, se ela está vazia ou não-->
    <!--É possível utilizar o else tambem-->
    <!--Ao contrário, o que estiver dentro do else, diz que a váriavel tem conteúdo-->
    @empty($teste2)
    <p>A váriavel não tem conteúdo</p>
    @else 
    <p>A váriavel tem conteúdo</p>
    @endempty

    <!--===============================================================================-->

    @switch($teste)
        @case(1)
            Igual 1
            @break
        @case(2)
            Igual 2           
            @break
        @case(123)
            Igual 123
        @default
            Default
    @endswitch
     


<!--Empurrando o style pra baixo do código, e deixando ele no header-->
@push('styles')
<style>
    html, body {
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    height: 100vh;
    }

    .last {background: #CCC;}
</style>


@endpush
@push('scripts')
    <script>
        document.body.style.background = "#f1f1f1"
    </script>
@endpush --}}