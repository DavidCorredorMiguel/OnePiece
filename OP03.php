<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Frutas Del Diablo</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 20;
$res->prepare("select count(*) as 'total' from frutasdiablo"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from frutasdiablo LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($id, $idtf, $tipofruta, $subtipofruta, $canon, $noriginal, $nfruta, $modelo, $imgfruta, $mostrada,
$usofruta, $nivel, $fanimal, $fhibrida, $noriginaltecnica, $tecnica, $imgtecnica, $usuario, $imgusuario,
$usuarioanterior, $imgusuarioanterior); echo "<table><tr>";
while ($res->fetch()) {
    if ($tipofruta == "Zoan") { echo "<th colspan='2'>Fruta Del Diablo (Tipo, Subtipo, Uso y Forma/s)</th>"; }
    else { echo "<th>Fruta Del Diablo (Tipo, Subtipo y Uso)</th>"; }
    echo "<th>Técnica</th><th>Usuario/s y Nivel</th></tr><tr><td bgcolor='orange'>" . $tipofruta;
    if ($subtipofruta != "Normal") { echo $subtipofruta; } if ($canon != "Si") { echo " (No Canon)"; }
    echo "<br><br>Fruta ".$noriginal." (".$nfruta.")"; if ($modelo != "Sin Modelo" || $nfruta == "Picor") { echo " Modelo " . $modelo; }
    echo "<br><br>Uso De La Fruta: " . $usofruta . "<br><br><Img src='imgfrutasformas/" .$imgfruta.".png' width='350px' height='350px'>";
    if ($tipofruta == "Zoan") { echo "</td><td bgcolor='orange'>Forma ";
        if ($fanimal != "No" && $fhibrida != "No") {
            echo "Animal<br><br><Img src='imgfrutasformas/" . $fanimal ." Animal.png' width='350px' height='350px'><br><br>
                Hibrida<br><br><Img src='imgfrutasformas/" . $fhibrida . " Hibrida.png' width='350px' height='350px'>";
        } else {
            if ($fanimal!="No"){
                echo "Animal<br><br><Img src='imgfrutasformas/".$fanimal." Animal.png' width='350px' height='350px'><br><br>";
            } if ($fhibrida!="No") {
                echo "Hibrida<br><br><Img src='imgfrutasformas/".$fhibrida." Hibrida.png' width='350px' height='350px'>";
            }
        }
    } echo"</td><td bgcolor='lightgreen'>"; if ($tecnica != "No") { echo $noriginaltecnica." (".$tecnica.")"; }
    echo "<br><br><Img src='imghakiytecnicas/".$imgtecnica.".png' width='350px' height='350px'></td><td bgcolor='yellow'>";
    if ($usuario == "Desconocido") {
        echo "Usuario Anterior: " . $usuarioanterior . " (Nivel " . $nivel . ")<br><br><Img src='imgpersonajes/" . $imgusuarioanterior;
    } else {
        if ($usuarioanterior != "No") {
            echo $usuario . " (Nivel " . $nivel . ")<br><br><Img src='imgpersonajes/" . $imgusuario .
                ".png' width='350px' height='350px'><br><br>Usuario Anterior: " . $usuarioanterior ."<br><br><Img src='imgpersonajes/" .
                $imgusuarioanterior;
        } else { echo $usuario . " (Nivel " . $nivel . ")<br><br><Img src='imgpersonajes/" . $imgusuario; }
    } echo ".png' width='350px' height='350px'></td></tr>";
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP03.php?pag=" . ($pag - 1) . "'><</a> <a href='OP03.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP03.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP03.php?pag=$numpag'>$numpag</a> <a href='OP03.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close(); ?>
</body>

</html>
