<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Especies De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM08.php"; $m = new OPM08(); $v = array();
if (isset($_POST["buscartipoes"])) { $v = $m->getTipoEspecie(); }
if (isset($_POST["b1"])) { $v = $m->getEspeciesCanon(); } if (isset($_POST["b2"])) { $v = $m->getEspeciesNoCanon(); }
foreach ($m->c1() as $c1) foreach ($m->c2() as $c2) foreach ($m->c3() as $c3) foreach ($m->c4() as $c4) foreach ($m->c5() as $c5)
foreach ($m->c6() as $c6) foreach ($m->c7() as $c7) foreach ($m->c8() as $c8) foreach ($m->c9() as $c9) foreach ($m->c10() as $c10) {
    echo "Especies Globales: $c1 | East Blue: $c2 | South Blue: $c3 | West Blue: $c4 | Red Line: $c5 | Paradise: $c6
    | Nuevo Mundo: $c7 | Mar Desconocido: $c8 | Canon: $c9 | No Canon: $c10 | Especies: " . ($c9 + $c10) . "<hr>";
} echo "<form action='OP22.php' method='post'><select name='tipov'>";
foreach ($m->sacaTipoEspecie() as $tipo) { echo "<option value='$tipo'>Especies $tipo</option>"; }
echo "</select><input type='submit' value='Buscar Tipo De Especie' name='buscartipoes'>
<input type='submit' name='b1' value='Canon'> <input type='submit' name='b2' value='No Canon'></form><br>";
if (isset($_POST["buscartipoes"]) || isset($_POST["b1"]) || isset($_POST["b2"])) {
    echo "<table><tr><th>Miembro De La Especie (Tipo y Subtipo)</th><th>Especie</th><th>Lugar De Origen</th></tr>";
    foreach ($v as $c) {
        echo "<tr><td bgcolor='orange'>" . $c["tipoespecie"] . " ("
            . $c["subtipoespecie"] . "): " . $c["miembroespecies"] . "<br><br><Img src='imgespecieyraza/"
            . $c["imagenmiembroespecies"] . "' width='475px' height='475px'></td>
            <td bgcolor='lightgreen'>" . $c["nombreespecie"] .
            "<br><br><Img src='imgespecieyraza/" . $c["imagenespecie"] .
            "' width='475px' height='475px'></td><td bgcolor='lightgreen'>" .
            $c["nombrelugarorigen"] . " (" . $c["marorigen"] . ")<br><br><Img src='imglugares/"
            . $c["imagenlugarorigen"] . ".png' width='475px' height='475px'></td></tr>";
    } echo "</table>";
} ?>
</body>

</html>