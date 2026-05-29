<?php

require_once("../config/bootstrap.php");
require_once("../config/verificar_login.php");

/* $profissionais = listarProfissionais(); */

/* BUSCAR PACIENTES */

$sql = "

    SELECT 
        id_paciente,
        nome_completo,
        telefone,
        data_cadastro
    FROM pacientes
    ORDER BY id_paciente DESC

";

$stmt = $conexao->prepare($sql);

$stmt->execute();

$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
/* Buscar Profissional */
$sql_profissional = " 
    SELECT
        nome_profissional,
        especialidade,
        status_profissional
    FROM
        profissionais;
";
$stmt = $conexao->prepare($sql_profissional);

$stmt->execute();

$profissionais = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
        Dashboard
    </title>

    <link
        rel="stylesheet"
        href="../css/style.css"
    >

</head>

<body>

    <?php include '../components/sidebar.php'; ?>

    <main class="main">

        <!-- HEADER -->

        <section class="header">

            <div>

                <h2>
                    Dashboard
                </h2>

                <p>
                    Sistema de gerenciamento da clínica.
                </p>

            </div>

            <div class="header-buttons">

                <button
                    class="btn-black"
                    onclick="window.location.href='pacientes.php'"
                >
                    Novo Paciente
                </button>

                <button
                    class="btn-pink"
                    onclick="window.location.href='../app/atendimentos.php'"
                >
                    Novo Atendimento
                </button>

            </div>

        </section>

        <!-- CARDS -->

        <section class="cards">

            <!-- PACIENTES -->

            <div class="card">

                <p>
                    Pacientes
                </p>

                <h3>
                    <?= count($pacientes); ?>
                </h3>

            </div>

            <!-- FUNCIONÁRIOS -->

            <div class="card">
                

                <p>
                    Funcionários
                </p>

                <h3>
                    <?= count($profissionais); ?>
                </h3>

            </div>

            <!-- ANAMNESES -->

            <div class="card">

                <p>
                    Anamneses
                </p>

                <h3>
                    103
                </h3>

            </div>

        </section>

        <!-- TABELA -->

        <section class="table-section">

            <h2>
                Pacientes
            </h2>

            <p>
                Gerencie os pacientes cadastrados.
            </p>

            <table>

                <thead>

                    <tr>

                        <th>
                            Nome
                        </th>

                        <th>
                            Telefone
                        </th>

                        <th>
                            Data Cadastro
                        </th>

                        <th>
                            Ações
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php if(count($pacientes) > 0): ?>

                        <?php foreach($pacientes as $paciente): ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars($paciente['nome_completo']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($paciente['telefone']); ?>
                                </td>

                                <td>

                                    <?= date(
                                        'd/m/Y',
                                        strtotime($paciente['data_cadastro'])
                                    ); ?>

                                </td>

                                <td>

                                    <div class="actions">

                                        <!-- EDITAR -->

                                        <button
                                            class="btn-edit"
                                        >
                                            Editar
                                        </button>

                                        <!-- EXCLUIR -->

                                        <button
                                            class="btn-delete"
                                        >
                                            Excluir
                                        </button>

                                        <!-- ANAMNESE -->

                                        <button
                                            class="btn-anamnese"
                                            onclick="window.location.href='anamnese.php?id=<?= $paciente['id_paciente']; ?>'"
                                        >
                                            Ver Anamnese
                                        </button>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="4">

                                Nenhum paciente cadastrado.

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </section>

    </main>

    <script src="../js/script.js"></script>

</body>

</html>