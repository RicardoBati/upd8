<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Repository\ClienteRepository;
use App\Validator\ClienteValidator;


class ClienteController extends Controller
{
    // Mostra uma lista dos clientes
    public function index()
    {
        try {
            $clienteRepository = new ClienteRepository;
            $clientes = $clienteRepository->buscarTodosClientes();
        } catch (\Throwable $th) {
            throw $th;
        }

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
        $clienteValidator = new ClienteValidator;
        $validarCampos = $clienteValidator->validarCamposObrigatorios($request);

        if ($validarCampos) {
            return redirect()->back()->withErrors($validarCampos)->withInput();
        }

        try {
            $clienteRepository = new ClienteRepository;
            $clienteRepository->cadastrarCliente($request);
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso.');
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
        $clienteValidator = new ClienteValidator;
        $validarCampos = $clienteValidator->validarCamposObrigatorios($request);

        if ($validarCampos) {
            return redirect()->back()->withErrors($validarCampos)->withInput();
        }

        try {
            $clienteRepository = new ClienteRepository;
            $clienteRepository->atualizarCliente($request,$id);
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    // Remove um cliente do banco de dados
    public function destroy($id)
    {
        try {
            $clienteRepository = new ClienteRepository;
            $clienteRepository->deletarCliente($id);
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso.');
    }

    public function pesquisar(Request $request)
    {
        try {
            $clienteRepository = new ClienteRepository;
            $clientes = $clienteRepository->filtrarClientes($request);
        } catch (\Throwable $th) {
            throw $th;
        }
        return view('clientes.index', ['clientes' => $clientes]);
    }

}
