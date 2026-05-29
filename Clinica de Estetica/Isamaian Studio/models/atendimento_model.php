<?php

require_once("../config/bootstrap.php");

function cadastrarAtendimento($dados)
{
    global $conexao;

    $sql = "
        INSERT INTO atendimentos (
            id_paciente,
            id_profissional,
            numero_atendimento,
            data_atendimento,
            status_atendimento
            
        )
        VALUES (
            :id_paciente,
            :id_profissional,
            :numero_atendimento,
            :data_atendimento,
            :status_atendimento
            
        )
    ";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(":numero_atendimento", $dados['numero_atendimento']);
    $stmt->bindValue(":id_paciente", $dados['id_paciente']);
    $stmt->bindValue(":id_profissional", $dados['id_profissional']);
    $stmt->bindValue(":data_atendimento", $dados['data_atendimento']);
    $stmt->bindValue(":status_atendimento", $dados['status_atendimento']);
    

    $stmt->execute();

    return $conexao->lastInsertId();
}