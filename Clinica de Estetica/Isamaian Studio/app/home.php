<?php

    require_once("../config/bootstrap.php");
    require_once '../config/verificar_login.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <?php 

    include '../components/sidebar.php';

    ?>
    
    <main class="main">
        <section class="header">
            <div>
                <h2>Dashbo</h2>
                <p>Sistema de gerenciamento da clínica.</p>
            </div>
            <div class="header-buttons">
                <button class="btn-black" onclick="window.location.href='pacientes.php'">
                    Novo Paciente
                </button>
                <button class="btn-pink" onclick="window.location.href='anamnese.php'">
                    Nova Anamnese
                </button>
            </div>
        </section>
        <section class="cards">

            <div class="card">
                <p>Pacientes</p>
                <h3>128</h3>
            </div>
            <div class="card">
                <p>Funcionários</p>
                <h3>6</h3>
            </div>
            <div class="card">
                <p>Anamneses</p>
                <h3>103</h3>
            </div>
        </section>
        <section class="table-section">
            <h2>Pacientes</h2>
            <p>Gerencie os pacientes cadastrados.</p>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Procedimento</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Maria Oliveira</td>
                        <td>(41) 99999-9999</td>
                        <td>Design de sobrancelha</td>
                        <td>18/05/2026</td>
                        <td>
                            <div class="actions">
                                <button class="btn-edit">
                                    Editar
                                </button>
                                <button class="btn-delete">

                                    Excluir
                                </button>
                                <button class="btn-anamnese">
                                    Ver Anamnese
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <script src="js/script.js"></script>
</body>

</html>