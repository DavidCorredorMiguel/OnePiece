<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Organizaciones De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 25;
$res->prepare("select count(*) as 'total' from organizaciones"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from organizaciones LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($idgrupo, $tiposdegrupos, $canon, $estado, $tipomiembro, $muerte, $titulogrupo, $miembrogrupo, $imgmiembro,
$grupo, $imggrupo, $miembros, $anteriorgrupo, $imganteriorgrupo, $barco, $imgbarco);
echo "<table><tr><th>Titulo, Tipo y Miembro Organización</th><th>Organizaciones</th><th>Barco</th></tr>";
while ($res->fetch()) { echo "<tr><td bgcolor='orange'>" . $tipomiembro . " Del Grupo " . $tiposdegrupos;
    if ($canon!="Si") { echo " (No Canon)"; } echo ": " . $miembrogrupo; if ($muerte!="No"){echo " (Fallecido/a)"; }
    echo "<br><span style='color: blue'>Ocupacion: </span>" . $titulogrupo . "<br><br><Img src='imgpersonajes/" .
        $imgmiembro . ".png' width='475px' height='475px'></td><td bgcolor='lightgreen'>" . $grupo .
        "<br><span style='color: blue'>Estado: </span>" . $estado . "<br><span style='color: blue'>Nº Miembros: </span>" . $miembros .
        "<br><br><Img src='imgrecygrupos/" . $imggrupo . ".png' width='475px' height='475px'><br><br>";
    if ($grupo != $anteriorgrupo) {
        echo $anteriorgrupo . "<br><br><Img src='imgrecygrupos/" . $imganteriorgrupo . ".png' width='475px' height='475px'>";
    }
    echo"</td><td bgcolor='lightgreen'>".$barco."<br><br><Img src='imgrecygrupos/".$imgbarco.
        ".png' width='475px' height='475px'></td></tr>";
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP15.php?pag=" . ($pag - 1) . "'><</a> <a href='OP15.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP15.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP15.php?pag=$numpag'>$numpag</a> <a href='OP15.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close();
?>
</body>

</html>