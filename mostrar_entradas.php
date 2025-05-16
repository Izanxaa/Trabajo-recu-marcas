<?php

    include 'db/dbconnect.php';

    $sqlconsulta = "select * from entradas_rss order by fecha_publicacion desc";
    $resultado = mysqli_query($connect, $sqlconsulta);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="stylesheet" href="css/styles_entradas.css">
    <script src="js/functions.js" defer></script>
</head>
<body>
    <div class="container">
        <h2>Últimas noticias</h2>
        <p><strong>Tiempo en la página:</strong> <span id="tiempo">0s</span></p>
        <hr>
        
        <?php

            if (mysqli_num_rows($resultado) > 0) {
                while ($row=mysqli_fetch_assoc($resultado)) {
                    $descripcion = trim($row['descripcion']);
                    $palabras = str_word_count($descripcion, 0);

                    if ($palabras < 20) {
                        $tipo = "Articulo breve";
                    } elseif ($palabras < 40) {
                        $tipo = "Articulo mediano";
                    } else {
                        $tipo = "Articulo largo";
                    }

                    echo "<div class='noticia'>";
                    echo "<h3><a href='" . $row['link'] . "' target='_blank'>" . htmlspecialchars($row['titulo']) . "</a></h3>";
                    echo "<p class='db'>Recogido en la base de datos el día: " . date("d M Y H:i", strtotime($row['fecha_recogida'])) . "</p>";
                    echo "<p class='publicacion'><strong>Fecha de publicación: " . date("d/m/Y H:i", strtotime($row['fecha_publicacion'])) . "</strong></p>";
                    echo "<p class='descripcion'>" . htmlspecialchars($row['descripcion']) . "</p>";
                    echo "<p class='palabras'>$palabras</p>";
                    echo "<p class='tipo'>$tipo</p>";
                    echo "<hr>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay noticias</p>";
            }

        ?>
    </div>
</body>
</html>