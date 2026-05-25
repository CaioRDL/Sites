<?php 
    require('verificar_login.php');

    if($_SESSION['tipo_usuario'] != 'admin'){
        die('Acesso negado.');
        
    }


?>