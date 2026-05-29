<!-- Estrutura Inicial para realizar o controle de dados
 que vem da página  app/atendimentos.php-->

 <!-- Iniciando as Instancias  -->

<?php 
    require_once("../config/bootstrap.php");
    require_once("../models/atendimento_model.php");

    require_once("../models/anamnese_model.php");
    require_once("../models/procedimento_model.php");


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        /* processo de tratamento de erro para o banco. */
        $valor_procedimento = $_POST['valor_procedimento'];

        $valor_procedimento = str_replace('R$', '', $valor_procedimento);
        $valor_procedimento = str_replace('.', '', $valor_procedimento);
        $valor_procedimento = str_replace(',', '.', $valor_procedimento);
        $valor_procedimento = trim($valor_procedimento);

        /* Instanciandos os dados do atendimento */
        $dadosAtendimentos = [
            'id_paciente' => $_POST['id_paciente'],
            'numero_atendimento' => $valor_procedimento,
            'data_atendimento' => $_POST['data_atendimento'],
            'id_profissional' => $_POST['id_profissional'],
            'status_atendimento' => $_POST['status_atendimento'],
        ];

        /* Instanciandos os dados da Anamnese */
        $dadosAnamnese = [
            'data_anamnese' => $_POST['data_anamnese'],
            'queixa_principal' => $_POST['queixa_principal'],
            'possui_doenca' => $_POST['possui_doenca'],
            'tratamento_medico' => $_POST['tratamento_medico'],
            'alergias' => $_POST['alergias'],
            'uso_medicamentos' => $_POST['uso_medicamentos'],
            'problemas_pele' => $_POST['problemas_pele'],
            'procedimento_estetico' => $_POST['procedimento_estetico'],
            'observacoes_adicionais' => $_POST['observacoes_adicionais'],
        ];

        /* Instanciandos os dados do Procedimento */

        $dadosProcedimentos = [
            'nome_procedimento' => $_POST['nome_procedimento'],
            'valor_procedimento' => $_POST['valor_procedimento'],
            'status_procedimento' => $_POST['status_procedimento'],
            'data_procedimento' => $_POST['data_procedimento'],
            'descricao_procedimento' => $_POST['descricao_procedimento'],
            'observacoes_procedimento' => $_POST['observacoes_procedimento'],
            
        ];

        /* Cadastando o atendimento do paciente */

 try {

        $conexao->beginTransaction();

        $idAtendimento = cadastrarAtendimento($dadosAtendimentos);
        $dadosAnamnese['id_profissional'] = $_POST['id_profissional'];

        $dadosAnamnese['id_atendimento'] = $idAtendimento;
        $dadosProcedimentos['id_atendimento'] = $idAtendimento;

        cadastrarAnamnese($dadosAnamnese);
        cadastrarProcedimento($dadosProcedimentos);

        $conexao->commit();

        header('Location: ../app/home.php?sucesso=atendimento');
        exit;

    } catch (Exception $erro) {

        $conexao->rollBack();

        die('Erro ao cadastrar atendimento: ' . $erro->getMessage());

    }

}

header('Location: ../app/atendimentos.php');
exit;

        

  

?>