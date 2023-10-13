<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Episodios De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM11.php"; $m = new OPM11(); $v = array();
if (isset($_POST["temp"])) { $v = $m->getTemporada(); } if (isset($_POST["opening"])) { $v = $m->getOpening(); }
if (isset($_POST["ending"])) { $v = $m->getEnding(); } if (isset($_POST["ar"])) { $v = $m->getArco(); }
if (isset($_POST["sa"])) { $v = $m->getSaga(); } if (isset($_POST["b1"])) { $v = $m->getEpisodiosCanon(); }
if (isset($_POST["b2"])) { $v = $m->getEpisodiosNoCanon(); }
foreach ($m->c1() as $c1) foreach ($m->c2() as $c2) foreach ($m->c3() as $c3) foreach ($m->c4() as $c4) foreach ($m->c5() as $c5)
foreach ($m->c6() as $c6) foreach ($m->c7() as $c7) foreach ($m->c8() as $c8) foreach ($m->c9() as $c9) foreach ($m->c10() as $c10)
foreach ($m->c11() as $c11) foreach ($m->c12() as $c12) {
    echo "Episodios Saga Del East Blue: $c1 | Saga De Arabasta: $c2 | Saga De La Isla Del Cielo: $c3 | Saga De Water 7: $c4 |
        Saga De Thriller Bark: $c5 | Saga De La Guerra En La Cumbre: $c6<hr>Episodios Saga De La Isla De Los Hombres Pez: $c7 |
        Saga De Dressrosa: $c8 | Saga Cuatro Emperadores: $c9 | Saga Final: $c10 | Episodios Canon: $c11 | No Canon: $c12 |
        Episodios: ". ($c11+$c12) ."<hr>";
} echo "<form action='OP31.php' method='post'><select name='tempv'>";
foreach ($m->sacaTemporada() as $temporada) { echo "<option value='$temporada'>" . $temporada . "ª</option>"; }
echo "</select><input type='submit' value='Buscar Temporada' name='temp'><select name='openingv'>";
foreach ($m->sacaOpening() as $opening) { echo "<option value='$opening'>Opening $opening</option>"; }
echo "</select><input type='submit' value='Buscar Opening' name='opening'><select name='endingv'>";
foreach ($m->sacaEnding() as $ending) { echo "<option value='$ending'>Ending $ending</option>"; }
echo "</select><input type='submit' value='Buscar Ending' name='ending'><br><br><select name='arcov'>";
foreach ($m->sacaArcos() as $arco) { echo "<option value='$arco'>Arco $arco</option>"; }
foreach ($m->sacaArcosNoCanon() as $arconc) { echo "<option value='$arconc'>Arco $arconc (No Canon)</option>"; }
echo "</select><input type='submit' value='Buscar Arco' name='ar'><select name='sagav'>";
foreach ($m->sacaSagas() as $saga) { echo "<option value='$saga'>Saga $saga</option>"; }
echo "</select><input type='submit' value='Buscar Saga' name='sa'> <input type='submit' name='b1' value='Canon'>
<input type='submit' name='b2' value='No Canon'></form><br>";
if (isset($_POST["temp"]) || isset($_POST["opening"]) || isset($_POST["ending"]) || isset($_POST["ar"]) || isset($_POST["sa"])
    || isset($_POST["b1"]) || isset($_POST["b2"])) {
    echo "<table><tr><th>Saga Principal y Episodio</th><th>Opening y/o Ending</th><th>Arco y Saga</th></tr>";
    foreach ($v as $c) { echo "<tr><td id='ng'>Mar ";
        if ($c["idep"]<=516){echo "De La Supervivencia: Saga De Los Supernovas"; } else{echo "Final: Saga Del Nuevo Mundo"; }
        echo "<br><br>" . $c["temp"] . "ª Temporada: Episodio " . $c["idep"];
        if ($c["cep"] == "No") { echo " (No Canon)"; }
            echo "<br><br>" . $c["nombreepisodio"] . "<br><br>Estreno: ". $c["forigep"] . "<br><br><Img src='imgepisodios/Episodio "
             . $c["idep"] . ".png' width='400px'></td><td bgcolor='orange'>Opening " . $c["opening"] .
            "<br><br><Img src='imgvoljuegospeli/Opening " . $c["opening"] . ".png' width='400px'>";
        if ($c["ending"] != "Ninguno") {
            echo "<br><br>Ending " . $c["ending"] ."<br><br><Img src='imgvoljuegospeli/".$c["imagenending"] . ".png' width='400px'>";
        }
        echo "</td><td bgcolor='orange'>Arco " . $c["arco"]; if ($c["carc"] == "No") { echo " (No Canon)"; }
        echo "<br><br><Img src='imgvoljuegospeli/Arco " . $c["arco"] . ".png' width='400px'><br><br>Saga " . $c["saga"] .
            "<br><br><Img src='imgvoljuegospeli/Saga " . $c["saga"] . ".png' width='400px'></td></tr>";
    } echo "</table>";
} ?>
</body>

</html>
