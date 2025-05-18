<?php

    require_once 'db/dbconnect.php';

    if (isset($_POST['guid'])) {
        $texto = $_POST['guid'];

        $sqldelete = "delete from entradas_rss where guid like '%$texto%'";
        $resultado = mysqli_query($connect, $sqldelete);

        if ($resultado) {
            echo "Han sido eliminadas las noticias que contenian: '$texto'";
        } else {
            echo "Error al intentar borrar las noticias";
        }
    } elseif (isset($_POST['delete_all'])) {
        $sqldelete = "delete from entradas_rss";
        $resultado = mysqli_query($connect, $sqldelete);

        if ($resultado) {
            echo "Se han eliminado todas las noticias correctamente";
        } else {
            echo "Ha ocurrido un error y no se han podido borrar todas las noticias";
        }
    }
?>


