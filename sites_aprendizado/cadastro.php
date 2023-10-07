<?php
include('conexao.php');

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "INSERT INTO usuario (login, senha) VALUES ('$login','$password');";


$conn->query($sql);





?>