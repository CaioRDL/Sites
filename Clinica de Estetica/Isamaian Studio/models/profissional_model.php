<?php

require_once '../config/bootstrap.php';

function cadastrarProfissional($dados)
{
    global $conexao;

    $sql = "
        INSERT INTO profissionais (
            nome_profissional,
            telefone_profissional,
            email_profissional,
            especialidade,
            status_profissional
        )
        VALUES (
            :nome_profissional,
            :telefone_profissional,
            :email_profissional,
            :especialidade,
            :status_profissional
        )
    ";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':nome_profissional', $dados['nome_profissional']);
    $stmt->bindValue(':telefone_profissional', $dados['telefone_profissional']);
    $stmt->bindValue(':email_profissional', $dados['email_profissional']);
    $stmt->bindValue(':especialidade', $dados['especialidade']);
    $stmt->bindValue(':status_profissional', $dados['status_profissional']);

    return $stmt->execute();
}

function listarProfissionais()
{
    global $conexao;

    $sql = "
        SELECT *
        FROM profissionais
        ORDER BY nome_profissional ASC
    ";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}