<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Peliculas De One Piece</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
</head>

<body> <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 100;
$res->prepare("select count(*) as 'total' from peliculas"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from peliculas LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($id, $sp, $nombre, $director, $escritor, $min, $fechaorig, $fecha, $isla1, $isla2, $isla3, $personajes);
echo "<table><tr><th>Pelicula</th><th>Director/a y Guionista</th><th>Isla/s</th><th>Personajes De La Peli</th></tr>";
while ($res->fetch()) {
    echo "<tr><td>" . $nombre . "<br><br><img src='imgvoljuegospeli/Peli " . $nombre . ".png' width='400px' height='400px'></td>
        <td bgcolor='lightgreen'>Director/a: " . $director . "<br><br>Guionista: " . $escritor . "<br><br>Duracion: " . $min .
        " minutos<br><br>Estreno: " . $fechaorig;
    if($fecha != "No") { echo "<br><br>Estreno (En España): " . $fecha; } echo "</td><td bgcolor='lightgreen'>";
    if($isla1 != "No") {
        echo $isla1 . "<br><br><img src='imglugares/" . $isla1 . ".png' width='400px' height='400px'>";
        if($nombre == "Z") {
            echo "<br>" . $isla2 . "<br><br><img src='imglugares/" . $isla2 . ".png' width='400px' height='400px'><br>" . $isla3 .
                "<br><br><img src='imglugares/" . $isla3 . ".png' width='400px' height='400px'>";
        }
    } else { echo "<img src='imglugares/Logo One Piece.png' width='400px' height='400px'>"; }
    echo "</td><td bgcolor='lightgreen'><div id='cc' class='carousel slide' data-ride='carousel'>
        <div class='carousel-inner'><div class='carousel-item active'>" . $personajes .
        "<br><br><img src='imgpersonajes/" . $personajes . ".png' width='400px' height='400px'></div>";
    if ($sp >= "4") {
        echo "<div class='carousel-item'>Monkey D. Luffy<br><br>
        <Img src='imgpersonajes/Monkey D. Luffy.png' width='400px' height='400px'></div>
        <div class='carousel-item'>Roronoa Zoro<br><br>
        <Img src='imgpersonajes/Roronoa Zoro.png' width='400px' height='400px'></div>
        <div class='carousel-item'>Nami<br><br>
        <Img src='imgpersonajes/Nami.png' width='400px' height='400px'></div>
        <div class='carousel-item'>Usopp<br><br>
        <Img src='imgpersonajes/Usopp.png' width='400px' height='400px'></div>";
        if ($sp >= 5) {
            echo "<div class='carousel-item'>Sanji<br><br><Img src='imgpersonajes/Sanji.png' width='400px' height='400px'></div>";
            if ($sp >= 6) {
                echo "<div class='carousel-item'>Tony Tony Chopper<br><br>
                <Img src='imgpersonajes/Tony Tony Chopper.png' width='400px' height='400px'></div>";
                if ($sp >= 7) {
                    echo "<div class='carousel-item'>Nico Robin<br><br>
                    <Img src='imgpersonajes/Nico Robin.png' width='400px' height='400px'></div>";
                    if ($sp >= 8) {
                        echo "<div class='carousel-item'>Franky<br><br>
                        <Img src='imgpersonajes/Franky.png' width='400px' height='400px'></div>";
                        if ($sp >= 9) {
                            echo "<div class='carousel-item'>Brook<br><br>
                            <Img src='imgpersonajes/Brook.png' width='400px' height='400px'></div>";
                            if ($sp >= 10) {
                                echo "<div class='carousel-item'>Jinbe<br><br>
                                <Img src='imgpersonajes/Jinbe.png' width='400px' height='400px'></div>";
                            }
                        }
                    }
                }
            }
        }
    }
    echo "</div><a class='carousel-control-prev' href='#cc' data-slide='prev'></a>
        <a class='carousel-control-next' href='#cc' data-slide='next'></a></div></td>";
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP39.php?pag=" . ($pag - 1) . "'><</a> <a href='OP39.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP39.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP39.php?pag=$numpag'>$numpag</a> <a href='OP39.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close(); ?> </body>

</html>