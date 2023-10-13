<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Recompensas</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 20;
$res->prepare("select count(*) as 'total' from recompensas"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from recompensas LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($idrecompensa, $tiporec, $subtiporec, $num, $recompensa, $imagenrecompensa, $muerte, $usuariorecompensa,
$imgusuariorecompensa, $nombrebanda, $imagenbanda); echo "<table><tr><th>Recompensa</th><th>Personaje</th><th>Nombre Banda</th></tr>";
while ($res->fetch()) {
    echo "<tr><td bgcolor='orange'>Recompensa " . $tiporec . " (" . $subtiporec . ")<br><br>" . $num . "ª Cifra: " .
        $recompensa . " <Img src='imgrecygrupos/Berry.gif'><br><br><Img src='imgrecygrupos/Recompensa " . $imagenrecompensa .
        ".png' width='475px' height='475px'></td><td bgcolor='yellow'>" . $usuariorecompensa; if ($muerte!="No"){echo " (Fallecido/a)"; }
    echo "<br><br><Img src='imgpersonajes/" . $imgusuariorecompensa . ".png' width='475px' height='475px'></td><td bgcolor='yellow'>" .
        $nombrebanda . "<br><br><Img src='imgrecygrupos/" . $imagenbanda . ".png' width='475px' height='475px'></td></tr>";
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP12.php?pag=" . ($pag - 1) . "'><</a> <a href='OP12.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP12.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP12.php?pag=$numpag'>$numpag</a> <a href='OP12.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close(); ?>
</body>

</html>