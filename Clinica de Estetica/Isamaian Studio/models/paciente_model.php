<?php

require_once '../config/bootstrap.php';
function cadastrarPaciente($dados){

    global $conexao;

    $sql = "

        INSERT INTO pacientes(

            nome_completo,
            data_nascimento,
            cpf,
            telefone,
            email,
            genero,
            endereco,
            observacoes

        )

        VALUES(

            :nome_completo,
            :data_nascimento,
            :cpf,
            :telefone,
            :email,
            :genero,
            :endereco,
            :observacoes

        )

    ";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':nome_completo',      $dados['nome_completo']);
    $stmt->bindValue(':data_nascimento',    $dados['data_nascimento']);
    $stmt->bindValue(':cpf',                $dados['cpf']);
    $stmt->bindValue(':telefone',           $dados['telefone']);
    $stmt->bindValue(':email',              $dados['email']);
    $stmt->bindValue(':genero',             $dados['genero']);
    $stmt->bindValue(':endereco',           $dados['endereco']);
    $stmt->bindValue(':observacoes',        $dados['observacoes']);

    return $stmt->execute();

}