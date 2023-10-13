<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lugares De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM03.php"; $m = new OPM03(); $v = array();
if (isset($_POST["tipol"])) { $v = $m->getMar(); } if (isset($_POST["b1"])) { $v = $m->getLugaresCanon(); }
if (isset($_POST["b2"])) { $v = $m->getLugaresNoCanon(); }
foreach ($m->c1() as $c1) foreach ($m->c2() as $c2) foreach ($m->c3() as $c3) foreach ($m->c4() as $c4) foreach ($m->c5() as $c5)
foreach ($m->c6() as $c6) foreach ($m->c7() as $c7) foreach ($m->c8() as $c8) foreach ($m->c9() as $c9) foreach ($m->c10() as $c10)
foreach ($m->c11() as $c11) {
    echo "Lugares East Blue: $c1 | North Blue: $c2 | South Blue: $c3 | West Blue: $c4 | Red Line: $c5 | Calm Belt: $c6 | Paradise:
    $c7 | Nuevo Mundo: $c8 | Desconocidos: $c9 | Canon: $c10 | No Canon: $c11 | Lugares: ". ($c10 + $c11) ."<hr>";
} echo "<form action='OP07.php' method='post'><select name='tipov'>";
foreach ($m->sacaMar() as $tipo) { echo "<option value='$tipo'>$tipo</option>"; }
echo "</select><input type='submit' value='Buscar Lugares' name='tipol'>
<input type='submit' name='b1' value='Canon'> <input type='submit' name='b2' value='No Canon'></form><br>";
if (isset($_POST["tipol"]) || isset($_POST["b1"]) || isset($_POST["b2"])) {
    echo "<table><tr><th>Region y Mar</th><th>Tipo, Subtipo y Clima De Lugar</th><th>Lugar</th></tr>";
    foreach ($v as $c) {
        echo "<tr><td bgcolor='orange'>" . $c["nombreregion"] . " (" . $c["mar"] .
            ")<br><br><Img src='imglugares/" . $c["mar"] . ".png' width='600px' height='600px'></td>
                <td bgcolor='lightblue'>" . $c["tipolugar"] . " (" . $c["subtipolugar"] .
            ")<br><br>Clima " . $c["climas"] . "</td><td bgcolor='yellow'>" . $c["nombrelugar"]
            . "<br><br><Img src='imglugares/" . $c["imagenlugar"] . "' width='600px' height='600px'></td>";
    } echo "</table>";
} ?>
</body>

</html>
