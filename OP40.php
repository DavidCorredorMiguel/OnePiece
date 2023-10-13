<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>OP Apariciones</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <?php require_once "../ModelosEstilos/OPM14.php"; $m = new OPM14(); $v = array();
if (isset($_POST["subtipoap"])) { $v = $m->getSubtiposAp(); } if (isset($_POST["tipof"])) { $v = $m->getFrutas(); }
if(isset($_POST["subtipof"])){ $v = $m->getSubtipos(); } if(isset($_POST["tmn"])){ $v = $m->getTmn(); }
if(isset($_POST["tapf"])){ $v = $m->getTapf(); } if(isset($_POST["nombref"])){ $v = $m->getNombreFrutas(); }
if (isset($_POST["b1"])) { $v = $m->getFMostradas(); } if (isset($_POST["b2"])) { $v = $m->getFrutasCanon(); }
if (isset($_POST["b3"])) { $v = $m->getFrutasNoCanon(); }
foreach ($m->c() as $c) foreach ($m->c0() as $c0) foreach ($m->c1() as $c1) foreach ($m->c1b() as $c1b) foreach ($m->c1c() as $c1c)
foreach ($m->c1d() as $c1d) foreach ($m->c1e() as $c1e) foreach ($m->c2() as $c2) foreach ($m->c3() as $c3) foreach ($m->c4() as $c4)
foreach ($m->c5() as $c5) foreach ($m->c6() as $c6) { $zoan = $c1 + $c1b + $c1c + $c1d + $c1e; $totalf = $c0 + $zoan + $c2 + $c;
    echo "Tipos Frutas: ($c Desconocido) + ($c0 Logia) + ($zoan Zoan) + (Paramecia: $c2) = $totalf | Mostradas: ($c3 Canon) +
    ($c4 No Canon) = " . ($c3 + $c4) . " | Canon: $c5 | No Canon: $c6<hr>";
} foreach ($m->c7() as $c7) foreach ($m->c8() as $c8) foreach ($m->c9() as $c9) foreach ($m->c10() as $c10) foreach ($m->c11() as $c11)
foreach ($m->c12() as $c12) foreach ($m->c13() as $c13) foreach ($m->c14() as $c14) {
    echo "Aparición Habilidad Anime/Manga: $c7 | Manga: $c8 | Anime: $c9 | Peliculas: $c10 | Videojuegos: $c11 | SBS: $c12 |
    Eventos: $c13 | Otros: $c13";
}foreach ($m->cm() as $cm) { echo " | Frutas Sin Nombre: $cm"; }
foreach ($m->capfc() as $capfc) foreach ($m->capfnc() as $capfnc) { $sif=$capfc + $capfnc;
    echo " | Sin Imagen Fruto: (Canon $capfc) + (No Canon $capfnc) = $sif<hr>"; }
