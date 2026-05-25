<?php

session_start();

require '../config/conexao.php';

$email = $_POST['email_usuario'];
$senha = $_POST['senha_usuario'];
echo $email;
echo $senha;

$sql = "
    SELECT *
    FROM usuarios
    WHERE email_usuario = :email

";

$stmt = $conexao->prepare($sql);

$stmt->bindValue(
    ':email',
    $email
);

$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if($usuario){

    if(
        password_verify(
            $senha,
            $usuario['senha_usuario']
        )
    ){

        $_SESSION['id_usuario']
            = $usuario['id_usuario'];

        $_SESSION['nome_usuario']
            = $usuario['nome_usuario'];

        $_SESSION['tipo_usuario']
            = $usuario['tipo_usuario'];

        header('Location: http://192.168.1.19/isamaianstudio/app/home.php');

        exit();

    }

}

/* header('Location: http://192.168.1.19/isamaianstudio/index.php'); */