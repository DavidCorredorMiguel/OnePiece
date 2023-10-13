<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Razas De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM09.php"; $m = new OPM09(); $v = array();
if (isset($_POST["tipor"])) { $v = $m->getRazas(); } if (isset($_POST["b1"])) { $v = $m->getRazasCanon(); }
if (isset($_POST["b2"])) { $v = $m->getRazasNoCanon(); }
foreach ($m->c1() as $c1) foreach ($m->c2() as $c2) foreach ($m->c3() as $c3) foreach ($m->c4() as $c4) foreach ($m->c5() as $c5) {
    echo "Razas Narurales: $c1 | Razas Hibrida: $c2 | Razas Artificial: $c3 | Razas Canon: $c4 | Razas No Canon: $c5<hr>";
} echo "<form action='OP25.php' method='post'><select name='tipov'>";
foreach ($m->sacaRazas() as $tipo) { echo "<option value='$tipo'>Raza $tipo</option>"; }
echo "</select><input type='submit' value='Buscar Tipo De Raza' name='tipor'>
<input type='submit' name='b1' value='Canon'> <input type='submit' name='b2' value='No Canon'></form><br>";
if (isset($_POST["tipor"]) || isset($_POST["b1"]) || isset($_POST["b2"])) {
    echo "<table><tr><th>Miembro De La Raza (Tipo y Subtipo)</th><th>Raza</th><th>Lugar De Origen</th></tr>";
    foreach ($v as $c) {
        echo "<tr><td bgcolor='orange'>Raza " . $c["tiporaza"] . " (" . $c["subtiporaza"] . "): "
            . $c["miembroraza"] . "<br><br><Img src='imgespecieyraza/" . $c["imagenmiembroraza"] .
            "' width='475px' height='475px'></td><td bgcolor='lightgreen'>" . $c["nombreraza"] .
            "<br><br><Img src='imgespecieyraza/" . $c["imagenraza"] . "' width='475px' height='475px'></td>
            <td bgcolor='lightgreen'>" . $c["nombrelugarorigen"] . " (" . $c["marorigen"] .
            ")<br><br><Img src='imglugares/" . $c["imagenlugarorigen"] . "' width='475px' height='475px'></td></tr>";
    } echo "</table>";
} ?>
</body>

</html>
