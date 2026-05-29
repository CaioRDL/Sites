<?php

require_once '../config/bootstrap.php';

function cadastrarAnamnese($dados){
    
    global $conexao;
    

    $sql = "

        INSERT INTO anamneses (

            id_atendimento,
            data_anamnese,
            id_profissional,
            queixa_principal,
            possui_doenca,
            tratamento_medico,
            alergias,
            uso_medicamentos,
            problemas_pele,
            procedimento_estetico,
            observacoes_adicionais

        )

        VALUES (

            :id_atendimento,
            :data_anamnese,
            :id_profissional,
            :queixa_principal,
            :possui_doenca,
            :tratamento_medico,
            :alergias,
            :uso_medicamentos,
            :problemas_pele,
            :procedimento_estetico,
            :observacoes_adicionais

        )

    ";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':id_atendimento', $dados['id_atendimento']);
    $stmt->bindValue(':data_anamnese', $dados['data_anamnese']);
    $stmt->bindValue(':id_profissional', $dados['id_profissional']);
    $stmt->bindValue(':queixa_principal', $dados['queixa_principal']);
    $stmt->bindValue(':possui_doenca', $dados['possui_doenca']);
    $stmt->bindValue(':tratamento_medico', $dados['tratamento_medico']);
    $stmt->bindValue(':alergias', $dados['alergias']);
    $stmt->bindValue(':uso_medicamentos', $dados['uso_medicamentos']);
    $stmt->bindValue(':problemas_pele', $dados['problemas_pele']);
    $stmt->bindValue(':procedimento_estetico', $dados['procedimento_estetico']);
    $stmt->bindValue(':observacoes_adicionais', $dados['observacoes_adicionais']);

    return $stmt->execute();

}