<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>OPs Estilos Combate</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM17.php"; $m = new OPM17(); $v = array();
if (isset($_POST["armaestiloc"])) { $v = $m->getArmaEstiloC(); } if (isset($_POST["tipoestiloc"])) { $v = $m->getTipoEstiloC(); }
if (isset($_POST["subtestc1"])) { $v = $m->getSubTEstC1(); }
if (isset($_POST["subtestc2"])) { $v = $m->getSubTEstC2(); } if (isset($_POST["tipof"])) { $v = $m->getFrutas(); }
if(isset($_POST["subtipof"])){ $v = $m->getSubtipos(); } if(isset($_POST["nombref"])){ $v = $m->getNombreFrutas(); }
if (isset($_POST["b1"])) { $v = $m->getFMostradas(); } if (isset($_POST["b2"])) { $v = $m->getFrutasCanon(); }
if (isset($_POST["b3"])) { $v = $m->getFrutasNoCanon(); } if (isset($_POST["b4"])) { $v = $m->getTecnicasCanon(); }
if (isset($_POST["b5"])) { $v = $m->getTecnicasNoCanon(); }
foreach ($m->c1() as $c1) foreach ($m->c2() as $c2) { echo "Tecnicas Canon: $c1 | No Canon: $c2 | Total: ". ($c1 + $c2) ."<hr>"; }
echo "<form action='OP49.php' method='post'><select name='armaestilocv'>";
foreach ($m->sacaArmaEstiloC() as $armaestiloc) { echo "<option value='$armaestiloc'>$armaestiloc</option>"; }
echo "</select><input type='submit' value='Buscar Arma/Origen' name='armaestiloc'><select name='tipoestilocv'>";
foreach ($m->sacaTipoEstiloC() as $tipoestiloc) { echo "<option value='$tipoestiloc'>$tipoestiloc</option>"; }
echo "</select><input type='submit' value='Buscar Tipo E' name='tipoestiloc'><select name='subtipoestiloc1v'>";
foreach ($m->sacaSubTEstC1() as $subtipoestiloc1) { echo "<option value='$subtipoestiloc1'>$subtipoestiloc1</option>"; }
echo "</select><input type='submit' value='Buscar Subtipo1 E' name='subtestc1'><select name='subtipoestiloc2v'>";
foreach ($m->sacaSubTEstC2() as $subtipoestiloc2) { echo "<option value='$subtipoestiloc2'>$subtipoestiloc2</option>"; }
echo "</select><input type='submit' value='Buscar Subtipo2 E' name='subtestc2'><br><br><select name='tipov'>";
foreach ($m->sacaFruta() as $tipo) { echo "<option value='$tipo'>$tipo</option>"; }
echo "</select><input type='submit' value='Buscar Tipo' name='tipof'><select name='subtipov'>";
foreach ($m->sacaSubtipo() as $subtipo) { echo "<option value='$subtipo'>$subtipo</option>"; }
echo "</select><input type='submit' value='Buscar Subtipo' name='subtipof'><select name='nombrev'>";
foreach ($m->sacaNombre() as $nombre) { echo "<option value='$nombre'>Fruta $nombre $nombre</option>"; }
echo "</select><input type='submit' value='Buscar Fruta' name='nombref'> <input type='submit' name='b1' value='Mostrada'>
<input type='submit' name='b2' value='Fruta Canon'> <input type='submit' name='b3' value='Fruta No Canon'>
<input type='submit' name='b4' value='Técnica Canon'> <input type='submit' name='b5' value='Técnica No Canon'></form><br>";
if (isset($_POST["armaestiloc"]) || isset($_POST["tipoestiloc"]) || isset($_POST["subtestc1"]) ||
    isset($_POST["subtestc2"]) || isset($_POST["tipof"]) || isset($_POST["subtipof"]) || isset($_POST["nombref"]) ||
    isset($_POST["b1"]) || isset($_POST["b2"]) || isset($_POST["b3"]) || isset($_POST["b4"]) || isset($_POST["b5"])) { echo "<table>";
    foreach ($v as $c) { echo "<tr><th>Arma/Estilo Combate (Tipo y Subtipos)</th><th>Técnica";
        if ($c["tcanon"]!="Si") { echo " No Canon"; } echo "</th><th>Usuario/s</th>";
        if ($c["tipofruta"] !="No") { echo "<th>Fruta Del Diablo (Tipo y Subtipo)</th>"; } echo "</tr><tr><td>" . $c["tipoestiloc"];
        if ($c["subtipoestiloc1"] !="No") { echo ": " . $c["subtipoestiloc1"]; }
        if ($c["subtipoestiloc2"] !="No") { echo " (" . $c["subtipoestiloc2"] . ")"; }
        echo "<br><br>Basado En: ".$c["armaestiloc"]."<br><br>Uso: ".$c["uso"] . "</td><td bgcolor='lightgreen'>";
        if ($c["tecnica"]!="No") { echo $c["noriginaltecnica"]." (".$c["tecnica"].")"; }
        echo "<br><br><Img src='imghakiytecnicas/" . $c["imgtecnica"] . ".png' width='400px' height='400px'></td>
            <td bgcolor='yellow'>" . $c["usuario"] . "<br><br><Img src='imgpersonajes/" . $c["imgusuario"] .
            ".png' width='400px' height='400px'></td>";
        if ($c["tipofruta"]!="No"){ echo "<td bgcolor='orange'>".$c["tipofruta"]." ";
            if ($c["subtipofruta"]!="Normal"){ echo $c["subtipofruta"]; }
            if ($c["cfruta"]!="Si"){echo " (No Canon)"; } echo "<br><br>Fruta " . $c["noriginal"]." (".$c["nfruta"] . ")";
            if ($c["modelo"] != "Sin Modelo" || $c["nfruta"] == "Picor") { echo " Modelo " . $c["modelo"]; }
            echo "<br><br><Img src='imgfrutasformas/" . $c["imgfruta"] . ".png' width='400px' height='400px'></td>";
        } echo "</tr>";
    } echo "</table>";
} ?>
</body>

</html>