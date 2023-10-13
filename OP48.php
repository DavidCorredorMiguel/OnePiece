<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Manga/Anime One Piece</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
</head>

<body> <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 100;
$res->prepare("select count(*) as 'total' from mangaanime"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from mangaanime LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($idcap, $npag, $pa, $ep1, $pag1, $ep2, $pag2, $ep3, $pag3, $ep4, $pag4, $ep5, $pag5, $ep6, $pag6, $opening, $oppag,
$epov1, $epag1, $epov2, $epag2, $nombrecapitulo, $tipoportada, $c, $minihistoria, $nombreportada, $arco, $saga);
echo "<table><tr><th>Capitulo</th><th>Episodio/s</th><th>Opening, Especial/es, Peli y Videojuego</th><th>Arco y Saga</th></tr>";
while ($res->fetch()) { echo "<tr><td>Capítulo " . $idcap . ": " . $nombrecapitulo . "<br><br>" . $tipoportada;
    if ($minihistoria != "Ninguna") { echo "<br><br>" . $minihistoria; } if ($nombreportada != "Ninguna") { echo ": " . $nombreportada; }
    echo "<br><br> " . $npag . " Paginas<br><Img src='imgcapitulos/Capitulo ".$idcap; if ($c == "C") { echo "C"; }
    echo ".png' width='350px'></td><td id='ng'><div id='cc' class='carousel slide' data-ride='carousel'><div class='carousel-inner'>
        <div class='carousel-item active'>Episodio " . $ep1 . " (Pagina/s " . $pag1 . ")<br><br><Img src='imgepisodios/Episodio " .
        $ep1 . ".png' width='350px'></div>";
    if ($ep2 != "No") {echo "<div class='carousel-item'>Episodio " . $ep2. " (Pagina/s ".$pag2;
        echo ")<br><br><Img src='imgepisodios/Episodio " . $ep2 . ".png' width='350px'></div>";
    } if ($ep3 != "No") {echo "<div class='carousel-item'>Episodio " . $ep3. " (Pagina/s ".$pag3;
        echo ")<br><br><Img src='imgepisodios/Episodio " . $ep3 . ".png' width='350px'></div>";
    } if ($ep4 != "No") {echo "<div class='carousel-item'>Episodio " . $ep4. " (Pagina/s ".$pag4;
        echo ")<br><br><Img src='imgepisodios/Episodio " . $ep4 . ".png' width='350px'></div>";
    } if ($ep5 != "No") {echo "<div class='carousel-item'>Episodio " . $ep5. " (Pagina/s ".$pag5;
        echo ")<br><br><Img src='imgepisodios/Episodio " . $ep5 . ".png' width='350px'></div>";
    } if ($ep6 != "No") {echo "<div class='carousel-item'>Episodio " . $ep6. " (Pagina/s ".$pag6;
        echo ")<br><br><Img src='imgepisodios/Episodio " . $ep6 . ".png' width='350px'></div>";
    } echo "</div><a class='carousel-control-prev' href='#cc' data-slide='prev'></a>
        <a class='carousel-control-next' href='#cc' data-slide='next'></a></div></td>
        <td bgcolor='lightgreen'><div id='cc2' class='carousel slide' data-ride='carousel'>
        <div class='carousel-inner'><div class='carousel-item active'>
        <img src='imgfrutasformas/FrutasDiablo.png' width='350px' height='350px'></div>";
    if ($opening != "No") { echo "<div class='carousel-item'>Opening " . $opening . " (Pagina/s " . $oppag;
        echo ")<br><br><Img src='imgvoljuegospeli/Opening " . $opening . ".png' width='350px'></div>";
    } if ($epov1 != "No") { echo "<div class='carousel-item'>" . $epov1. " (Pagina/s ".$epag1;
        echo ")<br><br><Img src='imgvoljuegospeli/" . $epov1 . ".png' width='350px'></div>";
    } if ($epov2 != "No") { echo "<div class='carousel-item'>" . $epov2. " (Pagina/s ".$epag2;
        echo ")<br><br><Img src='imgvoljuegospeli/" . $epov2 . ".png' width='350px'></div>";
    } echo "</div><a class='carousel-control-prev' href='#cc2' data-slide='prev'></a>
        <a class='carousel-control-next' href='#cc2' data-slide='next'></a></div></td><td bgcolor='orange'>Arco " .$arco .
        "<br><br><Img src='imgvoljuegospeli/Arco " . $arco . ".png' width='350px'><br><br>Saga " . $saga .
        "<br><br><Img src='imgvoljuegospeli/Saga " . $saga . ".png' width='350px'></td></tr>";
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP48.php?pag=" . ($pag - 1) . "'><</a> <a href='OP48.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP48.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP48.php?pag=$numpag'>$numpag</a> <a href='OP48.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close(); ?> </body>

</html>