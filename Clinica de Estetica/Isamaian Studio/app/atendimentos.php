<!-- atendimento.php -->

<?php

require_once("../config/bootstrap.php");
require_once("../config/verificar_login.php");

$sql = "
        SELECT
              id_paciente,
              nome_completo,
              data_nascimento
        FROM  pacientes
        ORDER BY nome_completo"

;

$stmt = $conexao->prepare($sql);

$stmt->execute();

$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sql_profissional = "
    SELECT
        id_profissional,
        nome_profissional,
        especialidade,
        status_profissional

    FROM profissionais
    WHERE status_profissional = 'ativo'
    ORDER BY nome_profissional ASC
";

$stmt = $conexao->prepare($sql_profissional);

$stmt->execute();

$sql_profissional_execut = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Atendimento
    </title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body class="dashboard-body">

    <!-- SIDEBAR -->
    <?php include('../components/sidebar.php'); ?>

    <!-- MAIN -->
    <main class="main">

        <!-- HEADER -->
        <section class="header">

            <div>

                <h2>
                    Novo Atendimento
                </h2>

                <p>
                    Atendimento > Cadastro completo do paciente
                </p>

            </div>

            <div class="header-buttons">

                <button class="btn-black" onclick="window.location.href='home.php'">
                    Voltar
                </button>

            </div>

        </section>

        <!-- FORM  Atendimentos -->
        <form action="../controllers/atendimento_controller.php" method="POST">

            <!-- DADOS DO ATENDIMENTO -->

            <section class="accordion-section">

                <div class="accordion-header" onclick="toggleAccordion(event)">

                    <div>

                        <h2>
                            Dados do Atendimento
                        </h2>

                        <p>
                            Informações principais do atendimento.
                        </p>

                    </div>

                    <span class="accordion-icon">
                        ▼
                    </span>

                </div>

                <div class="accordion-content open">

                    <div class="form-grid">

                        <!-- NÚMERO ATENDIMENTO -->
                        <div class="input-group">

                            <label for="numero_atendimento">
                                Número Atendimento
                            </label>

                            <input type="text" id="numero_atendimento" name="numero_atendimento" readonly required>

                        </div>

                        <!-- PACIENTE -->
                        <div class="input-group">

                            <label for="paciente">
                                Paciente
                            </label>

                            <select id="id_paciente" name="id_paciente" required>

                                <option value="">
                                    Selecione um Paciente
                                </option>

                                <?php foreach ($pacientes as $paciente): ?>

                                    <option value="<?= $paciente['id_paciente']; ?>">
                                        <?= $paciente['nome_completo']; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>

                        </div>

                        <!-- DATA -->
                        <div class="input-group">

                            <label for="data_atendimento">
                                Data Atendimento
                            </label>

                            <input type="date" id="data_atendimento" name="data_atendimento" required>

                        </div>

                        <!-- PROFISSIONAL -->
                        <div class="input-group">

                            <label for="profissional">
                                Profissional Responsável
                            </label>

                            <select id="id_profissional" name="id_profissional" required>

                                <option value="">
                                    Selecione um Profissional
                                </option>

                                <?php foreach ($sql_profissional_execut as $profissional): ?>

                                    <option value="<?= $profissional['id_profissional']; ?>">
                                        <?= $profissional['nome_profissional']; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>

                        </div>

                        <!-- STATUS -->
                        <div class="input-group">

                            <label for="status">
                                Status
                            </label>

                            <select id="status_atendimento" name="status_atendimento">

                                <option value="aberto">
                                    Aberto
                                </option>

                                <option value="em_andamento">
                                    Em andamento
                                </option>

                                <option value="finalizado">
                                    Finalizado
                                </option>

                                <option value="cancelado">
                                    Cancelado
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

            </section>

            <!-- ====================================== -->
            <!-- ANAMNESE -->
            <!-- ====================================== -->

            <section class="accordion-section">

                <div class="accordion-header" onclick="toggleAccordion(event)">

                    <div>

                        <h2>
                            Anamnese
                        </h2>

                        <p>
                            Informações clínicas do paciente.
                        </p>

                    </div>

                    <span class="accordion-icon">
                        ▼
                    </span>

                </div>

                <div class="accordion-content open">

                    <div class="form-grid">

                        <!-- DATA ANAMNESE -->
                        <div class="input-group">

                            <label for="data_anamnese">
                                Data da Anamnese
                            </label>

                            <input type="date" id="data_anamnese" name="data_anamnese">

                        </div>

                        <!-- PROFISSIONAL -->
                        <div class="input-group">

                            

                        </div>

                        <!-- QUEIXA PRINCIPAL -->
                        <div class="input-group full-width">

                            <label for="queixa_principal">
                                Queixa Principal
                            </label>

                            <textarea id="queixa_principal" name="queixa_principal" rows="5"
                                placeholder="Descreva a queixa principal..."></textarea>

                        </div>

                        <!-- POSSUI DOENÇA -->
                        <div class="input-group">

                            <label for="possui_doenca">
                                Possui Doença
                            </label>

                            <select id="possui_doenca" name="possui_doenca">

                                <option value="">
                                    Selecione
                                </option>

                                <option value="sim">
                                    Sim
                                </option>

                                <option value="nao">
                                    Não
                                </option>

                            </select>

                        </div>

                        <!-- TRATAMENTO MÉDICO -->
                        <div class="input-group">

                            <label for="tratamento_medico">
                                Tratamento Médico
                            </label>

                            <select id="tratamento_medico" name="tratamento_medico">

                                <option value="">
                                    Selecione
                                </option>

                                <option value="sim">
                                    Sim
                                </option>

                                <option value="nao">
                                    Não
                                </option>

                            </select>

                        </div>

                        <!-- ALERGIAS -->
                        <div class="input-group">

                            <label for="alergias">
                                Alergias
                            </label>

                            <select id="alergias" name="alergias">

                                <option value="">
                                    Selecione
                                </option>

                                <option value="sim">
                                    Sim
                                </option>

                                <option value="nao">
                                    Não
                                </option>

                            </select>

                        </div>

                        <!-- USO DE MEDICAMENTOS -->
                        <div class="input-group">

                            <label for="uso_medicamentos">
                                Uso de Medicamentos
                            </label>

                            <select id="uso_medicamentos" name="uso_medicamentos">

                                <option value="">
                                    Selecione
                                </option>

                                <option value="sim">
                                    Sim
                                </option>

                                <option value="nao">
                                    Não
                                </option>

                            </select>

                        </div>

                        <!-- PROBLEMAS DE PELE -->
                        <div class="input-group">

                            <label for="problemas_pele">
                                Problemas de Pele
                            </label>

                            <select id="problemas_pele" name="problemas_pele">

                                <option value="">
                                    Selecione
                                </option>

                                <option value="sim">
                                    Sim
                                </option>

                                <option value="nao">
                                    Não
                                </option>

                            </select>

                        </div>

                        <!-- PROCEDIMENTO ESTÉTICO -->
                        <div class="input-group">

                            <label for="procedimento_estetico">
                                Já realizou procedimento estético?
                            </label>

                            <select id="procedimento_estetico" name="procedimento_estetico">

                                <option value="">
                                    Selecione
                                </option>

                                <option value="sim">
                                    Sim
                                </option>

                                <option value="nao">
                                    Não
                                </option>

                            </select>

                        </div>

                        <!-- OBSERVAÇÕES -->
                        <div class="input-group full-width">

                            <label for="observacoes_adicionais">
                                Observações Adicionais
                            </label>

                            <textarea id="observacoes_adicionais" name="observacoes_adicionais" rows="5"
                                placeholder="Informações complementares..."></textarea>

                        </div>

                    </div>

                </div>

            </section>

            <!-- ====================================== -->
            <!-- PROCEDIMENTOS -->
            <!-- ====================================== -->

            <section class="accordion-section">

                <div class="accordion-header" onclick="toggleAccordion(event)">

                    <div>

                        <h2>
                            Procedimentos
                        </h2>

                        <p>
                            Procedimentos aplicados no paciente.
                        </p>

                    </div>

                    <span class="accordion-icon">
                        ▼
                    </span>

                </div>

                <div class="accordion-content open">

                    <div class="form-grid">

                        <!-- NOME PROCEDIMENTO -->
                        <div class="input-group">

                            <label for="nome_procedimento">
                                Nome do Procedimento
                            </label>

                            <input type="text" id="nome_procedimento" name="nome_procedimento"
                                placeholder="Digite o procedimento">

                        </div>

                        <!-- VALOR -->
                        <div class="input-group">

                            <label for="valor_procedimento">
                                Valor do Procedimento
                            </label>

                            <input type="text" id="valor_procedimento" name="valor_procedimento" placeholder="R$ 0,00">

                        </div>

                        <!-- STATUS -->
                        <div class="input-group">

                            <label for="status_procedimento">
                                Status do Procedimento
                            </label>

                            <select id="status_procedimento" name="status_procedimento">

                                <option value="">
                                    Selecione
                                </option>

                                <option value="pendente">
                                    Pendente
                                </option>

                                <option value="realizado">
                                    Realizado
                                </option>

                                <option value="cancelado">
                                    Cancelado
                                </option>

                            </select>

                        </div>

                        <!-- DATA PROCEDIMENTO -->
                        <div class="input-group">

                            <label for="data_procedimento">
                                Data do Procedimento
                            </label>

                            <input type="datetime-local" id="data_procedimento" name="data_procedimento">

                        </div>

                        <!-- DESCRIÇÃO -->
                        <div class="input-group full-width">

                            <label for="descricao_procedimento">
                                Descrição do Procedimento
                            </label>

                            <textarea id="descricao_procedimento" name="descricao_procedimento" rows="5"
                                placeholder="Descrição do procedimento..."></textarea>

                        </div>

                        <!-- OBSERVAÇÕES -->
                        <div class="input-group full-width">

                            <label for="observacoes_procedimento">
                                Observações do Procedimento
                            </label>

                            <textarea id="observacoes_procedimento" name="observacoes_procedimento" rows="5"
                                placeholder="Observações adicionais..."></textarea>

                        </div>

                    </div>

                </div>

            </section>

            <!-- BOTÕES -->
            <div class="form-buttons">

                <button type="button" class="btn-gray" onclick="window.history.back()">
                    Cancelar
                </button>

                <button type="submit" class="btn-pink">
                    Salvar Atendimento
                </button>

            </div>

        </form>

    </main>

    <!-- SCRIPT -->
    <script>

        function toggleAccordion(event) {

            const header =
                event.currentTarget;

            const content =
                header.nextElementSibling;

            const icon =
                header.querySelector('.accordion-icon');

            content.classList.toggle('open');

            if (content.classList.contains('open')) {

                icon.innerHTML = '▼';

            } else {

                icon.innerHTML = '▶';

            }

        }

    </script>

</body>

</html>