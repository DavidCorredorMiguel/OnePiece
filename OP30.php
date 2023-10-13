<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Capitulos De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body> <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 100;
$res->prepare("select count(*) as 'total' from capitulos"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from capitulos LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($idcap, $vol, $forigvol, $fvol, $vopag, $vpag, $fcap, $npag, $nombrevolumen, $nombrecapitulo, $tipoportada, $c, 
$minihistoria, $nombreportada, $arco, $saga);
echo "<table><tr><th>Saga Principal y Volumen</th><th>Capitulo</th><th>Arco y Saga</th></tr>";
while ($res->fetch()) { echo "<tr><td bgcolor='lightgreen'>Mar ";
    if ($idcap <= 597) { echo "De La Supervivencia: Saga De Los Supernovas"; } else { echo "Final: Saga Del Nuevo Mundo"; }
    echo "<br><br>Volumen " . $vol . ": " . $nombrevolumen . "<br><br>Lanzamiento: " . $forigvol . " (" . $vopag . " Paginas En Total)
        <br><br>Lanzamiento (En España): " . $fvol . " (" . $vpag . " Paginas En Total)<br><br><Img src='imgvoljuegospeli/Volumen " . 
        $vol . ".png' width='450px'></td><td>Capítulo " . $idcap . ": " . $nombrecapitulo . "<br><br>" . $tipoportada;
    if ($minihistoria != "Ninguna") { echo "<br><br>" . $minihistoria; } if ($nombreportada != "Ninguna") { echo ": " . $nombreportada; }
    echo "<br><br>Lanzamiento: " . $fcap." (" .$npag." Paginas)<br><Img src='imgcapitulos/Capitulo ".$idcap; if ($c == "C") { echo "C"; }
    echo ".png' width='450px'></td><td bgcolor='orange'>Arco ".$arco. "<br><br><Img src='imgvoljuegospeli/Arco " . $arco .
        ".png' width='450px'><br><br>Saga " . $saga . "<br><br><Img src='imgvoljuegospeli/Saga ".$saga .".png' width='450px'></td></tr>";
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP30.php?pag=" . ($pag - 1) . "'><</a> <a href='OP30.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP30.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP30.php?pag=$numpag'>$numpag</a> <a href='OP30.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close(); ?> </body>

</html>
