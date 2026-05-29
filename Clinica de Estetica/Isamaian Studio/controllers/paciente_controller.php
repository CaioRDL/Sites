<?php

require_once '../models/paciente_model.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $dados = [

        'nome_completo'   => $_POST['nome_completo'],
        'data_nascimento' => $_POST['data_nascimento'],
        'cpf'             => $_POST['cpf'],
        'telefone'        => $_POST['telefone'],
        'email'           => $_POST['email'],
        'genero'          => $_POST['genero'],
        'endereco'        => $_POST['endereco'],
        'observacoes'     => $_POST['observacoes']

    ];

    $cadastro = cadastrarPaciente($dados);

    if($cadastro){

        header('Location: ../app/pacientes.php?sucesso=1');
        exit();

    }

}