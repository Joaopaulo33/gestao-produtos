<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Listar todos os produtos ativos.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', ['produtos' => $produtos]);
    }

    /**
     * Mostrar o formulário para criar um novo produto.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Salvar um novo produto no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados
$validatedData = $request->validate([
    'codigo' => 'required|string|max:30|unique:produtos,codigo',
    'descricao' => 'required|string|max:60',
]);

Produto::create($validatedData); // Use os dados validados
        return redirect()->route('produtos.index')
                         ->with('success', 'Produto cadastrado com sucesso.');
    }

    /**
     * Mostrar o formulário para editar um produto.
     */
    public function edit(Produto $produto)
    {
        return view('produtos.edit', ['produto' => $produto]);
    }

    /**
     * Atualizar um produto no banco de dados.
     */
    public function update(Request $request, Produto $produto)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:30|unique:produtos,codigo,' . $produto->id,
            'descricao' => 'required|string|max:60',
        ]);

        $produto->update($validatedData); // Use os dados validados

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto atualizado com sucesso.');
    }

    /**
     * "Excluir" um produto (soft delete).
     */
    public function destroy(Produto $produto)
    {
        // O registro não é removido, apenas o campo 'deleted_at' é preenchido.
        $produto->delete();

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto desativado com sucesso.');
    }
}