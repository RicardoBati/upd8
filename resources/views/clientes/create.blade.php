@extends('layouts.app')

@section('title', 'Cadastro de Cliente')

@section('content')
    <div class="border bg-light p-3">

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1>Cadastrar Cliente</h1>
                </div>
            </div>
        </div>
        <br><br>
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" class="form-control" required><br>
                    </div>

                    <div class="col-md-3">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" class="form-control" required><br>
                    </div>

                    <div class="col-md-3">
                        <label for="data_nascimento">Data de Nascimento:</label>
                        <input type="date" name="data_nascimento" class="form-control" required><br>
                    </div>

                    <div class="col-md-3">
                        <label for="sexo">Sexo:</label>
                        <select name="sexo" class="form-select" required>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select><br>
                    </div>

                    <div class="col-md-4">
                        <label for="endereco">Endereço:</label>
                        <input type="text" name="endereco" class="form-control" required><br>
                    </div>

                    <div class="col-md-4">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" class="form-control" required><br>
                    </div>

                    <div class="col-md-4">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" class="form-control" required><br>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>

@endsection
