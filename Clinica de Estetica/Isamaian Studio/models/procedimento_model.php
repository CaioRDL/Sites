<?php 
    require_once("../config/bootstrap.php");

    function cadastrarProcedimento($dados){
        global $conexao;

        $sql = "
            INSERT INTO procedimentos (
                id_atendimento,
                nome_procedimento,
                valor_procedimento,
                status_procedimento,
                data_procedimento,
                descricao_procedimento,
                observacoes_procedimento
            )

            VALUES (
                :id_atendimento,
                :nome_procedimento,
                :valor_procedimento,
                :status_procedimento,
                :data_procedimento,
                :descricao_procedimento,
                :observacoes_procedimento
            )

        ";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(":id_atendimento",$dados['id_atendimento']);
        $stmt->bindValue(":nome_procedimento",$dados['nome_procedimento']);
        $stmt->bindValue(":valor_procedimento",$dados['valor_procedimento']);
        $stmt->bindValue(":status_procedimento",$dados['status_procedimento']);
        $stmt->bindValue(":data_procedimento",$dados['data_procedimento']);
        $stmt->bindValue(":descricao_procedimento",$dados['descricao_procedimento']);
        $stmt->bindValue(":observacoes_procedimento",$dados['observacoes_procedimento']);

        $stmt->execute();

        return $conexao->lastInsertId();


    };

?>