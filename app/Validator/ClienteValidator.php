<?php
    
namespace App\Validator;

use Illuminate\Support\Facades\Validator;


class ClienteValidator {

    function validarCamposObrigatorios($request){
        
        $validator = Validator::make($request->all(), [
            'cpf' => 'required',
            'nome' => 'required',
            'data_nascimento' => 'required|date',
            'sexo' => 'required',
            'endereco' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
        ]);
        
    }

}