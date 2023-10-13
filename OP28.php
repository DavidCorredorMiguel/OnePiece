<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Capítulos De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM10.php"; $m = new OPM10(); $v = array();
if (isset($_POST["vol"])) { $v = $m->getVol(); } if (isset($_POST["npag"])) { $v = $m->getNPag(); }
if (isset($_POST["tp"])) { $v = $m->getPortada(); } if (isset($_POST["m"])) { $v = $m->getCapMinihistoria(); }
if (isset($_POST["ar"])) { $v = $m->getArco(); } if (isset($_POST["sa"])) { $v = $m->getSaga(); }
foreach ($m->c1() as $c1) foreach ($m->c2() as $c2) foreach ($m->c3() as $c3) foreach ($m->c4() as $c4) foreach ($m->c5() as $c5)
foreach ($m->c6() as $c6) foreach ($m->c7() as $c7) foreach ($m->c8() as $c8) foreach ($m->c9() as $c9) foreach ($m->c10() as $c10)
foreach ($m->c11() as $c11) foreach ($m->c12() as $c12) { $t = $c2 + $c3 + $c4 + $c5 + $c6 + $c7 + $c8 + $c9 + $c10 + $c11 + $c12;
    echo "Capitulos Con Minihistoria: $c1 | Saga Del East Blue: $c2 | Saga De Arabasta: $c3 | Saga De La Isla Del Cielo: $c4 |
        Saga De Water 7: $c5 | Saga De Thriller Bark: $c6<hr>Capitulos Saga Guerra En La Cumbre: $c7 | Saga Isla De Los Hombres Pez:
        $c8 | Saga De Dressrosa: $c9 | Saga Whole Cake Island: $c10 | Saga Pais De Wano: $c11 | Saga Final: $c12 | Capitulos: $t<hr>";
} echo "<form action='OP28.php' method='post'><select name='volv'>";
foreach ($m->sacaVol() as $vol) { echo "<option value='$vol'>$vol</option>"; }
echo "</select><input type='submit' value='Buscar Volumen' name='vol'><select name='npagv'>";
foreach ($m->sacaNPag() as $npag) { echo "<option value='$npag'>$npag</option>"; }
echo "</select><input type='submit' value='Buscar Nº Pag' name='npag'><select name='tipov'>";
foreach ($m->sacaPortadas() as $tipo) { echo "<option value='$tipo'>$tipo</option>"; }
echo "</select><input type='submit' value='Buscar Tipo De Portada' name='tp'><select name='miniv'>";
foreach ($m->sacaMinihistoria() as $mini) { echo "<option value='$mini'>$mini</option>"; }
echo "</select><input type='submit' value='Buscar Minihistoria' name='m'><br><br><select name='arcov'>";
foreach ($m->sacaArcos() as $arco) { echo "<option value='$arco'>Arco $arco</option>"; }
echo "</select><input type='submit' value='Buscar Arco' name='ar'><select name='sagav'>";
foreach ($m->sacaSagas() as $saga) { echo "<option value='$saga'>Saga $saga</option>"; }
echo "</select><input type='submit' value='Buscar Saga' name='sa'></form><br>";
if (isset($_POST["vol"]) || isset($_POST["npag"]) || isset($_POST["tp"])||isset($_POST["m"])||isset($_POST["ar"])||isset($_POST["sa"])) {
    echo "<table><tr><th>Saga Principal y Volumen</th><th>Capitulo</th><th>Arco y Saga</th></tr>";
    foreach ($v as $c) { echo "<tr><td bgcolor='lightgreen'>Mar ";
        if ($c["idcap"] <= 597) { echo "De La Supervivencia: Saga De Los Supernovas"; } else { echo "Final: Saga Del Nuevo Mundo"; }
        echo "<br><br>Volumen " . $c["vol"] . ": " . $c["nombrevolumen"] . "<br><br>Lanzamiento: " . $c["forigvol"] . " (" . $c["vopag"] .
            " Paginas En Total)<br><br>Lanzamiento (En España): " . $c["fvol"] . " (" . $c["vpag"] . " Paginas En Total)<br><br>
            <Img src='imgvoljuegospeli/Volumen " . $c["vol"] . ".png' width='450px'></td><td>Capítulo " .
            $c["idcap"] . ": " . $c["nombrecapitulo"] . "<br><br>" . $c["tipoportada"];
        if ($c["minihistoria"] != "Ninguna") { echo "<br><br>" . $c["minihistoria"]; }
        if ($c["nombreportada"] != "Ninguna") { echo ": " . $c["nombreportada"]; }
        echo "<br><br>Lanzamiento: " . $c["fcap"] . " (" . $c["npag"] . " Paginas)<br><Img src='imgcapitulos/Capitulo " .
            $c["idcap"]; if ($c["c"] == "C") { echo "C"; }
        echo ".png' width='450px'></td><td bgcolor='orange'>Arco ".$c["arco"]."<br><br><Img src='imgvoljuegospeli/Arco " .
            $c["arco"] . ".png' width='450px'><br><br>Saga " . $c["saga"] . "<br><br><Img src='imgvoljuegospeli/Saga " .
            $c["saga"] . ".png' width='450px'></td></tr>";
    } echo "</table>";
} ?>
</body>

</html>
