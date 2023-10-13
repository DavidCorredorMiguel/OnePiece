<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Peliculas De OP</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
</head>

<body>
    <form action='OP38.php' method='post' style="margin-left: 10px; text-align: center;">
        <br><input type="text" name="nombre" placeholder="Pelicula">
        Duracion-><input type="number" name="min" min=30 max="300">
        Nº Sombreros De Paja-><input type="number" name="sp" min=4 max=10>
        <br><br><input type="submit" name="buscarpeli" value="Buscar Peli">
    </form> <?php try { if (isset($_POST["buscarpeli"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM peliculas WHERE nombre=? OR min=? OR sp=?");
        $res->bindParam(1, $_POST["nombre"]); $res->bindParam(2, $_POST["min"]); $res->bindParam(3, $_POST["sp"]); $res->execute();
        echo "<table><tr><th>Pelicula</th><th>Director/a y Guionista</th><th>Isla/s</th><th>Personajes De La Peli</th></tr>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $c["nombre"] . "<br><br><img src='imgvoljuegospeli/Peli " . $c["nombre"] .
                ".png' width='400px' height='400px'></td><td bgcolor='lightgreen'>Director/a: " . $c["director/a"] .
                "<br><br>Guionista: " . $c["escritor/a"] . "<br><br>Duracion: " . $c["min"] . " minutos<br><br>Estreno: " .
                $c["fechaorig"];
            if($c["fecha"] != "No") { echo "<br><br>Estreno (En España): " . $c["fecha"]; } echo "</td><td bgcolor='lightgreen'>";
            if($c["isla1"] != "No") {
                echo $c["isla1"] . "<br><br><img src='imglugares/" . $c["isla1"] . ".png' width='400px' height='400px'>";
                if($c["nombre"] == "Z") {
                    echo "<br>" . $c["isla2"] . "<br><br><img src='imglugares/" . $c["isla2"] .
                        ".png' width='400px' height='400px'><br>" . $c["isla3"] . "<br><br><img src='imglugares/" . $c["isla3"] .
                        ".png' width='400px' height='400px'>";
                }
            } else { echo "<img src='imglugares/Logo One Piece.png' width='400px' height='400px'>"; }
            echo "</td><td bgcolor='lightgreen'><div id='cc' class='carousel slide'
                data-ride='carousel'><div class='carousel-inner'><div class='carousel-item active'>" . $c["personajes"] .
                "<br><br><img src='imgpersonajes/" . $c["personajes"] . ".png' width='400px' height='400px'></div>";
            if ($c["sp"] >= "4") {
                echo "<div class='carousel-item'>Monkey D. Luffy<br><br>
                <Img src='imgpersonajes/Monkey D. Luffy.png' width='400px' height='400px'></div>
                <div class='carousel-item'>Roronoa Zoro<br><br>
                <Img src='imgpersonajes/Roronoa Zoro.png' width='400px' height='400px'></div>
                <div class='carousel-item'>Nami<br><br>
                <Img src='imgpersonajes/Nami.png' width='400px' height='400px'></div>
                <div class='carousel-item'>Usopp<br><br>
                <Img src='imgpersonajes/Usopp.png' width='400px' height='400px'></div>";
                if ($c["sp"] >= 5) {
                    echo "<div class='carousel-item'>Sanji<br><br>
                    <Img src='imgpersonajes/Sanji.png' width='400px' height='400px'></div>";
                    if ($c["sp"] >= 6) {
                        echo "<div class='carousel-item'>Tony Tony Chopper<br><br>
                        <Img src='imgpersonajes/Tony Tony Chopper.png' width='400px' height='400px'></div>";
                        if ($c["sp"] >= 7) {
                            echo "<div class='carousel-item'>Nico Robin<br><br>
                            <Img src='imgpersonajes/Nico Robin.png' width='400px' height='400px'></div>";
                            if ($c["sp"] >= 8) {
                                echo "<div class='carousel-item'>Franky<br><br>
                                <Img src='imgpersonajes/Franky.png' width='400px' height='400px'></div>";
                                if ($c["sp"] >= 9) {
                                    echo "<div class='carousel-item'>Brook<br><br>
                                    <Img src='imgpersonajes/Brook.png' width='400px' height='400px'></div>";
                                    if ($c["sp"] >= 10) {
                                        echo "<div class='carousel-item'>Jinbe<br><br>
                                        <Img src='imgpersonajes/Jinbe.png' width='400px' height='400px'></div>";
                                    }
                                }
                            }
                        }
                    }
                }
            }
            echo "</div><a class='carousel-control-prev' href='#cc' data-slide='prev'></a>
                <a class='carousel-control-next' href='#cc' data-slide='next'></a></div></td>";
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?> </body>

</html>
