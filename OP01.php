<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Frutas Del Diablo</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM01.php"; $m = new OPM01(); $v = array();
if (isset($_POST["tipof"])) { $v = $m->getFrutas(); } if (isset($_POST["subtipof"])) { $v = $m->getSubtipos(); }
if (isset($_POST["nombref"])) { $v = $m->getNombreFrutas(); } if (isset($_POST["modelo"])) { $v = $m->getModelo(); }
if (isset($_POST["nivel"])) { $v = $m->getNivel(); } if (isset($_POST["usof"])) { $v = $m->getUsoFruta(); }
if (isset($_POST["b1"])) { $v = $m->getFMostradas(); } if (isset($_POST["b2"])) { $v = $m->getFrutasCanon(); }
if (isset($_POST["b3"])) { $v = $m->getFrutasNoCanon(); }
foreach ($m->sumado() as $sumado) { echo "Sumado Tipo Desconocido (4 cada uno): " . $sumado . " | "; }
foreach ($m->c() as $c) foreach ($m->c0() as $c0) foreach ($m->c1() as $c1) foreach ($m->c1b() as $c1b) foreach ($m->c1c() as $c1c)
foreach ($m->c1d() as $c1d) foreach ($m->c1e() as $c1e) foreach ($m->c2() as $c2) foreach ($m->c3() as $c3) foreach ($m->c4() as $c4)
foreach ($m->c5() as $c5) foreach ($m->c6() as $c6) { $zoan = $c1 + $c1b + $c1c + $c1d + $c1e; $totalf = $c + $c0 + $zoan + $c2 + $c;
    echo "Tipos Frutas: ($c Desconocido) + ($c0 Logia) + $zoan Zoan) + (Paramecia: $c2) = $totalf | Mostradas: ($c3 Canon) +
    ($c4 No Canon) = " . ($c3 + $c4) . " | Canon: $c5 | No Canon: $c6<hr>";
} echo "<form action='OP01.php' method='post'><select name='tipov'>";
foreach ($m->sacaFruta() as $tipo) { echo "<option value='$tipo'>$tipo</option>"; }
echo "</select><input type='submit' value='Buscar Tipo' name='tipof'><select name='subtipov'>";
foreach ($m->sacaSubtipo() as $subtipo) { echo "<option value='$subtipo'>$subtipo</option>"; }
echo "</select><input type='submit' value='Buscar Subtipo' name='subtipof'><select name='nombrev'>";
foreach ($m->sacaNombre() as $nombre) { echo "<option value='$nombre'>Fruta $nombre $nombre</option>"; }
echo "</select><input type='submit' value='Buscar Fruta' name='nombref'><select name='modelov'>";
foreach ($m->sacaModelo() as $modelo) { echo "<option value='$modelo'>$modelo</option>"; }
echo "</select><input type='submit' value='Buscar Modelo' name='modelo'><br><br><select name='nivelv'>";
foreach ($m->sacaNivel() as $nivel) { echo "<option value='$nivel'>Nivel $nivel</option>"; }
echo "</select><input type='submit' value='Buscar Nivel Usuario' name='nivel'><select name='usofrutav'>";
foreach ($m->sacaUsoFruta() as $usofrutav) { echo "<option value='$usofrutav'>$usofrutav</option>"; }
echo "</select><input type='submit' value='Buscar Uso Fruta' name='usof'> <input type='submit' name='b1' value='Mostrada'>
<input type='submit' name='b2' value='Canon'> <input type='submit' name='b3' value='No Canon'></form><br>";
if (isset($_POST["tipof"]) || isset($_POST["subtipof"]) || isset($_POST["nombref"]) || isset($_POST["modelo"]) ||
    isset($_POST["nivel"]) || isset($_POST["usof"]) || isset($_POST["b1"]) || isset($_POST["b2"]) || isset($_POST["b3"])) {
    echo "<table><tr>"; foreach ($v as $c) {
        if ($c["tipofruta"] == "Zoan") { echo "<th colspan='2'>Fruta Del Diablo (Tipo, Subtipo, Uso y Forma/s)</th>"; }
        else { echo "<th>Fruta Del Diablo (Tipo, Subtipo y Uso)</th>"; }
        echo "<th>Técnica</th><th>Usuario/s y Nivel</th></tr><tr><td bgcolor='orange'>".$c["tipofruta"]." ";
        if ($c["subtipofruta"]!="Normal"){ echo $c["subtipofruta"]; }
        if ($c["canon"]!="Si"){echo " (No Canon)"; } echo "<br><br>Fruta " . $c["noriginal"] . " (" . $c["nfruta"] . ")";
        if ($c["modelo"] != "Sin Modelo" || $c["nfruta"] == "Picor") { echo " Modelo " . $c["modelo"]; }
        echo "<br><br>Uso De La Fruta: " . $c["usofruta"] . "<br><br><Img src='imgfrutasformas/" . $c["imgfruta"] .
            ".png' width='350px' height='350px'>";
        if ($c["tipofruta"] == "Zoan") { echo "</td><td bgcolor='orange'>Forma ";
            if ($c["fanimal"] != "No" && $c["fhibrida"] != "No") {
                echo "Animal<br><br><Img src='imgfrutasformas/" . $c["fanimal"] ." Animal.png' width='350px' height='350px'><br><br>
                    Hibrida<br><br><Img src='imgfrutasformas/" . $c["fhibrida"] . " Hibrida.png' width='350px' height='350px'>";
            } else {
                if ($c["fanimal"]!="No") {
                    echo "Animal<br><br><Img src='imgfrutasformas/".$c["fanimal"]." Animal.png' width='350px' height='350px'><br><br>";
                } if ($c["fhibrida"]!="No") {
                    echo "Hibrida<br><br><Img src='imgfrutasformas/".$c["fhibrida"]." Hibrida.png' width='350px' height='350px'>";
                }
            }
        } echo "</td><td bgcolor='lightgreen'>"; if ($c["tecnica"] != "No") { echo $c["noriginaltecnica"]." (".$c["tecnica"].")"; }
        echo "<br><br><Img src='imghakiytecnicas/" . $c["imgtecnica"] . ".png' width='350px' height='350px'></td><td bgcolor='yellow'>";
        if ($c["usuario"] == "Desconocido") {
            echo "Usuario Anterior: " . $c["usuarioanterior"] . " (Nivel " . $c["nivel"] .")<br><br><Img src='imgpersonajes/" .
            $c["imgusuarioanterior"];
        } else { if ($c["usuarioanterior"] != "No") {
                echo $c["usuario"] . " (Nivel " . $c["nivel"] . ")<br><br><Img src='imgpersonajes/" .
                    $c["imgusuario"] . ".png' width='350px' height='350px'><br><br>Usuario Anterior: " .
                    $c["usuarioanterior"] ."<br><br><Img src='imgpersonajes/" . $c["imgusuarioanterior"];
            } else { echo $c["usuario"] . " (Nivel " . $c["nivel"] . ")<br><br><Img src='imgpersonajes/" . $c["imgusuario"]; }
        } echo ".png' width='350px' height='350px'></td></tr>";
    } echo "</table>";
} ?>
</body>

</html>