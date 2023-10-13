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

<body>
    <?php require_once "../ModelosEstilos/OPM13.php"; $m = new OPM13(); $v = array();
if (isset($_POST["peli"])) { $v = $m->getPeli(); } if (isset($_POST["personaje"])) { $v = $m->getPersonaje(); }
if (isset($_POST["isla"])) { $v = $m->getIsla(); } if (isset($_POST["sp"])) { $v = $m->getSp(); }
echo "<br><form action='OP37.php' method='post'><select name='peliv'>";
foreach ($m->sacaPeli() as $peli) { echo "<option value='$peli'>" . $peli . "</option>"; }
echo "</select><input type='submit' value='Buscar Pelicula' name='peli'><select name='personajesv'>";
foreach ($m->sacaPersonaje() as $personajes) { echo "<option value='$personajes'>" . $personajes . "</option>"; }
echo "</select><input type='submit' value='Buscar Personaje' name='personajes'><br><br><select name='islav'>";
foreach ($m->sacaIsla() as $isla) { echo "<option value='$isla'>" . $isla . "</option>"; }
echo "</select><input type='submit' value='Buscar Isla' name='isla'><select name='spv'>";
foreach ($m->sacaSp() as $sp) {
    if($sp == 4) { echo "<option value='$sp'>$sp (Luffy, Zoro, Nami y Usopp)</option>"; }
    if($sp == 5) { echo "<option value='$sp'>$sp (Luffy, Zoro, Nami, Usopp y Sanji)</option>"; }
    if($sp == 6) { echo "<option value='$sp'>$sp (Luffy, Zoro, Nami, Usopp, Sanji, Chopper)</option>"; }
    if($sp == 7) { echo "<option value='$sp'>$sp (Luffy, Zoro, Nami, Usopp, Sanji, Chopper y Robin)</option>"; }
    if($sp == 8) { echo "<option value='$sp'>$sp (Luffy, Zoro, Nami, Usopp, Sanji, Chopper, Robin y Franky)</option>"; }
    if($sp == 9) { echo "<option value='$sp'>$sp (Luffy, Zoro, Nami, Usopp, Sanji, Chopper, Robin, Franky y Brook)</option>"; }
    if($sp == 10) { echo "<option value='$sp'>$sp (Luffy, Zoro, Nami, Usopp, Sanji, Chopper, Robin, Franky, Brook y Jinbe)</option>"; }
} echo "</select><input type='submit' value='Buscar Num Sombrero Paja' name='sp'></form><br>";
if (isset($_POST["peli"]) || isset($_POST["personajes"]) || isset($_POST["isla"]) || isset($_POST["sp"])) {
    echo "<table><tr><th>Pelicula</th><th>Director/a y Guionista</th><th>Isla/s</th><th>Personajes De La Peli</th></tr>";
    foreach ($v as $c) {
        echo "<tr><td>" . $c["nombre"] . "<br><br><img src='imgvoljuegospeli/Peli " . $c["nombre"] .
            ".png' width='400px' height='400px'></td><td bgcolor='lightgreen'>Director/a: " . $c["director/a"] .
            "<br><br>Guionista: " . $c["escritor/a"] . "<br><br>Duracion: " . $c["min"] .
            " minutos<br><br>Estreno: " . $c["fechaorig"];
        if($c["fecha"] != "No") { echo "<br><br>Estreno (En España): " . $c["fecha"]; } echo "</td><td bgcolor='lightgreen'>";
        if($c["isla1"] != "No") {
            echo $c["isla1"] . "<br><br><img src='imglugares/" . $c["isla1"] . ".png' width='400px' height='400px'>";
            if($c["nombre"] == "Z") {
                echo "<br>" . $c["isla2"] . "<br><br><img src='imglugares/" . $c["isla2"] .
                ".png' width='400px' height='400px'><br>" . $c["isla3"] . "<br><br><img src='imglugares/" . $c["isla3"] .
                ".png' width='400px' height='400px'>";
            }
        } else { echo "<img src='imglugares/Logo One Piece.png' width='400px' height='400px'>"; }
        echo "</td><td bgcolor='lightgreen'><div id='cc' class='carousel slide'
            data-ride='carousel'><div class='carousel-inner'><div class='carousel-item active'>" . $c["personajes"] .
            "<br><br><img src='imgpersonajes/" . $c["personajes"] . ".png' width='400px' height='400px'></div>";
        if ($c["sp"] >= "4") {
            echo "<div class='carousel-item'>Monkey D. Luffy<br><br>
            <Img src='imgpersonajes/Monkey D. Luffy.png' width='400px' height='400px'></div>
            <div class='carousel-item'>Roronoa Zoro<br><br>
            <Img src='imgpersonajes/Roronoa Zoro.png' width='400px' height='400px'></div>
            <div class='carousel-item'>Nami<br><br>
            <Img src='imgpersonajes/Nami.png' width='400px' height='400px'></div>
            <div class='carousel-item'>Usopp<br><br>
            <Img src='imgpersonajes/Usopp.png' width='400px' height='400px'></div>";
            if ($c["sp"] >= 5) {
                echo "<div class='carousel-item'>Sanji<br><br>
                <Img src='imgpersonajes/Sanji.png' width='400px' height='400px'></div>";
                if ($c["sp"] >= 6) {
                    echo "<div class='carousel-item'>Tony Tony Chopper<br><br>
                    <Img src='imgpersonajes/Tony Tony Chopper.png' width='400px' height='400px'></div>";
                    if ($c["sp"] >= 7) {
                        echo "<div class='carousel-item'>Nico Robin<br><br>
                        <Img src='imgpersonajes/Nico Robin.png' width='400px' height='400px'></div>";
                        if ($c["sp"] >= 8) {
                            echo "<div class='carousel-item'>Franky<br><br>
                            <Img src='imgpersonajes/Franky.png' width='400px' height='400px'></div>";
                            if ($c["sp"] >= 9) {
                                echo "<div class='carousel-item'>Brook<br><br>
                                <Img src='imgpersonajes/Brook.png' width='400px' height='400px'></div>";
                                if ($c["sp"] >= 10) {
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
    } echo "</table>";
} ?> </body>

</html>
