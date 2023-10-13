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

<body> <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 50;
$res->prepare("select count(*) as 'total' from limiterelacion"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from limiterelacion LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($idl, $limitacion, $subtl1, $tfl1, $subtipofl, $noriginalfl1, $nfrutal1, $modl, $imgfl1, $subtl2, $tfl2,
$noriginalfl2, $nfrutal2, $imgfl2, $subtl3, $tfl3, $noriginalfl3, $nfrutal3, $imgfl3, $subtl4, $tfl4, $noriginalfl4, $nfrutal4, $imgfl4,
$subtl5, $tfl5, $noriginalfl5, $nfrutal5, $imgfl5, $subtl6, $tfl6, $noriginalfl6, $nfrutal6, $imgfl6, $subtl7, $tfl7, $noriginalfl7,
$nfrutal7, $imgfl7, $tipofruta, $subtipofruta, $canon, $noriginal, $nfruta, $modelo, $imgfruta, $mostrada, $usuario,
$imgusuario, $usuarioanterior, $imgusuarioanterior); echo "<table>";
while ($res->fetch()) { echo "<th>Fruta Del Diablo (Tipo";
    if ($tipofruta=="Zoan") { echo ", Subtipo y Forma/s) y Limitación</th>"; } else { echo " y Subtipo) y Limitación</th>"; }
    echo "<th>Usuario/s</th><th>Relaciones Con Frutas</th></tr><tr><td bgcolor='orange'>" . $tipofruta;
    if ($subtipofruta != "Normal") { echo $subtipofruta; } if ($canon != "Si") { echo " (No Canon)"; }
    echo "<br><br>Fruta " . $noriginal . " (" . $nfruta . ")";
    if ($modelo!="Sin Modelo" || $nfruta == "Picor") { echo " Modelo " . $modelo; } echo "<br><br>Debildidades: Inmersión En Agua, Haki";
    if ($limitacion != "Ninguna"){ echo ", Piedra Marina y " . $limitacion; } else { echo " y Piedra Marina"; }
    echo "<br><br><Img src='imgfrutasformas/" . $imgfruta . ".png' width='350px' height='350px'><td bgcolor='yellow'>";
    if ($usuario=="Desconocido") { echo "Usuario Anterior: ".$usuarioanterior."<br><br><Img src='imgpersonajes/" . $imgusuarioanterior; }
    else { if ($usuarioanterior != "No") {
            echo $usuario . "<br><br><Img src='imgpersonajes/" . $imgusuario . ".png' width='350px' height='350px'><br><br>
                Usuario Anterior: " . $usuarioanterior ."<br><br><Img src='imgpersonajes/" . $imgusuarioanterior;
        } else { echo $usuario . "<br><br><Img src='imgpersonajes/" . $imgusuario; }
    } echo ".png' width='350px' height='350px'></td><td bgcolor='lightgreen'>
        <div id='cc' class='carousel slide' data-ride='carousel'><div class='carousel-inner'><div class='carousel-item active'>";
    if ($subtl1 != "No") {
        if ($subtl1 == "Anula") { echo "Se Anula Con"; } if ($subtl1 == "Similar") { echo "Es Similar a"; }
        if ($subtl1 != "Anula" && $subtl1 != "Similar") { echo " Es " . $subtl1; }
        echo " La Fruta " . $noriginalfl1 . " (" . $nfrutal1 . ") Tipo " . $tfl1;
        if ($subtipofl != "No") { echo " (".$subtipofl.")"; } else { echo ""; }
        if ($modl != "No") { echo " Modelo " . $modl; } else { echo ""; }
        echo "<br><br><Img src='imgfrutasformas/" . $imgfl1 . ".png' width='350px' height='350px'></div>";
    } else { echo "<img src='imgfrutasformas/FrutasDiablo.png' width='400px' height='400px'></div>"; }
    if ($subtl2 != "No") { echo "<div class='carousel-item'>";
        if ($subtl2 == "Anula"){ echo "Se Anula Con"; } if ($subtl2 == "Similar"){ echo "Es Similar a"; }
        if ($subtl2 != "Anula" && $subtl2 != "Similar") { echo " Es " . $subtl2; }
        echo " La Fruta " . $noriginalfl2 . " (" . $nfrutal2 . ") Tipo " . $tfl2 . "<br><br><Img src='imgfrutasformas/" . $imgfl2 .
            ".png' width='350px' height='350px'></div>";
    } if ($subtl3 != "No") { echo "<div class='carousel-item'>";
        if ($subtl3 == "Anula"){ echo "Se Anula Con"; } if ($subtl3 == "Similar"){ echo "Es Similar a"; }
        if ($subtl3 != "Anula" && $subtl3 != "Similar") { echo " Es " . $subtl3; }
        echo " La Fruta " . $noriginalfl3 . " (" . $nfrutal3 . ") Tipo " . $tfl3 . "<br><br><Img src='imgfrutasformas/" . $imgfl3 .
            ".png' width='350px' height='350px'></div>";
    } if ($subtl4 != "No") { echo "<div class='carousel-item'>";
        if ($subtl4 == "Anula"){ echo "Se Anula Con"; } if ($subtl4 == "Similar"){ echo "Es Similar a"; }
        if ($subtl4 != "Anula" && $subtl4 != "Similar") { echo " Es " . $subtl4; }
        echo " La Fruta " . $noriginalfl4 . " (" . $nfrutal4 . ") Tipo " . $tfl4 . "<br><br><Img src='imgfrutasformas/" . $imgfl4 .
            ".png' width='350px' height='350px'></div>";
    } if ($subtl5 != "No") { echo "<div class='carousel-item'>";
        if ($subtl5 == "Anula"){ echo "Se Anula Con"; } if ($subtl5 == "Similar"){ echo "Es Similar a"; }
        if ($subtl5 != "Anula" && $subtl5 != "Similar") { echo " Es " . $subtl5; }
        echo " La Fruta " . $noriginalfl5 . " (" . $nfrutal5 . ") Tipo " . $tfl5 . "<br><br><Img src='imgfrutasformas/" . $imgfl5 .
            ".png' width='350px' height='350px'></div>";
    } if ($subtl6 != "No") { echo "<div class='carousel-item'>";
        if ($subtl6 == "Anula"){ echo "Se Anula Con"; } if ($subtl6 == "Similar"){ echo "Es Similar a"; }
        if ($subtl6 != "Anula" && $subtl6 != "Similar") { echo " Es " . $subtl6; }
        echo " La Fruta " . $noriginalfl6 . " (" . $nfrutal6 . ") Tipo " . $tfl6 . "<br><br><Img src='imgfrutasformas/" . $imgfl6 .
            ".png' width='350px' height='350px'></div>";
    } if ($subtl7 != "No") { echo "<div class='carousel-item'>";
        if ($subtl7 == "Anula"){ echo "Se Anula Con"; } if ($subtl7 == "Similar"){ echo "Es Similar a"; }
        if ($subtl7 != "Anula" && $subtl7 != "Similar") { echo " Es " . $subtl7; }
        echo " La Fruta " . $noriginalfl7 . " (" . $nfrutal7 . ") Tipo " . $tfl7 . "<br><br><Img src='imgfrutasformas/" . $imgfl7 .
            ".png' width='350px' height='350px'></div>";
    } echo "</div><a class='carousel-control-prev' href='#cc' data-slide='prev'></a>
        <a class='carousel-control-next' href='#cc' data-slide='next'></a></div></td></tr>";
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP45.php?pag=" . ($pag - 1) . "'><</a> <a href='OP45.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP45.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP45.php?pag=$numpag'>$numpag</a> <a href='OP45.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close(); ?> </body>

</html>