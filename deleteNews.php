<?php

    require_once 'db/dbconnect.php';

    if (isset($_POST['eliminar_todo'])) {
       
        $sqldelete = "delete from entradas_rss where guid like"

    } elseif (isset($_POST['guid'])) {
        $texto = $_POST['guid'];

        $sqldelete = "delete from entradas_rss where guid like '%$texto%'";
        $resultado = mysqli_query($connect, $sqldelete);

        if ($resultado) {
            echo "Han sido eliminadas las noticias que contenian: '$texto'";
        } else {
            echo "Error al intentar borrar las noticias";
        }
    }
?>


