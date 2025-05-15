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
    </div>
</body>
</html>