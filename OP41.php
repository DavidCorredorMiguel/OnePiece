<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Apariciones</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <form action='OP41.php' method='post' style="text-align: center;">
        <input type="text" name="subtipoap" placeholder="Subtipo Aparición">
        <input type="text" name="ap1" placeholder="1ª Aparición">
        <input type="text" name="ap2" placeholder="2ª Aparición">
        <input type="text" name="tapf" placeholder="Tipo Aparición Fruta">
        <input type="text" name="apf1" placeholder="1ª Aparición Fruta">
        <input type="text" name="apf2" placeholder="2ª Aparición Fruta"><br><br>
        <input type="text" name="tipofruta" placeholder="Tipo Fruta Del Diablo">
        <input type="text" name="subtipofruta" placeholder="Subtipo Fruta Del Diablo">
        <input type="text" name="canon" placeholder="Fruta Canon (Si/No)">
        <input type="text" name="nfruta" placeholder="Nombre Fruta Del Diablo">
        <input type="text" name="modelo" placeholder="Modelo Fruta Del Diablo">
        <input type="text" name="usuario" placeholder="Nombre Usuario Actual">
        <input type="text" name="usuarioanterior" placeholder="Nombre Usuario Anterior"><br><br>
        <input type="submit" name="buscaparicion" value="Buscar Aparición">
    </form> <?php
try { if (isset($_POST["buscaparicion"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM apariciones WHERE subtipoap=? OR ap1=? OR ap2=? OR tapf=? OR apf1=? OR apf2=?
            OR tipofruta=? OR subtipofruta=? OR canon=? OR nfruta=? OR modelo=? OR usuario=? OR usuarioanterior=?");
        $res->bindParam(1, $_POST["subtipoap"]); $res->bindParam(2, $_POST["ap1"]);
        $res->bindParam(3, $_POST["ap2"]); $res->bindParam(4, $_POST["tapf"]); $res->bindParam(5, $_POST["apf1"]);
        $res->bindParam(6, $_POST["apf2"]); $res->bindParam(7, $_POST["tipofruta"]); $res->bindParam(8, $_POST["subtipofruta"]);
        $res->bindParam(9, $_POST["canon"]); $res->bindParam(10, $_POST["nfruta"]); $res->bindParam(11, $_POST["modelo"]);
        $res->bindParam(12, $_POST["usuario"]); $res->bindParam(13, $_POST["usuarioanterior"]); $res->execute(); echo "<table>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><th bgcolor='red'>Fruta Del Diablo (Tipo y Subtipo)</th><th bgcolor='red'>Aparición Habilidad (" .
                $c["subtipoap"] . ")</th><th bgcolor='red'>Mención Nombre Fruta</th></th><th bgcolor='red'>Imagen Fruto</th>
                <th bgcolor='red'>Usuario/s</th></tr><tr><td bgcolor='orange'>".$c["tipofruta"]." ";
            if ($c["subtipofruta"]!="Normal"){ echo $c["subtipofruta"]; }if ($c["canon"]!="Si"){echo " (No Canon)"; }
            echo "<br><br>Fruta " . $c["noriginal"] . " (" . $c["nfruta"] . ")";
            if ($c["modelo"] != "Sin Modelo" || $c["nfruta"]=="Picor") { echo " Modelo " . $c["modelo"]; }
            echo "<br><br>Permite Al Usuario " . $c["usofruta"] . "<br><br><Img src='imgfrutasformas/" . $c["imagen"] .
                ".png' width='275px' height='275px'></td><td>1ª Aparición: " . $c["ap1"];
            if ($c["subtipoap"]=="Anime/Manga" || $c["subtipoap"]=="Manga") {
                if ($c["c"]=="C") { echo "<br><br><Img src='imgcapitulos/" . $c["ap1"] . "C.png' width='275px' height='275px'>"; }
                else { echo "<br><br><Img src='imgcapitulos/" . $c["ap1"] . ".png' width='275px' height='275px'>"; }
            } if($c["subtipoap"]=="Anime"){ echo "<br><br><Img src='imgepisodios/" . $c["ap1"] . ".png' width='275px' height='275px'>"; }
            if ($c["subtipoap"]=="Evento" || $c["subtipoap"]=="Especial" || $c["subtipoap"]=="Videojuego" || $c["subtipoap"]=="Otro") {
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
                } if ($c["tapf"]=="Magazine"||$c["tapf"]=="Videojuego"||$c["tapf"]=="Especial" || $c["tapf"]=="Evento" || $c["tapf"]=="Otro") {
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
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?>
</body>

</html>
