<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>OP Frutas Limite/Relacion</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM15.php"; $m = new OPM15(); $v = array();
if (isset($_POST["limitacion"])) { $v = $m->getLimitacion(); } if (isset($_POST["subtl"])) { $v = $m->getSubTL(); }
if (isset($_POST["tipof"])) { $v = $m->getFrutas(); } if(isset($_POST["subtipof"])){ $v = $m->getSubtipos(); }
if(isset($_POST["nombref"])){ $v = $m->getNombreFrutas(); } if (isset($_POST["b1"])) { $v = $m->getFMostradas(); }
if (isset($_POST["b2"])) { $v = $m->getFrutasCanon(); } if (isset($_POST["b3"])) { $v = $m->getFrutasNoCanon(); }
foreach ($m->c() as $c) foreach ($m->c0() as $c0) foreach ($m->c1() as $c1) foreach ($m->c1b() as $c1b) foreach ($m->c1c() as $c1c)
foreach ($m->c1d() as $c1d) foreach ($m->c1e() as $c1e) foreach ($m->c2() as $c2) foreach ($m->c3() as $c3) foreach ($m->c4() as $c4)
foreach ($m->c5() as $c5) foreach ($m->c6() as $c6) { $zoan = $c1 + $c1b + $c1c + $c1d + $c1e; $totalf = $c + $c0 + $zoan + $c2 + $c;
    echo "Tipos Frutas: ($c Desconocido) + ($c0 Logia) + $zoan Zoan) + (Paramecia: $c2) = $totalf | Mostradas: ($c3 Canon) +
    ($c4 No Canon) = " . ($c3 + $c4) . " | Canon: $c5 | No Canon: $c6<hr>";
} echo "<form action='OP43.php' method='post'><select name='limitev'>";
foreach ($m->sacaLimitacion() as $limitacion) { echo "<option value='$limitacion'>$limitacion</option>"; }
echo "</select><input type='submit' value='Buscar Limitacion' name='limitacion'><select name='subtlv'>";
foreach ($m->sacaSubTL() as $subtl) { echo "<option value='$subtl'>$subtl</option>"; }
echo "</select><input type='submit' value='Buscar Tipo Limitacion Fruta' name='subtl'><br><br><select name='tipov'>";
foreach ($m->sacaFruta() as $tipo) { echo "<option value='$tipo'>$tipo</option>"; }
echo "</select><input type='submit' value='Buscar Tipo' name='tipof'><select name='subtipov'>";
foreach ($m->sacaSubtipo() as $subtipo) { echo "<option value='$subtipo'>$subtipo</option>"; }
echo "</select><input type='submit' value='Buscar Subtipo' name='subtipof'><select name='nombrev'>";
foreach ($m->sacaNombre() as $nombre) { echo "<option value='$nombre'>Fruta $nombre $nombre</option>"; }
echo "</select><input type='submit' value='Buscar Fruta' name='nombref'> <input type='submit' name='b1' value='Mostrada'>
<input type='submit' name='b2' value='Canon'> <input type='submit' name='b3' value='No Canon'></form><br>";
if (isset($_POST["tipof"]) || isset($_POST["subtipof"]) || isset($_POST["limitacion"]) || isset($_POST["subtl"])
    || isset($_POST["nombref"]) || isset($_POST["b1"]) || isset($_POST["b2"]) || isset($_POST["b3"])) { echo "<table>";
    foreach ($v as $c) { echo "<th>Fruta Del Diablo (Tipo";
        if ($c["tipofruta"]=="Zoan") { echo ", Subtipo y Forma/s) y Limitación</th>"; } else { echo " y Subtipo) y Limitación</th>"; }
        echo "<th>Usuario/s</th><th>Relaciones Con Frutas</th></tr><tr><td bgcolor='orange'>".$c["tipofruta"]." ";
        if ($c["subtipofruta"]!="Normal"){ echo $c["subtipofruta"]; }
        if ($c["canon"]!="Si"){echo " (No Canon)"; } echo "<br><br>Fruta " . $c["noriginal"] . " (" . $c["nfruta"] . ")";
        if ($c["modelo"] != "Sin Modelo" || $c["nfruta"] == "Picor") { echo " Modelo " . $c["modelo"]; }
        echo "<br><br>Debildidades: Inmersión En Agua, Haki";
        if ($c["limitacion"] != "Ninguna"){ echo ", Piedra Marina y " . $c["limitacion"]; } else { echo " y Piedra Marina"; }
        echo "<br><br><Img src='imgfrutasformas/" . $c["imgfruta"] . ".png' width='350px' height='350px'><td bgcolor='yellow'>";
        if ($c["usuario"] == "Desconocido") {
            echo "Usuario Anterior: " . $c["usuarioanterior"] . "<br><br><Img src='imgpersonajes/" . $c["imgusuarioanterior"];
        } else { if ($c["usuarioanterior"] != "No") {
                echo $c["usuario"] . "<br><br><Img src='imgpersonajes/" . $c["imgusuario"] .
                    ".png' width='350px' height='350px'><br><br>Usuario Anterior: " . $c["usuarioanterior"] .
                    "<br><br><Img src='imgpersonajes/" . $c["imgusuarioanterior"];
            } else { echo $c["usuario"] . "<br><br><Img src='imgpersonajes/" . $c["imgusuario"]; }
        } echo ".png' width='350px' height='350px'></td><td bgcolor='lightgreen'>
            <div id='cc' class='carousel slide' data-ride='carousel'><div class='carousel-inner'><div class='carousel-item active'>";
        if ($c["subtl1"] != "No") {
            if ($c["subtl1"] == "Anula") { echo "Se Anula Con"; } if ($c["subtl1"] == "Similar") { echo "Es Similar a"; }
            if ($c["subtl1"] != "Anula" && $c["subtl1"] != "Similar") { echo " Es " . $c["subtl1"]; }
            echo " La Fruta " . $c["noriginalfl1"] . " (" . $c["nfrutal1"] . ") Tipo " . $c["tfl1"];
            if ($c["subtipofl"] != "No") { echo " (".$c["subtipofl"].")"; } else { echo ""; }
            if ($c["modl"] != "No") { echo " Modelo " . $c["modl"]; } else { echo ""; }
            echo "<br><br><Img src='imgfrutasformas/" . $c["imgfl1"] . ".png' width='350px' height='350px'></div>";
        } else { echo "<img src='imgfrutasformas/FrutasDiablo.png' width='400px' height='400px'></div>"; }
        for ($p = 2; $p < 8; $p++) {
            if ($c["subtl$p"] != "No") { echo "<div class='carousel-item'>";
                if ($c["subtl$p"] == "Anula"){ echo "Se Anula Con"; } if ($c["subtl$p"] == "Similar"){ echo "Es Similar a"; }
                if ($c["subtl$p"] != "Anula" && $c["subtl$p"] != "Similar") { echo " Es " . $c["subtl$p"]; }
                echo " La Fruta " . $c["noriginalfl$p"] . " (" . $c["nfrutal$p"] . ") Tipo " . $c["tfl$p"] .
                    "<br><br><Img src='imgfrutasformas/" . $c["imgfl$p"] .".png' width='350px' height='350px'></div>";
            }
        } echo "</div><a class='carousel-control-prev' href='#cc' data-slide='prev'></a>
            <a class='carousel-control-next' href='#cc' data-slide='next'></a></div></td></tr>";
    } echo "</table>";
} ?> </body>

</html>