<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Recompensas</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM04.php"; $m = new OPM04(); $v = array();
if (isset($_POST["tipor"])) { $v = $m->getRecompensas(); } if (isset($_POST["b1"])) { $v = $m->getRecCanon(); }
if (isset($_POST["b2"])) { $v = $m->getRecNoCanon(); }
foreach ($m->c1() as $c1) foreach ($m->c2() as $c2) foreach ($m->c3() as $c3) foreach ($m->c4() as $c4) foreach ($m->c5() as $c5)
foreach ($m->c6() as $c6) {
    echo "Recompensas Activas: $c1 | Inctivas: $c2 | En Estado Desconocido: $c3 | Perdonadas: $c4 | Canon: $c5 | No Canon: $c6<hr>";
} echo "<form action='OP10.php' method='post'><select name='tipov'>";
foreach ($m->sacaTipoRec() as $tipo) { echo "<option value='$tipo'>Recompensa $tipo</option>"; }
echo "</select><input type='submit' value='Buscar Tipo De Recompensa' name='tipor'>
<input type='submit' name='b1' value='Canon'> <input type='submit' name='b2' value='No Canon'></form><br>";
if (isset($_POST["tipor"]) || isset($_POST["b1"]) || isset($_POST["b2"])) {
    echo "<table><tr><th>Recompensa</th><th>Personaje</th><th>Nombre Banda</th></tr>";
    foreach ($v as $c) {
        echo "<tr><td bgcolor='orange'>Recompensa " . $c["tiporec"] . " (" . $c["subtiporec"] . ")<br><br>" . $c["num"] . "ª Cifra: " .
            $c["recompensa"] . " <Img src='imgrecygrupos/Berry.gif'><br><br><Img src='imgrecygrupos/Recompensa " .
            $c["imagenrecompensa"] . ".png' width='475px' height='475px'></td><td bgcolor='yellow'>" . $c["usuariorecompensa"];
            if ($c["muerte"]!="No"){echo " (Fallecido/a)"; }
        echo "<br><br><Img src='imgpersonajes/" . $c["imgusuariorecompensa"] . ".png' width='475px' height='475px'></td>
            <td bgcolor='yellow'>" . $c["nombrebanda"] . "<br><br><Img src='imgrecygrupos/" . $c["imagenbanda"] .
            ".png' width='475px' height='475px'></td></tr>";
    } echo "</table>";
} ?>
</body>

</html>