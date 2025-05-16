<?php
    // Para conectar con la base de datos
    require_once 'db/dbconnect.php';

    // Cargar el rss
    $rss = simplexml_load_file('https://feeds.elpais.com/mrss-s/pages/ep/site/elpais.com/section/ciencia/portada');

    foreach ($rss->channel->item as $item) {
        $title = $item->title;
        $link = $item->link;
        $date = date('Y-m-d H:i', strtotime($item->pubDate));
        $description = $item->description;
        $guid = $item->guid;
        
        // Comprueba si existe la noticia en mi base de datos
        $checknew = mysqli_query($connect, "select * from entradas_rss where guid = '$guid'");

        // Si no hay nada, entonces hace una inserción y muestra un mensaje si se ha insertado o no y si existe ya, un mensaje de que ya existe
        if (mysqli_num_rows($checknew) == 0) {
            $insert = "INSERT INTO entradas_rss (titulo, link, fecha_publicacion, descripcion, guid, fecha_recogida) values ('$title', '$link', '$date', '$description', '$guid', now())";

            if (mysqli_query($connect, $insert)) {
                echo "Inserted: $title<br>";
            } else {
                echo "Error inserting: " . mysqli_error($connect) . "<br>";
            }
        } else {
            echo "Already exists: $title<br>";
        }
    }
?>