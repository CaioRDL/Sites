<?php

require_once '../config/bootstrap.php';
require_once '../models/profissional_model.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dados = [
        'nome_profissional' => $_POST['nome_profissional'],
        'telefone_profissional' => $_POST['telefone_profissional'],
        'email_profissional' => $_POST['email_profissional'],
        'especialidade' => $_POST['especialidade'],
        'status_profissional' => $_POST['status_profissional']
    ];

    cadastrarProfissional($dados);

    header('Location: ../app/profissionais.php?sucesso=1');
    exit;
}