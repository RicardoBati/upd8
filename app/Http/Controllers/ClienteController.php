<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // Mostra uma lista dos clientes
    public function index()
    {
        //$clientes = [];
        $query = Cliente::query();
        $clientes = $query->get();
        $clientes = $query->paginate(20); // Paginação
        return view('clientes.index', ['clientes' => $clientes]);
    }

    // Exibe o formulário de criação de cliente
    public function create()
    {
        return view('clientes.create');
    }

    // Armazena um novo cliente no banco de dados
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->cpf = $request->input('cpf');
        $cliente->nome = $request->input('nome');
        $cliente->data_nascimento = $request->input('data_nascimento');
        $cliente->sexo = $request->input('sexo');
        $cliente->endereco = $request->input('endereco');
        $cliente->estado = $request->input('estado');
        $cliente->cidade = $request->input('cidade');
        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso.');
    }

    // Exibe um cliente específico
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', ['cliente' => $cliente]);
    }

    // Exibe o formulário de edição de cliente
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    // Atualiza um cliente no banco de dados
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->cpf = $request->input('cpf');
        $cliente->nome = $request->input('nome');
        $cliente->data_nascimento = $request->input('data_nascimento');
        $cliente->sexo = $request->input('sexo');
        $cliente->endereco = $request->input('endereco');
        $cliente->estado = $request->input('estado');
        $cliente->cidade = $request->input('cidade');
        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    // Remove um cliente do banco de dados
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso.');
    }

    public function pesquisar(Request $request)
    {
        $query = Cliente::query();

        if (!empty($_GET['cpf'])) {
            $query->where('cpf', $request->input('cpf'));
        }

        if (!empty($_GET['nome'])) {
            $query->where('nome', 'like', '%' . $request->input('nome') . '%');
        }

        if (!empty($_GET['data_nascimento'])) {
            $query->where('data_nascimento', $request->input('data_nascimento'));
        }

        if (!empty($_GET['sexo'])) {
            $query->where('sexo', $request->input('sexo'));
        }

        if (!empty($_GET['endereco'])) {
            $query->where('endereco', $request->input('endereco'));
        }

        if (!empty($_GET['estado'])) {
            $query->where('estado', $request->input('estado'));
        }

        if (!empty($_GET['cidade'])) {
            $query->where('cidade', $request->input('cidade'));
        }
        
        $clientes = $query->get();
        $clientes = $query->paginate(20); // Paginação

        return view('clientes.index', ['clientes' => $clientes]);
    }

}
