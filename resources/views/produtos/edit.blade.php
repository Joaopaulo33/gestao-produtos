<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
</head>
<body>

<h1>Editar Produto</h1>

@if ($errors->any())
    <div style="color: red;">
        <strong>Ops!</strong> Ocorreram alguns erros.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('produtos.update', $produto->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <strong>Código:</strong>
        <input type="text" name="codigo" value="{{ $produto->codigo }}" placeholder="Código do Produto">
    </div>
    <br>
    <div>
        <strong>Descrição:</strong>
        <input type="text" name="descricao" value="{{ $produto->descricao }}" placeholder="Descrição do Produto">
    </div>
    <br>
    <div>
        <button type="submit">Atualizar</button>
        <a href="{{ route('produtos.index') }}">Voltar</a>
    </div>
</form>

</body>
</html>