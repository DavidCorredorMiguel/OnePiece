<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Razas De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 25;
$res->prepare("select count(*) as 'total' from razas"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from razas LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($id, $tiporaza, $subtiporaza, $miembroraza, $imagenmiembroraza, $nombreraza, $imagenraza, $marorigen,
$nombrelugarorigen, $imagenlugarorigen);
echo "<table><tr><th>Miembro De La Raza (Tipo y Subtipo)</th><th>Raza</th><th>Lugar De Origen</th></tr>";
while ($res->fetch()) {
    echo "<tr><td bgcolor='orange'>" . $tiporaza . " (" . $subtiporaza . "): " . $miembroraza .
        "<br><br><Img src='imgespecieyraza/" . $imagenmiembroraza . "' width='475px' height='475px'></td>
        <td bgcolor='lightgreen'>" . $nombreraza . "<br><br><Img src='imgespecieyraza/" . $imagenraza .
        "' width='475px' height='475px'></td><td bgcolor='lightgreen'>" . $nombrelugarorigen . " (" . $marorigen .
        ")<br><br><Img src='imglugares/" . $imagenlugarorigen . "' width='475px' height='475px'></td></tr>";
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP27.php?pag=" . ($pag - 1) . "'><</a> <a href='OP27.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP27.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP27.php?pag=$numpag'>$numpag</a> <a href='OP27.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close(); ?>
</body>

</html>
