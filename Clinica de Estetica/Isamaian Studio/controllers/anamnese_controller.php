<?php

require_once '../config/bootstrap.php';
require_once '../models/anamnese_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
$dados = [

        'id_paciente'             => $_POST['id_paciente'],
        'data_anamnese'           => $_POST['data_anamnese'],
        'profissional_responsavel'=> $_POST['profissional_responsavel'],
        'queixa_principal'        => $_POST['queixa_principal'],
        'possui_doenca'           => $_POST['possui_doenca'],
        'tratamento_medico'       => $_POST['tratamento_medico'],
        'alergias'                => $_POST['alergias'],
        'uso_medicamentos'        => $_POST['uso_medicamentos'],
        'problemas_pele'          => $_POST['problemas_pele'],
        'procedimento_estetico'   => $_POST['procedimento_estetico'],
        'observacoes_adicionais'  => $_POST['observacoes_adicionais']

    ];

    $cadastro = cadastrarAnamnese(
        $conexao,
        $dados
    );

    if ($cadastro) {

        header(
            'Location: ../app/anamnese.php?sucesso=1'
        );

        exit();

    }

}