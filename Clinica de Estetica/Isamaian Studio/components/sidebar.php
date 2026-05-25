<?php 
    $paginaAtual = basename($_SERVER["PHP_SELF"]);

?>
<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
<aside class="sidebar">
    <div>
        <div class="logo">
            <h1>Isamaian Studio</h1>
            <p>Estética de Sobrancelhas</p>
        </div>
        <div class="menu">

            <button 
                class="<?= ($paginaAtual == 'home.php') ? 'active' : '' ?>"

                onclick="window.location.href='home.php'">
                Dashboard
            </button>
                
            <button 
                class="<?= ($paginaAtual == "pacientes.php") ? 'active' : '' ?>"
                onclick="window.location.href='pacientes.php'">
                Pacientes
            </button>

            <button 
                class="<?= ($paginaAtual == 'anamnese.php') ? 'active' : '' ?>"
                onclick="window.location.href='anamnese.php'">
                Anamnese
            </button>

            <button 
                class="<?= ($paginaAtual == 'procedimentos.php') ? 'active' : '' ?>"
                onclick="window.location.href='procedimentos.php'">
                Procedimentos
            </button>

            <button 
                class="<?= ($paginaAtual == 'funcionarios.php') ? 'active' : '' ?>"
                onclick="window.location.href='#'">
                Funcionarios
            </button>
            
            
            <button 
                class="<?= ($paginaAtual == 'configuracoes.php') ? 'active' : '' ?>"
                onclick="window.location.href='#'">
                Configurações
            </button>
        </div>
    </div>
    <button class="logout" onclick="window.location.href='../auth/logout.php'">
        Sair
    </button>
</aside>