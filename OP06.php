<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Haki</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 20;
$res->prepare("select count(*) as 'total' from haki"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from haki LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($idhaki, $idtiposdehaki, $tiposdehaki, $tipousuario, $nivel, $nombreoriginaltecnica, $nombretecnica,
$imagentecnica, $usuariohaki, $imagenusuariohaki); echo "<table><tr><th>Tipo Haki y Técnica</th><th>Usuario Haki y Nivel</th></tr>";
while ($res->fetch()) {
    echo "<tr><td bgcolor='orange'>" . $tiposdehaki . "<br><br>" . $nombreoriginaltecnica . " (" . $nombretecnica .
        ")<br><br><Img src='imghakiytecnicas/" . $imagentecnica . ".png' width='650px' height='650px'></td><td bgcolor='lightblue'>" .
        $usuariohaki . " (" . $tipousuario . ")<br><br>Nivel " . $nivel . "<br><br><Img src='imgpersonajes/" . $imagenusuariohaki .
        ".png' width='650px' height='650px'></td></tr>";
}
echo "</table><br><br><div style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP06.php?pag=" . ($pag - 1) . "'><</a> <a href='OP06.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP06.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP06.php?pag=$numpag'>$numpag</a> <a href='OP06.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close();
?>
</body>

</html>
