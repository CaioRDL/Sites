<?php

require_once("../config/bootstrap.php");
require_once("../config/verificar_login.php");

$sql = "
    SELECT
        p.id_paciente,
        p.nome_completo,
        p.cpf,
        p.telefone,
        p.data_cadastro,
        COUNT(a.id_atendimento) AS total_atendimentos,
        MAX(a.data_atendimento) AS ultimo_atendimento
    FROM pacientes p
    LEFT JOIN atendimentos a
        ON p.id_paciente = a.id_paciente
    GROUP BY
        p.id_paciente,
        p.nome_completo,
        p.cpf,
        p.telefone,
        p.data_cadastro
    ORDER BY p.nome_completo ASC
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
    
    <title>Pacientes Cadastrados</title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <?php include('../components/sidebar.php'); ?>

    <main class="main">

        <section class="header">

            <div>

                <h2>Pacientes Cadastrados</h2>

                <p>
                    Acompanhe os pacientes, atendimentos e histórico clínico.
                </p>

            </div>

            <div class="header-buttons">

                <button
                    class="btn-black"
                    onclick="window.location.href='home.php'"
                >
                    Voltar
                </button>

                <button
                    class="btn-pink"
                    onclick="window.location.href='pacientes.php'"
                >
                    Novo Paciente
                </button>

            </div>

        </section>

        <section class="table-section">

            <h2>Lista de Pacientes</h2>

            <p>
                Gerencie os pacientes cadastrados no sistema.
            </p>

            <table>

                <thead>

                    <tr>
                        <th style="text-align: center;">Paciente</th>
                        <th style="text-align: center;">Telefone</th>
                        <th style="text-align: center;">Atendimentos</th>
                        <th style="text-align: center;">Último Atendimento</th>
                        <th style="text-align: center;">Ações</th>
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
                                    <?= $paciente['total_atendimentos']; ?>
                                </td>

                                <td>
                                    <?php
                                        if(!empty($paciente['ultimo_atendimento'])){
                                            echo date('d/m/Y', strtotime($paciente['ultimo_atendimento']));
                                        }else{
                                            echo 'Sem atendimento';
                                        }
                                    ?>
                                </td>

                                <td>

                                    <div class="actions">

                                        <button
                                            class="btn-anamnese"
                                            onclick="window.location.href='historico_paciente.php?id_paciente=<?= $paciente['id_paciente']; ?>'"
                                        >
                                            Histórico
                                        </button>

                                        <button
                                            class="btn-pink"
                                            onclick="window.location.href='atendimentos.php?id_paciente=<?= $paciente['id_paciente']; ?>'"
                                        >
                                            Novo Atendimento
                                        </button>

                                        <button
                                            class="btn-edit"
                                            onclick="window.location.href='pacientes.php?id_paciente=<?= $paciente['id_paciente']; ?>'"
                                        >
                                            Editar
                                        </button>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="7">
                                Nenhum paciente cadastrado.
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </section>

    </main>

</body>

</html>