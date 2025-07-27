<!DOCTYPE html>
<html>
<head>
    <title>Lista de Produtos</title>
</head>
<body>

<h1>Lista de Produtos</h1>

<a href="{{ route('produtos.create') }}">Cadastrar Novo Produto</a>
<hr>

@if ($message = Session::get('success'))
    <p style="color: green;">{{ $message }}</p>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Código</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>
    @foreach ($produtos as $produto)
    <tr>
        <td>{{ $produto->id }}</td>
        <td>{{ $produto->codigo }}</td>
        <td>{{ $produto->descricao }}</td>
        <td>
            <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja desativar este produto?')">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>