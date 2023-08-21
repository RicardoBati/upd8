@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <div class="border bg-light p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1>Pesquisar Clientes</h1>
                </div>
                <div class="col-md-2 offset-md-5">
                    <a href="{{ route('clientes.create') }}" class="btn btn-success form-control">Cadastrar Novo Cliente</a>
                </div>
            </div>
        </div>
        <br><br>

        <form action="{{ route('clientes.pesquisar') }}" method="GET">
            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="data_nascimento">Data de Nascimento:</label>
                        <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="{{ old('data_nascimento') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="sexo">Sexo:</label>
                        <select name="sexo" class="form-select">
                            <option value="">Selecione</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select><br>
                    </div>

                    <div class="col-md-6">
                        <label for="endereco">Endereco:</label>
                        <input type="text" name="endereco" id="endereco" class="form-control" value="{{ old('endereco') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" id="estado" class="form-control" value="{{ old('estado') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" class="form-control" value="{{ old('cidade') }}">
                    </div>
                </div>

                <div class="col-md-2">
                    <br>
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Ações</th>
                    </tr>
                <thead>

                @if (!empty($clientes))
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->cpf }}</td>
                            <td>{{ $cliente->data_nascimento }}</td>
                            <td>{{ $cliente->sexo }}</td>
                            <td>{{ $cliente->endereco }}</td>
                            <td>{{ $cliente->estado }}</td>
                            <td>{{ $cliente->cidade }}</td>
                            <td>
                                <div style="display: flex;">
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <h5>Nenhum cliente encontrado.</h5>
                @endif
            </table>
            @if (!empty($clientes))
            <div>
                {{ $clientes->render() }} <!-- Adiciona a navegação da paginação -->
            </div>
            @endif
        </div>
    </div>
@endsection
