<?php
    // $servername = "aalj10eeabm8f0.cuuomrcedmbe.sa-east-1.rds.amazonaws.com:3306";
    // $username = "controlmaq";
    // $password = "navigu03";
    // $db_name = "ebdb";


    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $db_name = "artesanal";

    $connect = mysqli_connect($servername, $username, $password, $db_name);

    if (mysqli_connect_error()):
        echo "Falha na conexão: ".mysqli_connect_error();
    endif;
