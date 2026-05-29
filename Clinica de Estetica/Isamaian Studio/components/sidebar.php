<?php

$paginaAtual = basename($_SERVER["PHP_SELF"]);

?>

<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<aside class="sidebar" id="sidebar">

    <!-- BOTÃO RECOLHER MENU -->

    <div class="sidebar-header">

        <div class="logo">
            <h1 class="menu-text">Isamaian Studio</h1>
            <p class="menu-text">Estética de Sobrancelhas</p>
        </div>

        <button id="toggleSidebar" class="toggle-sidebar" type="button" title="Recolher menu">
            ☰
        </button>

    </div>

    <div class="menu">

        <button onclick="window.location.href='../app/home.php'">
            <span class="menu-text">
                Dashboard
            </span>
        </button>

        <button onclick="window.location.href='../app/pacientes.php'">
            <span class="menu-text">
                Pacientes
            </span>
        </button>

        <button onclick="window.location.href='../app/atendimentos.php'">
            <span class="menu-text">
                Atendimentos
            </span>
        </button>

        <!--             <button onclick="window.location.href='../app/anamnese.php'">
                <span class="menu-text">
                    Anamnese
                </span>
            </button> -->

        <!--             <button onclick="window.location.href='../app/procedimentos.php'">
                <span class="menu-text">
                    Procedimentos
                </span>
            </button> -->

        <button onclick="window.location.href='../app/profissionais.php'">
            <span class="menu-text">
                Funcionários
            </span>
        </button>

        <button onclick="window.location.href='../app/lista_pacientes.php'">
            <span class="menu-text">
                Lista de Pacientes
            </span>
        </button>

    </div>

    </div>

    <button class="logout" onclick="window.location.href='../auth/logout.php'" title="Sair">

        <span class="logout-icon">⎋</span>

        </span>

        <span class="menu-text">
            Sair
        </span>

    </button>

</aside>

<script>
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggleSidebar');

    if (localStorage.getItem('sidebar') === 'collapsed') {
        sidebar.classList.add('collapsed');
        document.body.classList.add('sidebar-collapsed');
    }

    toggleSidebar.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
        document.body.classList.toggle('sidebar-collapsed');

        localStorage.setItem(
            'sidebar',
            sidebar.classList.contains('collapsed') ? 'collapsed' : 'open'
        );
    });
</script>