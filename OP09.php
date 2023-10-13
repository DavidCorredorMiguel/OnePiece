<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lugares De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 20;
$res->prepare("select count(*) as 'total' from geografia"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from geografia LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($id, $idtipolugar, $mar, $nombreregion, $tipolugar, $subtipolugar, $climas, $nombrelugar, $imagenlugar);
echo "<table><tr><th>Region y Mar</th><th>Tipo, Subtipo y Clima De Lugar</th><th>Lugar</th></tr>";
while ($res->fetch()) {
    echo "<tr><td bgcolor='orange'>" . $nombreregion . " (" . $mar . ")<br><br><Img src='imglugares/" . $mar .
        ".png' width='600px' height='600px'></td><td bgcolor='lightblue'>" . $tipolugar . " (" . $subtipolugar .
        ")<br><br>Clima " . $climas . "</td><td bgcolor='yellow'>" . $nombrelugar . "<br><br><Img src='imglugares/" .
        $imagenlugar . "' width='600px' height='600px'></td>";
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP09.php?pag=" . ($pag - 1) . "'><</a> <a href='OP09.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP09.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP09.php?pag=$numpag'>$numpag</a> <a href='OP09.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close(); ?>
</body>

</html>
