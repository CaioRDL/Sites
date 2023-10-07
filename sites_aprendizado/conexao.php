<?php

$hostname = "192.168.56.101";
$username = "usuario";
$password = "usuario";
$database  = "aprendizado";

$conn = mysqli_connect($hostname, $username, $password,$database);

if(!$conn){
    die(  "Não conectado: " . mysqli_connect_error());
}else {

echo "Conectado com sucesso";

}



?>