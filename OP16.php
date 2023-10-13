<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Grupos Del Gobierno De OP</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM06.php"; $m = new OPM06(); $v = array();
if (isset($_POST["tipogr"])) { $v = $m->getTipoGrupo(); } if (isset($_POST["tipom"])) { $v = $m->getTipoMiembro(); }
if (isset($_POST["titulog"])) { $v = $m->getTituloGrupo(); } if (isset($_POST["b0"])) { $v = $m->getMuerte(); }
if (isset($_POST["estado"])) { $v = $m->getEstado(); } if (isset($_POST["g"])) { $v = $m->getGrupo(); }
if (isset($_POST["barcog"])) { $v = $m->getBarco(); } if (isset($_POST["b1"])) { $v = $m->getGGobCanon(); }
if (isset($_POST["b2"])) { $v = $m->getGGobNoCanon(); }
foreach ($m->c1() as $c1) foreach ($m->c2() as $c2) foreach ($m->c3() as $c3) foreach ($m->c4() as $c4) foreach ($m->c5() as $c5)
foreach ($m->c6() as $c6) {
    echo "Miembros Organizaciones Activas: $c1 | Inctivas: $c2 | En Estado Desconocido: $c3 | Canon: $c4 | No Canon: $c5 |
    Personajes Fallecidos: $c6<hr>";
} echo "<form action='OP16.php' method='post'><select name='tipogv'>";
foreach ($m->sacaTipoGrupo() as $tipog) { echo "<option value='$tipog'>$tipog</option>"; }
echo "</select><input type='submit' value='Buscar Tipo De Organización' name='tipogr'><select name='tipomv'>";
foreach ($m->sacaTipoMiembro() as $tipom) { echo "<option value='$tipom'>$tipom</option>"; }
echo "</select><input type='submit' value='Buscar Tipo De Miembro' name='tipom'><select name='titulogv'>";
foreach ($m->sacaTituloGrupo() as $titulog) { echo "<option value='$titulog'>$titulog</option>"; }
echo "</select><input type='submit' value='Buscar Titulo De Organización' name='titulog'>
<input type='submit' name='b0' value='Fallecido/a'><br><br><select name='estadov'>";
foreach ($m->sacaEstado() as $estado) { echo "<option value='$estado'>Organización $estado</option>"; }
echo "</select><input type='submit' value='Buscar Estado' name='estado'><select name='gv'>";
foreach ($m->sacaGrupo() as $g) { echo "<option value='$g'>$g</option>"; }
echo "</select><input type='submit' value='Buscar Organización' name='g'><select name='barcogv'>";
foreach ($m->sacaBarco() as $barcog) { echo "<option value='$barcog'>$barcog</option>"; }
echo "</select><input type='submit' value='Buscar Barco' name='barcog'> <input type='submit' name='b1' value='Canon'>
<input type='submit' name='b2' value='No Canon'></form><br>";
if (isset($_POST["tipogr"]) || isset($_POST["tipom"]) || isset($_POST["titulog"]) || isset($_POST["b0"]) || isset($_POST["estado"]) ||
    isset($_POST["g"]) || isset($_POST["barcog"]) || isset($_POST["b1"]) || isset($_POST["b2"])) {
    echo "<table><tr><th>Titulo, Tipo y Miembro Organización</th><th>Organizaciones</th><th>Barco</th></tr>";
    foreach ($v as $c) { echo "<tr><td bgcolor='orange'>".$c["tipomiembro"]." Del Grupo ".$c["tiposdegrupos"];
        if ($c["canon"]!="Si"){ echo " (No Canon)"; } echo ": " . $c["miembrogrupo"]; if ($c["muerte"]!="No"){ echo " (Fallecido/a)"; }
        echo "<br><span style='color: blue'>Ocupacion: </span>" . $c["titulogrupo"] . "<br><br><Img src='imgpersonajes/" .
            $c["imgmiembro"] . ".png' width='475px' height='475px'></td><td bgcolor='lightgreen'>" . $c["grupo"] .
            "<br><span style='color: blue'>Estado: </span>" . $c["estado"] . "<br><span style='color: blue'>Nº Miembros: </span>" .
            $c["miembros"] . "<br><br><Img src='imgrecygrupos/" .$c["imggrupo"] . ".png' width='475px' height='475px'><br><br>";
        if ($c["grupo"] != $c["anteriorgrupo"]) {
            echo $c["anteriorgrupo"] . "<br><br><Img src='imgrecygrupos/" .$c["imganteriorgrupo"] .".png' width='475px' height='475px'>";
        }
        echo "</td><td bgcolor='lightgreen'>" . $c["barco"] . "<br><br><Img src='imgrecygrupos/" . $c["imgbarco"] .
            ".png' width='475px' height='475px'></td></tr>";
    } echo "</table>";
} ?>
</body>

</html>