<?php

if(!isset($_SESSION['id_usuario'])){

    header(
        'Location: ../public/index.php'
    );

    exit();

}