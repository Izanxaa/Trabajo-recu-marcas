<?php

    // Creacion de mis variables

    $host = '127.0.0.1';
    $port = '3308';
    $user = 'root';
    $password = '';
    $dbname = 'database';

    $connect = mysqli_connect($host, $user, $password, $dbname, $port);

    if (!$connect) {
        die(mysqli_connect_error());
    }

?>