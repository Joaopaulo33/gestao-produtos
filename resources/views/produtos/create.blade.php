<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Produto</title>
</head>
<body>

<h1>Cadastrar Novo Produto</h1>

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

<form action="{{ route('produtos.store') }}" method="POST">
    @csrf
    <div>
        <strong>Código:</strong>
        <input type="text" name="codigo" placeholder="Código do Produto">
    </div>
    <br>
    <div>
        <strong>Descrição:</strong>
        <input type="text" name="descricao" placeholder="Descrição do Produto">
    </div>
    <br>
    <div>
        <button type="submit">Salvar</button>
        <a href="{{ route('produtos.index') }}">Voltar</a>
    </div>
</form>

</body>
</html>