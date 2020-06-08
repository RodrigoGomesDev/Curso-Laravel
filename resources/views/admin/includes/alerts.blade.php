<!--Criando uma validação padrão utilizando uma váriavel do laravel-->
@if ($errors->any())
    <div class="alert alert-warning">
        <ul class="mb-0">
            <!--Desestruturando todos os errors em <li's>-->
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif