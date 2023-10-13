<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Haki</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM02.php"; $m = new OPM02(); $v = array();
if (isset($_POST["tipoh"])) { $v = $m->getHaki(); } if (isset($_POST["b1"])) { $v = $m->getHakiCanon(); }
if (isset($_POST["b2"])) { $v = $m->getHakiNoCanon(); }
foreach ($m->c1() as $c1) foreach ($m->c2() as $c2) foreach ($m->c3() as $c3) foreach ($m->c4() as $c4) foreach ($m->c5() as $c5) {
    echo "Usuarios Haki Del Rey: $c1 | Haki De Armadura: $c2 | Haki De Observación: $c3 | Usuarios Canon: $c4 | No Canon: $c5<hr>";
} echo "<form action='OP04.php' method='post'><select name='tipov'>";
foreach ($m->sacaHaki() as $tipo) { echo "<option value='$tipo'>$tipo</option>"; }
echo "</select><input type='submit' value='Buscar Tipo De Haki' name='tipoh'> <input type='submit' name='b1' value='Canon'>
<input type='submit' name='b2' value='No Canon'></form><br>";
if (isset($_POST["tipoh"]) || isset($_POST["b1"]) || isset($_POST["b2"])) {
    echo "<table><tr><th>Tipo Haki y Técnica</th><th>Usuario Haki y Nivel</th></tr>";
    foreach ($v as $c) {
        echo "<tr><td bgcolor='orange'>" . $c["tiposdehaki"] . "<br><br>" . $c["nombreoriginaltecnica"] . " (" .
            $c["nombretecnica"] . ")<br><br><Img src='imghakiytecnicas/" . $c["imagentecnica"] .
            ".png' width='725px' height='725px'></td><td bgcolor='lightblue'>" . $c["usuariohaki"] . " (" . $c["tipousuario"] .
            ")<br><br>Nivel " . $c["nivel"] . "<br><br><Img src='imgpersonajes/" . $c["imagenusuariohaki"] .
            ".png' width='725px' height='725px'></td></tr>";
    } echo "</table>";
} ?>
</body>

</html>
