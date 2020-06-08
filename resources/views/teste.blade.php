<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <!-- Formato de impressão de váriaveis utilizando o controller -->
    Colocando uma variável na página: {{ $teste }} 
    <br />
    Colocando uma segunda variável na página: {{ $teste2 }}
    <br />
    <br />
    <br />
    Colocando uma variável na página com html bloqueado: {{ $teste_html }} 
    <br />
    Colocando uma variável na página com html sem htmlspecialchars: {!! $teste_html2 !!} 
</body>
</html>