echo "<form action='OP40.php' method='post'><select name='subtipoapv'>";
foreach ($m->sacaSubtipoAp() as $subtipoap) { echo "<option value='$subtipoap'>$subtipoap</option>"; }
echo "</select><input type='submit' value='Buscar Aparición Habilidad' name='subtipoap'><select name='tmnv'>";
foreach ($m->sacaTmn() as $tmn) { echo "<option value='$tmn'>$tmn (Nombre)</option>"; }
echo "</select><input type='submit' value='Buscar Mención Nombre' name='tmn'><select name='tapfv'>";
foreach ($m->sacatapf() as $tapf) { echo "<option value='$tapf'>$tapf (Imagen Fruto)</option>"; }
echo "</select><input type='submit' value='Buscar Aparición Fruta' name='tapf'><br><br><select name='tipov'>";
foreach ($m->sacaFruta() as $tipo) { echo "<option value='$tipo'>$tipo</option>"; }
echo "</select><input type='submit' value='Buscar Tipo' name='tipof'><select name='subtipov'>";
foreach ($m->sacaSubtipo() as $subtipo) { echo "<option value='$subtipo'>$subtipo</option>"; }
echo "</select><input type='submit' value='Buscar Subtipo' name='subtipof'><select name='nombrev'>";
foreach ($m->sacaNombre() as $nombre) { echo "<option value='$nombre'>Fruta $nombre $nombre</option>"; }
echo "</select><input type='submit' value='Buscar Fruta' name='nombref'> <input type='submit' name='b1' value='Mostrada'>
<input type='submit' name='b2' value='Canon'> <input type='submit' name='b3' value='No Canon'></form><br>";
if (isset($_POST["tipof"]) || isset($_POST["subtipof"]) || isset($_POST["tmn"]) || isset($_POST["tapf"]) || isset($_POST["subtipoap"])
    || isset($_POST["nombref"]) || isset($_POST["b1"]) || isset($_POST["b2"]) || isset($_POST["b3"])) { echo "<table>";
    foreach ($v as $c) {
        echo "<tr><th bgcolor='red'>Fruta Del Diablo (Tipo y Subtipo)</th><th bgcolor='red'>Aparición Habilidad (" . $c["subtipoap"] .
            ")</th><th bgcolor='red'>Mención Nombre Fruta</th></th><th bgcolor='red'>Imagen Fruto</th><th bgcolor='red'>Usuario/s</th>
            </tr><tr><td bgcolor='orange'>".$c["tipofruta"]." ";
        if ($c["subtipofruta"]!="Normal"){ echo $c["subtipofruta"]; }if ($c["canon"]!="Si"){echo " (No Canon)"; }
        echo "<br><br>Fruta " . $c["noriginal"] . " (" . $c["nfruta"] . ")";
        if ($c["modelo"] != "Sin Modelo" || $c["nfruta"]=="Picor") { echo " Modelo " . $c["modelo"]; }
        echo "<br><br>Permite Al Usuario " . $c["usofruta"] . "<br><br><Img src='imgfrutasformas/" . $c["imagen"] .
            ".png' width='275px' height='275px'></td><td>1ª Aparición: " . $c["ap1"];
        if ($c["subtipoap"]=="Anime/Manga" || $c["subtipoap"]=="Manga") {
            if ($c["c"]=="C") { echo "<br><br><Img src='imgcapitulos/" . $c["ap1"] . "C.png' width='275px' height='275px'>"; }
            else { echo "<br><br><Img src='imgcapitulos/" . $c["ap1"] . ".png' width='275px' height='275px'>"; }
        } if($c["subtipoap"]=="Anime"){ echo "<br><br><Img src='imgepisodios/" . $c["ap1"] . ".png' width='275px' height='275px'>"; }
        if ($c["subtipoap"]=="Evento" || $c["subtipoap"]=="Especial" || $c["subtipoap"]=="Videojuego"
             || $c["subtipoap"]=="Otro") {
            echo "<br><br><Img src='imgvoljuegospeli/" . $c["ap1"] . ".png' width='275px' height='275px'>";
        } if ($c["subtipoap"]=="Pelicula") {
            echo "<br><br><Img src='imgvoljuegospeli/Peli " . $c["ap1"] . ".png' width='275px' height='275px'>";
        } if ($c["subtipoap"]=="SBS") { echo "<br><br><Img src='imgfrutasformas/FrutasDiablo.png' width='275px' height='275px'>"; }
        if($c["ap2"] != "No") {
            if($c["ap2"] != "One Piece Estampida") {
                echo "<br><br>2ª Aparición: " . $c["ap2"] . "<br><br><Img src='imgepisodios/" . $c["ap2"] .
                    ".png' width='275px' height='275px'>";
            } else {
                echo "<br><br>2ª Aparición: " . $c["ap2"] .
                    "<br><br><Img src='imgvoljuegospeli/Peli One Piece Estampida.png' width='275px' height='275px'>";
            }
        } echo "</td><td>";
        if($c["mn1"] != "No") { echo "1ª Mención Nombre: " . $c["mn1"];
            if ($c["tmn"]=="Anime/Manga" || $c["tmn"]=="Manga") {
                if ($c["cm"]=="C"){echo "<br><br><Img src='imgcapitulos/" . $c["mn1"] . "C.png' width='275px' height='275px'>";}
                else { echo "<br><br><Img src='imgcapitulos/" . $c["mn1"] . ".png' width='275px' height='275px'>"; }
                } if($c["tmn"]=="Anime"){ echo "<br><br><Img src='imgepisodios/" . $c["ap1"] . ".png' width='275px' height='275px'>"; }
                if ($c["tmn"]=="Magazine" ||$c["tmn"]=="Videojuego"||$c["tmn"]=="Especial" || $c["tmn"]=="Evento" || $c["tmn"]=="Otro") {
                echo "<br><br><Img src='imgvoljuegospeli/" . $c["mn1"] . ".png' width='275px' height='275px'>";
            } if ($c["tmn"]=="Pelicula") {
                echo "<br><br><Img src='imgvoljuegospeli/Peli ".$c["mn1"].".png' width='275px' height='275px'>"; }
            if ($c["tmn"]=="SBS") { echo "<br><br><Img src='imgfrutasformas/FrutasDiablo.png' width='275px' height='275px'>"; }
        } else { echo "<br><br><Img src='imgfrutasformas/FrutasDiablo.png' width='275px' height='275px'>"; }
        if($c["mn2"] != "No") {
            if($c["mn2"] != "No") { echo "2ª Mención Nombre: " . $c["mn2"];
                if($c["mn2"] != "One Piece Estampida") {
                    echo "<br><br><Img src='imgepisodios/" . $c["mn2"] . ".png' width='275px' height='275px'>";
                } else {
                    echo "<br><br><Img src='imgvoljuegospeli/Peli One Piece Estampida.png' width='275px' height='275px'>";
                }
            }
        } echo "</td><td>"; if($c["apf1"] != "No") { echo "1ª Imagen Fruto: " . $c["apf1"];
            if ($c["tapf"]=="Anime/Manga") {
                if ($c["cf"]=="C"){echo "<br><br><Img src='imgcapitulos/" . $c["apf1"] . "C.png' width='275px' height='275px'>";}
                else { echo "<br><br><Img src='imgcapitulos/" . $c["apf1"] . ".png' width='275px' height='275px'>"; }
            }
            if ($c["tapf"]!="Anime/Manga" && $c["tapf"]!="Pelicula" && $c["tapf"]!="SBS") {
                echo "<br><br><Img src='imgvoljuegospeli/" . $c["apf1"] . ".png' width='275px' height='275px'>";
            }if ($c["tapf"]=="Pelicula"){
                echo "<br><br><Img src='imgvoljuegospeli/Peli ".$c["apf1"].".png' width='275px' height='275px'>"; }
            if ($c["tapf"]=="SBS") { echo "<br><br><Img src='imgfrutasformas/FrutasDiablo.png' width='275px' height='275px'>"; }
        } else { echo "<Img src='imgfrutasformas/FrutasDiablo.png' width='275px' height='275px'>"; }
        if($c["apf2"] != "No"){ echo "<br><br>2ª Imagen Fruto: " . $c["apf2"];
            if ($c["tapf"]== "Anime/Manga") { echo "<br><br><Img src='imgepisodios/".$c["apf2"] .".png' width='275px' height='275px'>"; }
        } echo "</td><td bgcolor='yellow'>";
        if ($c["usuario"]=="Desconocido") {
            echo "Usuario Anterior: " . $c["usuarioanterior"] . "<br><br><Img src='imgpersonajes/" . $c["imgusuarioanterior"];
        } else { if ($c["usuarioanterior"] != "No") {
                echo $c["usuario"] . "<br><br><Img src='imgpersonajes/" . $c["imgusuario"] .
                    ".png' width='275px' height='275px'><br><br>Usuario Anterior: " . $c["usuarioanterior"] .
                    "<br><br><Img src='imgpersonajes/" . $c["imgusuarioanterior"];
            } else { echo $c["usuario"] . "<br><br><Img src='imgpersonajes/" . $c["imgusuario"]; }
        } echo ".png' width='275px' height='275px'></td></tr>";
    } echo "</table>";
} ?>
</body>

</html>
