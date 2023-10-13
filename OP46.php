<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Manga/Anime One Piece</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM16.php"; $m = new OPM16(); $v = array(); if (isset($_POST["pa"])) { $v = $m->getPAnime(); }
if (isset($_POST["npag"])) { $v = $m->getNPag(); } if (isset($_POST["tp"])) { $v = $m->getPortada(); }
if (isset($_POST["m"])) { $v = $m->getCapMinihistoria(); } if (isset($_POST["ar"])) { $v = $m->getArco(); }
if (isset($_POST["sa"])) { $v = $m->getSaga(); }
foreach ($m->c1() as $c1) foreach ($m->c2() as $c2) foreach ($m->c3() as $c3) foreach ($m->c4() as $c4)
foreach ($m->c5() as $c5) foreach ($m->c6() as $c6) foreach ($m->c7() as $c7) foreach ($m->c8() as $c8)
foreach ($m->c9() as $c9) foreach ($m->c10() as $c10) foreach ($m->c11() as $c11) {
    $t = $c2 + $c3 + $c4 + $c5 + $c6 + $c7 + $c8 + $c9 + $c10 + $c11;
    echo "Capitulos Con Minihistoria: $c1 | Saga Del East Blue: $c2 | Saga De Arabasta: $c3 | Saga De La Isla Del Cielo: $c4 |
        Saga De Water 7: $c5 | Saga De Thriller Bark: $c6<hr>Capitulos Saga Guerra En La Cumbre: $c7 | Saga Isla De Los Hombres Pez:
        $c8 | Saga De Dressrosa: $c9 | Saga De Los Cuatro Emperadores: $c10 | Saga Final: $c11 | Capitulos: $t<hr>";
} echo "<form action='OP46.php' method='post'><select name='npagv'>";
foreach ($m->sacaNPag() as $npag) { echo "<option value='$npag'>$npag</option>"; }
echo "</select><input type='submit' value='Buscar Nº Pag' name='npag'><select name='tipov'>";
foreach ($m->sacaPortadas() as $tipo) { echo "<option value='$tipo'>$tipo</option>"; }
echo "</select><input type='submit' value='Buscar Tipo De Portada' name='tp'><select name='miniv'>";
foreach ($m->sacaMinihistoria() as $mini) { echo "<option value='$mini'>$mini</option>"; }
echo "</select><input type='submit' value='Buscar Minihistoria' name='m'><br><br><select name='arcov'>";
foreach ($m->sacaArcos() as $arco) { echo "<option value='$arco'>Arco $arco</option>"; }
echo "</select><input type='submit' value='Buscar Arco' name='ar'><select name='sagav'>";
foreach ($m->sacaSagas() as $saga) { echo "<option value='$saga'>Saga $saga</option>"; }
echo "</select><input type='submit' value='Buscar Saga' name='sa'> <input type='submit' value='Portada Anime' name='pa'></form><br>";
if (isset($_POST["npag"]) || isset($_POST["tp"])||isset($_POST["m"])||isset($_POST["ar"])||isset($_POST["sa"])||isset($_POST["pa"])) {
    echo "<table><tr><th>Capitulo</th><th>Episodio/s</th><th>Opening, Especial/es, Peli y Videojuego</th><th>Arco y Saga</th></tr>";
    foreach ($v as $c) { echo "<tr><td>Capítulo " .$c["idcap"].": ".$c["nombrecapitulo"]."<br><br>" . $c["tipoportada"];
        if ($c["minihistoria"] != "Ninguna") { echo "<br><br>" . $c["minihistoria"]; }
        if ($c["nombreportada"] != "Ninguna") { echo ": " . $c["nombreportada"]; }
        echo "<br><br> " . $c["npag"] . " Paginas<br><Img src='imgcapitulos/Capitulo ".$c["idcap"]; if ($c["c"] == "C") { echo "C"; }
        echo ".png' width='350px'></td><td id='ng'><div id='cc' class='carousel slide' data-ride='carousel'><div class='carousel-inner'>
            <div class='carousel-item active'>Episodio " . $c["ep1"] . " (Pagina/s " . $c["pag1"] .
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
    } echo "</table>";
} ?> </body>

</html>