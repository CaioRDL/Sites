<?php

require_once("../config/bootstrap.php");
require_once("../config/verificar_login.php");

$id_paciente = $_GET['id_paciente'] ?? null;

if (!$id_paciente) {

    header("Location: lista_pacientes.php");
    exit;

}

/* ==========================
   PACIENTE
========================== */

$sqlPaciente = "

    SELECT *
    FROM pacientes
    WHERE id_paciente = :id_paciente

";

$stmt = $conexao->prepare($sqlPaciente);
$stmt->bindValue(':id_paciente', $id_paciente);
$stmt->execute();

$paciente = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$paciente) {

    die('Paciente não encontrado.');

}

/* ==========================
   ATENDIMENTOS
========================== */

$sqlAtendimentos = "

    SELECT

        a.id_atendimento,
        a.numero_atendimento,
        a.data_atendimento,
        a.status_atendimento,
        a.observacoes_atendimento,

        p.nome_profissional

    FROM atendimentos a

    LEFT JOIN profissionais p
        ON a.id_profissional = p.id_profissional

    WHERE a.id_paciente = :id_paciente

    ORDER BY a.data_atendimento DESC

";

$stmt = $conexao->prepare($sqlAtendimentos);
$stmt->bindValue(':id_paciente', $id_paciente);
$stmt->execute();

$atendimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Histórico do Paciente
    </title>

    <link
        rel="stylesheet"
        href="../css/style.css"
    >

</head>

<body>

<?php include('../components/sidebar.php'); ?>

<main class="main">

    <!-- CABEÇALHO -->

    <section class="header">

        <div>

            <h2>
                Histórico do Paciente
            </h2>

            <p>
                <?= htmlspecialchars($paciente['nome_completo']); ?>
            </p>

        </div>

        <div class="header-buttons">

            <button
                class="btn-black"
                onclick="window.location.href='lista_pacientes.php'"
            >
                Voltar
            </button>

            <button
                class="btn-pink"
                onclick="window.location.href='atendimentos.php?id_paciente=<?= $paciente['id_paciente']; ?>'"
            >
                Novo Atendimento
            </button>

        </div>

    </section>

    <!-- DADOS DO PACIENTE -->

    <section class="cards">

        <div class="card">

            <p>Telefone</p>

            <h3>
                <?= htmlspecialchars($paciente['telefone']); ?>
            </h3>

        </div>

        <div class="card">

            <p>CPF</p>

            <h3>
                <?= htmlspecialchars($paciente['cpf']); ?>
            </h3>

        </div>

        <div class="card">

            <p>Atendimentos</p>

            <h3>
                <?= count($atendimentos); ?>
            </h3>

        </div>

    </section>

    <!-- HISTÓRICO -->

    <section class="table-section">

        <h2>
            Histórico Clínico
        </h2>

        <p>
            Todos os atendimentos realizados.
        </p>

        <?php if(count($atendimentos) > 0): ?>

            <?php foreach($atendimentos as $atendimento): ?>

                <?php

                /* ==========================
                   ANAMNESE
                ========================== */

                $sqlAnamnese = "

                    SELECT *
                    FROM anamneses
                    WHERE id_atendimento = :id_atendimento

                ";

                $stmtAnamnese = $conexao->prepare($sqlAnamnese);
                $stmtAnamnese->bindValue(
                    ':id_atendimento',
                    $atendimento['id_atendimento']
                );
                $stmtAnamnese->execute();

                $anamnese = $stmtAnamnese->fetch(PDO::FETCH_ASSOC);

                /* ==========================
                   PROCEDIMENTOS
                ========================== */

                $sqlProcedimentos = "

                    SELECT *
                    FROM procedimentos
                    WHERE id_atendimento = :id_atendimento

                ";

                $stmtProcedimentos =
                    $conexao->prepare($sqlProcedimentos);

                $stmtProcedimentos->bindValue(
                    ':id_atendimento',
                    $atendimento['id_atendimento']
                );

                $stmtProcedimentos->execute();

                $procedimentos =
                    $stmtProcedimentos->fetchAll(PDO::FETCH_ASSOC);

                ?>

                <div
                    class="form-section"
                    style="margin-bottom:30px;"
                >

                    <h2>

                        Atendimento
                        #<?= $atendimento['numero_atendimento']; ?>

                    </h2>

                    <div class="section-divider"></div>

                    <p>

                        <strong>Data:</strong>

                        <?= date(
                            'd/m/Y',
                            strtotime(
                                $atendimento['data_atendimento']
                            )
                        ); ?>

                    </p>

                    <p>

                        <strong>Status:</strong>

                        <?= htmlspecialchars(
                            $atendimento['status_atendimento']
                        ); ?>

                    </p>

                    <p>

                        <strong>Profissional:</strong>

                        <?= htmlspecialchars(
                            $atendimento['nome_profissional']
                        ); ?>

                    </p>

                    <p>

                        <strong>Observações:</strong>

                        <?= htmlspecialchars(
                            $atendimento['observacoes_atendimento']
                        ); ?>

                    </p>

                    <!-- ANAMNESE -->

                    <?php if($anamnese): ?>

                        <div class="section-divider"></div>

                        <h3>
                            Anamnese
                        </h3>

                        <p>

                            <strong>Queixa:</strong>

                            <?= htmlspecialchars(
                                $anamnese['queixa_principal']
                            ); ?>

                        </p>

                        <p>

                            <strong>Doença:</strong>

                            <?= htmlspecialchars(
                                $anamnese['possui_doenca']
                            ); ?>

                        </p>

                        <p>

                            <strong>Alergias:</strong>

                            <?= htmlspecialchars(
                                $anamnese['alergias']
                            ); ?>

                        </p>

                        <p>

                            <strong>Medicamentos:</strong>

                            <?= htmlspecialchars(
                                $anamnese['uso_medicamentos']
                            ); ?>

                        </p>

                        <p>

                            <strong>Observações:</strong>

                            <?= htmlspecialchars(
                                $anamnese['observacoes_adicionais']
                            ); ?>

                        </p>

                    <?php endif; ?>

                    <!-- PROCEDIMENTOS -->

                    <?php if(count($procedimentos) > 0): ?>

                        <div class="section-divider"></div>

                        <h3>
                            Procedimentos
                        </h3>

                        <?php foreach($procedimentos as $procedimento): ?>

                            <div
                                style="
                                    border:1px solid #eee;
                                    padding:15px;
                                    border-radius:12px;
                                    margin-bottom:15px;
                                "
                            >

                                <p>

                                    <strong>Procedimento:</strong>

                                    <?= htmlspecialchars(
                                        $procedimento['nome_procedimento']
                                    ); ?>

                                </p>

                                <p>

                                    <strong>Valor:</strong>

                                    R$
                                    <?= number_format(
                                        $procedimento['valor_procedimento'],
                                        2,
                                        ',',
                                        '.'
                                    ); ?>

                                </p>

                                <p>

                                    <strong>Status:</strong>

                                    <?= htmlspecialchars(
                                        $procedimento['status_procedimento']
                                    ); ?>

                                </p>

                                <p>

                                    <strong>Descrição:</strong>

                                    <?= htmlspecialchars(
                                        $procedimento['descricao_procedimento']
                                    ); ?>

                                </p>

                            </div>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="form-section">

                <h2>
                    Nenhum atendimento encontrado
                </h2>

            </div>

        <?php endif; ?>

    </section>

</main>

</body>
</html>