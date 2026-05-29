<?php

require_once("../config/bootstrap.php");
require_once("../config/verificar_login.php");
require_once("../models/profissional_model.php");

$profissionais = listarProfissionais();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profissionais</title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <?php include('../components/sidebar.php'); ?>

    <main class="main">

        <section class="header">

            <div>
                <h2>Profissionais</h2>
                <p>Cadastro e gerenciamento dos profissionais da clínica.</p>
            </div>

            <div class="header-buttons">
                <button class="btn-black" onclick="window.location.href='home.php'">
                    Voltar
                </button>
            </div>

        </section>

        <?php if(isset($_GET['sucesso'])): ?>

            <script>
                alert('Profissional cadastrado com sucesso!');
            </script>

        <?php endif; ?>

        <section class="form-section">

            <h2>Novo Profissional</h2>

            <p>Preencha os dados do profissional responsável pelos atendimentos.</p>

            <form action="../controllers/profissional_controller.php" method="POST">

                <div class="form-grid">

                    <div class="input-group">

                        <label>nome_profissional</label>

                        <input
                            type="text"
                            name="nome_profissional"
                            placeholder="Digite o nome do profissional"
                            required
                        >

                    </div>

                    <div class="input-group">

                        <label>telefone_profissional</label>

                        <input
                            type="text"
                            name="telefone_profissional"
                            placeholder="Digite o telefone"
                        >

                    </div>

                    <div class="input-group">

                        <label>email_profissional</label>

                        <input
                            type="email"
                            name="email_profissional"
                            placeholder="Digite o e-mail"
                        >

                    </div>

                    <div class="input-group">

                        <label>especialidade</label>

                        <input
                            type="text"
                            name="especialidade"
                            placeholder="Ex: Designer de sobrancelhas"
                        >

                    </div>

                    <div class="input-group">

                        <label>status_profissional</label>

                        <select name="status_profissional">

                            <option value="ativo">
                                Ativo
                            </option>

                            <option value="inativo">
                                Inativo
                            </option>

                        </select>

                    </div>

                </div>

                <div class="form-buttons">

                    <button type="button" class="btn-gray" onclick="window.history.back()">
                        Cancelar
                    </button>

                    <button type="submit" class="btn-pink">
                        Salvar Profissional
                    </button>

                </div>

            </form>

        </section>

        <section class="table-section">

            <h2>Profissionais cadastrados</h2>

            <p>Lista de profissionais disponíveis para atendimento.</p>

            <table>

                <thead>

                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Especialidade</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    <?php if(count($profissionais) > 0): ?>

                        <?php foreach($profissionais as $profissional): ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars($profissional['nome_profissional']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($profissional['telefone_profissional']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($profissional['email_profissional']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($profissional['especialidade']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($profissional['status_profissional']); ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="5">
                                Nenhum profissional cadastrado.
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </section>

    </main>

</body>

</html>