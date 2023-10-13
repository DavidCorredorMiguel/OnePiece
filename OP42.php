<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>OP Apariciones</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body> <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 50;
$res->prepare("select count(*) as 'total' from apariciones"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from apariciones LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($ida, $subtipoap, $c, $ap1, $ap2, $tmn, $cm, $mn1, $mn2, $tapf, $cf, $apf1, $apf2, $tipofruta, $subtipofruta, $canon,
$noriginal, $nfruta, $modelo, $imagen, $usofruta, $usuario, $imgusuario, $usuarioanterior, $imgusuarioanterior); echo "<table><tr>";
while ($res->fetch()) {
    echo "<tr><th bgcolor='red'>Fruta Del Diablo (Tipo y Subtipo)</th><th bgcolor='red'>Aparición Habilidad (" . $subtipoap .
        ")</th><th bgcolor='red'>Mención Nombre Fruta</th></th><th bgcolor='red'>Imagen Fruto</th><th bgcolor='red'>Usuario/s</th>
        </tr><tr><td bgcolor='orange'>".$tipofruta." ";
    if ($subtipofruta!="Normal"){ echo $subtipofruta; }if ($canon!="Si"){echo " (No Canon)"; }
    echo "<br><br>Fruta " . $noriginal . " (" . $nfruta . ")";
    if ($modelo != "Sin Modelo" || $nfruta=="Picor") { echo " Modelo " . $modelo; }
    echo "<br><br>Permite Al Usuario " . $usofruta . "<br><br><Img src='imgfrutasformas/" . $imagen .
        ".png' width='275px' height='275px'></td><td>1ª Aparición: " . $ap1;
    if ($subtipoap=="Anime/Manga" || $subtipoap=="Manga") {
        if ($c=="C") { echo "<br><br><Img src='imgcapitulos/" . $ap1 . "C.png' width='275px' height='275px'>"; }
        else { echo "<br><br><Img src='imgcapitulos/" . $ap1 . ".png' width='275px' height='275px'>"; }
    } if($subtipoap=="Anime"){ echo "<br><br><Img src='imgepisodios/" . $ap1 . ".png' width='275px' height='275px'>"; }
    if ($subtipoap=="Evento" || $subtipoap=="Especial" || $subtipoap=="Videojuego" || $subtipoap=="Otro") {
        echo "<br><br><Img src='imgvoljuegospeli/" . $ap1 . ".png' width='275px' height='275px'>";
    } if ($subtipoap=="Pelicula") {
        echo "<br><br><Img src='imgvoljuegospeli/Peli " . $ap1 . ".png' width='275px' height='275px'>";
    } if ($subtipoap=="SBS") { echo "<br><br><Img src='imgfrutasformas/FrutasDiablo.png' width='275px' height='275px'>"; }
    if($ap2 != "No") {
        if($ap2 != "One Piece Estampida") {
            echo "<br><br>2ª Aparición: " . $ap2 . "<br><br><Img src='imgepisodios/" . $ap2 .
                ".png' width='275px' height='275px'>";
        } else {
            echo "<br><br>2ª Aparición: " . $ap2 .
                "<br><br><Img src='imgvoljuegospeli/Peli One Piece Estampida.png' width='275px' height='275px'>";
        }
    } echo "</td><td>";
    if($mn1 != "No") { echo "1ª Mención Nombre: " . $mn1;
        if ($tmn=="Anime/Manga" || $tmn=="Manga") {
            if ($cm=="C"){echo "<br><br><Img src='imgcapitulos/" . $mn1 . "C.png' width='275px' height='275px'>";}
            else { echo "<br><br><Img src='imgcapitulos/" . $mn1 . ".png' width='275px' height='275px'>"; }
            } if($tmn=="Anime"){ echo "<br><br><Img src='imgepisodios/" . $ap1 . ".png' width='275px' height='275px'>"; }
            if ($tmn=="Magazine" ||$tmn=="Videojuego"||$tmn=="Especial" || $tmn=="Evento" || $tmn=="Otro") {
            echo "<br><br><Img src='imgvoljuegospeli/" . $mn1 . ".png' width='275px' height='275px'>";
        } if ($tmn=="Pelicula") {
            echo "<br><br><Img src='imgvoljuegospeli/Peli ".$mn1.".png' width='275px' height='275px'>"; }
        if ($tmn=="SBS") { echo "<br><br><Img src='imgfrutasformas/FrutasDiablo.png' width='275px' height='275px'>"; }
    } else { echo "<br><br><Img src='imgfrutasformas/FrutasDiablo.png' width='275px' height='275px'>"; }
    if($mn2 != "No") {
        if($mn2 != "No") { echo "2ª Mención Nombre: " . $mn2;
            if($mn2 != "One Piece Estampida") {
                echo "<br><br><Img src='imgepisodios/" . $mn2 . ".png' width='275px' height='275px'>";
            } else {
                echo "<br><br><Img src='imgvoljuegospeli/Peli One Piece Estampida.png' width='275px' height='275px'>";
            }
        }
    } echo "</td><td>"; if($apf1 != "No") { echo "1ª Imagen Fruto: " . $apf1;
        if ($tapf=="Anime/Manga") {
            if ($cf=="C"){echo "<br><br><Img src='imgcapitulos/" . $apf1 . "C.png' width='275px' height='275px'>";}
            else { echo "<br><br><Img src='imgcapitulos/" . $apf1 . ".png' width='275px' height='275px'>"; }
        } if ($tapf=="Magazine"||$tapf=="Videojuego"||$tapf=="Especial" || $tapf=="Evento" || $tapf=="Otro") {
            echo "<br><br><Img src='imgvoljuegospeli/" . $apf1 . ".png' width='275px' height='275px'>";
        }if ($tapf=="Pelicula"){
            echo "<br><br><Img src='imgvoljuegospeli/Peli ".$apf1.".png' width='275px' height='275px'>"; }
        if ($tapf=="SBS") { echo "<br><br><Img src='imgfrutasformas/FrutasDiablo.png' width='275px' height='275px'>"; }
    } else { echo "<Img src='imgfrutasformas/FrutasDiablo.png' width='275px' height='275px'>"; }
    if($apf2 != "No"){ echo "<br><br>2ª Imagen Fruto: " . $apf2;
        if ($tapf== "Anime/Manga") { echo "<br><br><Img src='imgepisodios/".$apf2 .".png' width='275px' height='275px'>"; }
    } echo "</td><td bgcolor='yellow'>";
    if ($usuario=="Desconocido") {
        echo "Usuario Anterior: " . $usuarioanterior . "<br><br><Img src='imgpersonajes/" . $imgusuarioanterior;
    } else { if ($usuarioanterior != "No") {
            echo $usuario . "<br><br><Img src='imgpersonajes/" . $imgusuario .
                ".png' width='275px' height='275px'><br><br>Usuario Anterior: " . $usuarioanterior .
                "<br><br><Img src='imgpersonajes/" . $imgusuarioanterior;
        } else { echo $usuario . "<br><br><Img src='imgpersonajes/" . $imgusuario; }
    } echo ".png' width='275px' height='275px'></td></tr>";
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP42.php?pag=" . ($pag - 1) . "'><</a> <a href='OP42.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP42.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP42.php?pag=$numpag'>$numpag</a> <a href='OP42.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close(); ?>
</body>

</html>
