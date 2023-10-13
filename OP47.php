<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Manga/Anime One Piece</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
</head>

<body>
    <form action='OP47.php' method='post' style="text-align: center;">
        <input type="text" name="pa" placeholder="Portada Anime (Si/No)">
        Nº Capitulo-><input type="number" name="idcap" min=1 max="2000">
        <input type="text" name="minihistoria" placeholder="Minihistoria">
        <input type="text" name="tipoportada" placeholder="Tipo Portada">
        <input type="text" name="arco" placeholder="Arco"> <input type="text" name="saga" placeholder="Saga">
        <br><br><input type="submit" name="buscarcap" value="Buscar Capítulo">
    </form> <?php try { if (isset($_POST["buscarcap"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM mangaanime WHERE pa=? OR idcap=? OR minihistoria=? OR tipoportada=?OR arco=?OR saga=?");
        $res->bindParam(1, $_POST["pa"]); $res->bindParam(2, $_POST["idcap"]); $res->bindParam(3, $_POST["minihistoria"]);
        $res->bindParam(4, $_POST["tipoportada"]); $res->bindParam(5, $_POST["arco"]);$res->bindParam(6, $_POST["saga"]);$res->execute();
        echo "<table><tr><th>Capitulo</th><th>Episodio/s</th><th>Opening, Especial/es, Peli y Videojuego</th><th>Arco y Saga</th></tr>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>Capítulo " .$c["idcap"].": ".$c["nombrecapitulo"]."<br><br>" . $c["tipoportada"];
            if ($c["minihistoria"] != "Ninguna") { echo "<br><br>" . $c["minihistoria"]; }
            if ($c["nombreportada"] != "Ninguna") { echo ": " . $c["nombreportada"]; }
            echo "<br><br> " . $c["npag"] . " Paginas<br><Img src='imgcapitulos/Capitulo ".$c["idcap"]; if ($c["c"] == "C") { echo "C"; }
            echo ".png' width='350px'></td><td id='ng'><div id='cc' class='carousel slide' data-ride='carousel'>
                <div class='carousel-inner'><div class='carousel-item active'>Episodio " . $c["ep1"] . " (Pagina/s " . $c["pag1"] .
                ")<br><br><Img src='imgepisodios/Episodio " . $c["ep1"] . ".png' width='350px'></div>";
            for ($p = 2; $p < 7; $p++) {
                if ($c["ep$p"] != "No") { echo "<div class='carousel-item'>Episodio " . $c["ep$p"]. " (Pagina/s ".$c["pag$p"];
                    echo ")<br><br><Img src='imgepisodios/Episodio " . $c["ep$p"] . ".png' width='350px'></div>";
                }
            } echo "</div><a class='carousel-control-prev' href='#cc' data-slide='prev'></a>
                <a class='carousel-control-next' href='#cc' data-slide='next'></a></div></td>
                <td bgcolor='lightgreen'><div id='cc2' class='carousel slide' data-ride='carousel'>
                <div class='carousel-inner'><div class='carousel-item active'>
                <img src='imgfrutasformas/FrutasDiablo.png' width='350px' height='350px'></div>";
            if ($c["opening"] != "No") { echo "<div class='carousel-item'>Opening " . $c["opening"] . " (Pagina/s " . $c["oppag"];
                echo ")<br><br><Img src='imgvoljuegospeli/Opening " . $c["opening"] . ".png' width='350px'></div>";
            } if ($c["epov1"] != "No") { echo "<div class='carousel-item'>" . $c["epov1"]. " (Pagina/s ".$c["epag1"];
                echo ")<br><br><Img src='imgvoljuegospeli/" . $c["epov1"] . ".png' width='350px'></div>";
            } if ($c["epov2"] != "No") { echo "<div class='carousel-item'>" . $c["epov2"]. " (Pagina/s ".$c["epag2"];
                echo ")<br><br><Img src='imgvoljuegospeli/" . $c["epov2"] . ".png' width='350px'></div>";
            } echo "<a class='carousel-control-prev' href='#cc2' data-slide='prev'></a>
                <a class='carousel-control-next' href='#cc2' data-slide='next'></a></div></td><td bgcolor='orange'>Arco " .$c["arco"] .
                "<br><br><Img src='imgvoljuegospeli/Arco " . $c["arco"] . ".png' width='350px'><br><br>Saga " . $c["saga"] .
                "<br><br><Img src='imgvoljuegospeli/Saga " . $c["saga"] . ".png' width='350px'></td></tr>";
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?>
</body>

</html>