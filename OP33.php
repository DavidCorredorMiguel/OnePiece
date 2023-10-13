<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Episodios De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 100;
$res->prepare("select count(*) as 'total' from episodios"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from episodios LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($idep, $sagaprincipal, $temp, $forigep, $nombreepisodio, $cep, $carc, $arco, $saga, $opening, $ending, $imagenending);
echo "<table><tr><th>Saga Principal y Episodio</th><th>Opening y/o Ending</th><th>Arco y Saga</th></tr>";
while ($res->fetch()) { echo "<tr><td id='ng'>Mar ";
    if ($idep<=516){echo "De La Supervivencia: Saga De Los Supernovas"; } else{echo "Final: Saga Del Nuevo Mundo"; }
    echo "<br><br>".$temp ."ª Temporada: Episodio ".$idep; if ($cep =="No") { echo " (No Canon)"; }
    echo "<br><br>" . $nombreepisodio . "<br><br>Estreno: ".$forigep."<br><br><Img src='imgepisodios/Episodio " . $idep .
        ".png' width='400px'></td><td bgcolor='orange'>Opening ".$opening."<br><br><Img src='imgvoljuegospeli/Opening " . $opening .
        ".png' width='400px'>";
    if ($ending != "Ninguno"){ echo "<br><br>Ending " .$ending."<br><br><Img src='imgvoljuegospeli/".$imagenending.".png' width='400px'>";}
    echo "</td><td bgcolor='orange'>Arco " . $arco; if ($carc == "No") { echo " (No Canon)"; }
    echo "<br><br><Img src='imgvoljuegospeli/Arco " . $arco . ".png' width='400px'><br><br>Saga " . $saga .
        "<br><br><Img src='imgvoljuegospeli/Saga " . $saga . ".png' width='400px'></td></tr>";
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP33.php?pag=" . ($pag - 1) . "'><</a> <a href='OP33.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP33.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP33.php?pag=$numpag'>$numpag</a> <a href='OP33.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close(); ?>
</body>

</html>
