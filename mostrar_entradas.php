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
    <link rel="stylesheet" href="/css/styles_entradas.css">
    <script src="/js/functions.js" defer></script>
</head>
<body>
    <div class="container">
        <h2>Últimas noticias</h2>
        <hr>
        <p><strong>Tiempo en página:</strong> <span id="tiempo">0s</span></p>
        
        <?php

            if (mysqli_num_rows($resultado) > 0) {
                while ($row=mysqli_fetch_assoc($resultado)) {
                    echo "<div class='noticia'>";
                    echo "<h3>" . htmlspecialchars($row['titulo']) . "</h3>";
                    echo "<p><strong>Fecha:</strong> " . date("d/m/Y H:i", strtotime($row['fecha_publicacion'])) . "</p>";
                    echo "<p><strong>Enlace:</strong> <a href='" . $row['link'] . "' target='_blank'>Ver noticia</a></p>";
                    echo "<p class='descripcion'>" . htmlspecialchars($row['descripcion']) . "</p>";
                    echo "<p class='palabras'></p>"; // Aquí saldrá el número de palabras
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