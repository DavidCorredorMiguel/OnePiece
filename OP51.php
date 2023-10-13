<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>OP Estilos Combate</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body> <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 100;
$res->prepare("select count(*) as 'total' from tecnicas"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from tecnicas LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($id, $armaestiloc, $tipoestiloc, $subtipoestiloc1, $subtipoestiloc2, $tcanon, $uso, $noriginaltecnica, $tecnica,
$imgtecnica, $usuario, $imgusuario, $cfruta, $tipofruta, $subtipofruta, $noriginal, $nfruta, $modelo, $imgfruta, $mostrada);
echo "<table>"; while ($res->fetch()) { echo "<tr><th>Arma/Estilo Combate (Tipo y Subtipos)</th><th>Técnica";
    if ($tcanon!="Si") { echo " No Canon"; } echo "</th><th>Usuario/s</th>";
    if ($tipofruta !="No") { echo "<th>Fruta Del Diablo (Tipo y Subtipo)</th>"; } echo "</tr><tr><td>" . $tipoestiloc;
    if ($subtipoestiloc1 !="No") { echo ": " . $subtipoestiloc1; } if ($subtipoestiloc2 !="No") { echo " (" . $subtipoestiloc2 . ")"; }
    echo "<br><br>Basado En: ".$armaestiloc."<br><br>Uso: ".$uso . "</td><td bgcolor='lightgreen'>";
    if ($tecnica!="No") { echo $noriginaltecnica." (".$tecnica.")"; }
    echo "<br><br><Img src='imghakiytecnicas/" . $imgtecnica . ".png' width='400px' height='400px'></td>
        <td bgcolor='yellow'>" . $usuario . "<br><br><Img src='imgpersonajes/" . $imgusuario .".png' width='400px' height='400px'></td>";
    if ($tipofruta!="No"){ echo "<td bgcolor='orange'>".$tipofruta." "; if ($subtipofruta!="Normal"){ echo $subtipofruta; }
        if ($cfruta!="Si"){echo " (No Canon)"; } echo "<br><br>Fruta " . $noriginal." (".$nfruta . ")";
        if ($modelo != "Sin Modelo" || $nfruta == "Picor") { echo " Modelo " . $modelo; }
        echo "<br><br><Img src='imgfrutasformas/" . $imgfruta . ".png' width='400px' height='400px'></td>";
    } echo "</tr>";
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP51.php?pag=" . ($pag - 1) . "'><</a> <a href='OP51.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP51.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP51.php?pag=$numpag'>$numpag</a> <a href='OP51.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close(); ?>
</body>

</html>
