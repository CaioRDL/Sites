<?php 
    session_start();
    require_once '../config/conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login | Isamaian Studio</title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body class="login-body">

    <!-- CONTAINER -->

    <div class="login-container">

        <!-- LADO ESQUERDO -->

        <div class="login-left">

            <div class="login-brand">

                <h1>
                    Isamaian Studio
                </h1>

                <p>
                    Sistema de Gestão Clínica Estética
                </p>

            </div>

            <div class="login-text">

                <h2>
                    Bem-vindo de volta
                </h2>

                <p>
                    Gerencie pacientes, anamneses,
                    atendimentos e procedimentos
                    em um único sistema.
                </p>

            </div>

        </div>

        <!-- LADO DIREITO -->

        <div class="login-right">

            <div class="login-card">

                <h2>
                    Entrar
                </h2>

                <p>
                    Faça login para acessar o sistema.
                </p>

                <form action="../auth/validar_login.php" method="POST">

                    <!-- EMAIL -->

                    <div class="input-group">

                        <label>
                            email_usuario
                        </label>

                        <input
                            type="email"
                            name="email_usuario"
                            placeholder="Digite seu e-mail"
                            required
                        >

                    </div>

                    <!-- SENHA -->

                    <div class="input-group">

                        <label>
                            senha_usuario
                        </label>

                        <input
                            type="password"
                            name="senha_usuario"
                            placeholder="Digite sua senha"
                            required
                        >

                    </div>

                    <!-- CHECKBOX -->

                    <div class="remember-area">

                        <label class="remember-label">

                            <input
                                type="checkbox"
                                name="lembrar_login"
                            >

                            Lembrar login

                        </label>

                        <a href="#">
                            Esqueci minha senha
                        </a>

                    </div>

                    <!-- BOTÃO -->

                    <button
                        type="submit"
                        class="btn-login"
                    >
                        Entrar no sistema
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>