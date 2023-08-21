@extends('layouts.app')

@section('title', 'Edição de Clientes')

@section('content')
    <h1>Editar Cliente</h1>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" value="{{ $cliente->cpf }}" class="form-control" required><br>
                </div>

                <div class="col-md-3">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" value="{{ $cliente->nome }}" class="form-control" required><br>
                </div>

                <div class="col-md-3">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" name="data_nascimento" value="{{ $cliente->data_nascimento }}" class="form-control" required><br>
                </div>

                <div class="col-md-3">
                    <label for="sexo">Sexo:</label>
                    <select name="sexo" class="form-select" required>
                        <option value="M" {{ $cliente->sexo === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ $cliente->sexo === 'Feminino' ? 'selected' : '' }}>Feminino</option>
                    </select><br>
                </div>

                <div class="col-md-3">
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" value="{{ $cliente->endereco }}" class="form-control" required><br>
                </div>

                <div class="col-md-3">
                    <label for="estado">Estado:</label>
                    <input type="text" name="estado" value="{{ $cliente->estado }}" class="form-control" required><br>
                </div>

                <div class="col-md-3">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" value="{{ $cliente->cidade }}" class="form-control" required><br>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
