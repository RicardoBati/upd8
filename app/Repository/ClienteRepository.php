<?php
    
namespace App\Repository;

use App\Models\Cliente;

class ClienteRepository {

    public function buscarTodosClientes()  {
        $query = Cliente::query();
        $clientes = $query->get();
        $clientes = $query->paginate(20); // Paginação

        return $clientes;
    }

    public function cadastrarCliente($request)  {

        $cliente = new Cliente();
        $cliente->cpf = $request->input('cpf');
        $cliente->nome = $request->input('nome');
        $cliente->data_nascimento = $request->input('data_nascimento');
        $cliente->sexo = $request->input('sexo');
        $cliente->endereco = $request->input('endereco');
        $cliente->estado = $request->input('estado');
        $cliente->cidade = $request->input('cidade');
        $cliente->save();

        return $cliente;
    }

    public function atualizarCliente($request, $id)  {

        $cliente = Cliente::findOrFail($id);
        $cliente->cpf = $request->input('cpf');
        $cliente->nome = $request->input('nome');
        $cliente->data_nascimento = $request->input('data_nascimento');
        $cliente->sexo = $request->input('sexo');
        $cliente->endereco = $request->input('endereco');
        $cliente->estado = $request->input('estado');
        $cliente->cidade = $request->input('cidade');
        $cliente->save();

        return $cliente;
    }

    public function deletarCliente($id)  {

        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return $cliente;
    }

    public function filtrarClientes($request)  {

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

        return $clientes;
    }

} 