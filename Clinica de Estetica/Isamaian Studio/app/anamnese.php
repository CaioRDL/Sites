<?php

require_once("../config/bootstrap.php");
require_once("../config/verificar_login.php");

/* =========================
   BUSCANDO PACIENTES
========================= */

$sql = "

    SELECT
        id_paciente,
        nome_completo
    FROM pacientes
    ORDER BY nome_completo ASC

";

$stmt = $conexao->prepare($sql);

$stmt->execute();

$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ficha de Anamnese</title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <!-- SIDEBAR -->

    <?php include('../components/sidebar.php'); ?>

    <!-- MAIN -->

    <main class="main">

        <!-- HEADER -->

        <section class="header">

            <div>

                <h2>
                    Ficha de Anamnese
                </h2>

                <p>
                    Anamnese > Nova Anamnese
                </p>

            </div>

            <div class="header-buttons">

                <button class="btn-black" onclick="window.location.href='home.php'">
                    Voltar
                </button>

            </div>

        </section>

        <!-- FORMULÁRIO -->

        <section class="form-section">

            <h2>
                Dados do paciente
            </h2>

            <form action="../controllers/anamnese_controller.php" method="POST">

                <!-- PACIENTE -->

                <div class="input-group margin-top">

                    <label>
                        Paciente
                    </label>

                    <select name="id_paciente" name="id_paciente" required>

                        <option value="">
                            Selecione um paciente
                        </option>

                        <?php foreach ($pacientes as $paciente): ?>

                            <option value="<?= $paciente['id_paciente']; ?>">

                                <?= $paciente['nome_completo']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <!-- DIVISOR -->

                <div class="section-divider"></div>

                <!-- INFORMAÇÕES GERAIS -->

                <h2 class="section-title">
                    1. Informações Gerais
                </h2>

                <div class="form-grid">

                    <!-- DATA -->

                    <div class="input-group">

                        <label>
                            data_anamnese
                        </label>

                        <input type="date" name="data_anamnese" required>

                    </div>

                    <!-- PROFISSIONAL -->

                    <div class="input-group">

                        <label>
                            profissional_responsavel
                        </label>

                        <select name="profissional_responsavel" required>

                            <option value="">
                                Selecione
                            </option>

                            <option value="Ana Paula">
                                Ana Paula
                            </option>

                            <option value="Juliana">
                                Juliana
                            </option>

                        </select>

                    </div>

                    <!-- QUEIXA -->

                    <div class="input-group full-width">

                        <label>
                            queixa_principal
                        </label>

                        <textarea name="queixa_principal" rows="5"
                            placeholder="Descreva a queixa principal do paciente..."></textarea>

                    </div>

                </div>

                <!-- DIVISOR -->

                <div class="section-divider"></div>

                <!-- HISTÓRICO -->

                <h2 class="section-title">
                    2. Histórico de Saúde
                </h2>

                <div class="form-grid">

                    <!-- DOENÇA -->

                    <div class="input-group">

                        <label>
                            possui_doenca
                        </label>

                        <select name="possui_doenca">

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

                    <!-- TRATAMENTO -->

                    <div class="input-group">

                        <label>
                            tratamento_medico
                        </label>

                        <select name="tratamento_medico">

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

                        <label>
                            alergias
                        </label>

                        <select name="alergias">

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

                    <!-- MEDICAMENTOS -->

                    <div class="input-group">

                        <label>
                            uso_medicamentos
                        </label>

                        <select name="uso_medicamentos">

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

                    <!-- PELE -->

                    <div class="input-group">

                        <label>
                            problemas_pele
                        </label>

                        <select name="problemas_pele">

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

                    <!-- PROCEDIMENTO -->

                    <div class="input-group">

                        <label>
                            procedimento_estetico
                        </label>

                        <select name="procedimento_estetico">

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

                        <label>
                            observacoes_adicionais
                        </label>

                        <textarea name="observacoes_adicionais" rows="6"
                            placeholder="Informações complementares..."></textarea>

                    </div>

                </div>

                <!-- BOTÕES -->

                <div class="form-buttons">

                    <button type="button" class="btn-gray">
                        Cancelar
                    </button>

                    <button type="submit" class="btn-pink">
                        Salvar Anamnese
                    </button>

                </div>

            </form>

        </section>

    </main>

</body>

</html>