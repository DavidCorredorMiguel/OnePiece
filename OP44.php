<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Frutas Limite/Relacion</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
</head>

<body>
    <form action='OP44.php' method='post' style="text-align: center;">
        <br><input type="text" name="limitacion" placeholder="Limitacion">
        <input type="text" name="subtlv" placeholder="Limitacion Fruta Del Diablo">
        <input type="text" name="tipofruta" placeholder="Tipo Fruta Del Diablo">
        <input type="text" name="subtipofruta" placeholder="Subtipo Fruta Del Diablo">
        <input type="text" name="canon" placeholder="Fruta Canon (Si/No)">
        <input type="text" name="nfruta" placeholder="Nombre Fruta Del Diablo">
        <input type="text" name="modelo" placeholder="Modelo Fruta Del Diablo"><br><br>
        <input type="text" name="mostrada" placeholder="Fruta Mostrada (Si/No)">
        <input type="text" name="usuario" placeholder="Nombre Usuario Actual">
        <input type="text" name="usuarioanterior" placeholder="Nombre Usuario Anterior"><br><br>
        <input type="submit" name="buscaparicion" value="Buscar Aparicion">
    </form> <?php
try { if (isset($_POST["buscaparicion"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM limiterelacion WHERE limitacion=? OR subtl1 = ? OR subtl2 = ? OR subtl3 = ? OR subtl4 = ?
            OR subtl5 = ? OR subtl6 = ? OR subtl7 = ? OR tipofruta=? OR subtipofruta=? OR canon=? OR nfruta=? OR modelo=? OR mostrada=?
            OR usuario=? OR usuarioanterior=?"); $res->bindParam(1, $_POST["limitacion"]); $subtl = $_POST["subtlv"];
        $res->bindParam(2, $subtl); $res->bindParam(3, $subtl); $res->bindParam(4, $subtl); $res->bindParam(5, $subtl);
        $res->bindParam(6, $subtl); $res->bindParam(7, $subtl); $res->bindParam(8, $subtl); $res->bindParam(9, $_POST["tipofruta"]);
        $res->bindParam(10, $_POST["subtipofruta"]); $res->bindParam(11, $_POST["canon"]); $res->bindParam(12, $_POST["nfruta"]);
        $res->bindParam(13, $_POST["modelo"]); $res->bindParam(14, $_POST["mostrada"]); $res->bindParam(15, $_POST["usuario"]);
        $res->bindParam(16, $_POST["usuarioanterior"]); $res->execute(); echo "<table>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) { echo "<th>Fruta Del Diablo (Tipo";
            if ($c["tipofruta"]=="Zoan"){ echo", Subtipo y Forma/s) y Limitación</th>"; } else{ echo" y Subtipo) y Limitación</th>"; }
            echo "<th>Usuario/s</th><th>Relaciones Con Frutas</th></tr><tr><td bgcolor='orange'>" . $c["tipofruta"]." ";
            if ($c["subtipofruta"]!="Normal"){ echo $c["subtipofruta"]; }
            if ($c["canon"]!="Si"){echo " (No Canon)"; } echo "<br><br>Fruta " . $c["noriginal"] . " (" . $c["nfruta"] . ")";
            if ($c["modelo"] != "Sin Modelo" || $c["nfruta"] == "Picor") { echo " Modelo " . $c["modelo"]; }
            echo "<br><br>Debildidades: Inmersión En Agua, Haki";
            if ($c["limitacion"] != "Ninguna"){ echo ", Piedra Marina y " . $c["limitacion"]; } else { echo " y Piedra Marina"; }
            echo "<br><br><Img src='imgfrutasformas/" . $c["imgfruta"] . ".png' width='350px' height='350px'><td bgcolor='yellow'>";
            if ($c["usuario"] == "Desconocido") {
                echo "Usuario Anterior: " . $c["usuarioanterior"] . "<br><br><Img src='imgpersonajes/" . $c["imgusuarioanterior"];
            } else { if ($c["usuarioanterior"] != "No") {
                    echo $c["usuario"] . "<br><br><Img src='imgpersonajes/" . $c["imgusuario"] .
                        ".png' width='350px' height='350px'><br><br>Usuario Anterior: " .
                        $c["usuarioanterior"] ."<br><br><Img src='imgpersonajes/" . $c["imgusuarioanterior"];
                } else { echo $c["usuario"] . "<br><br><Img src='imgpersonajes/" . $c["imgusuario"]; }
            } echo ".png' width='350px' height='350px'></td><td bgcolor='lightgreen'>
                <div id='cc' class='carousel slide' data-ride='carousel'><div class='carousel-inner'><div class='carousel-item active'>";
            if ($c["subtl1"] != "No") {
                if ($c["subtl1"] == "Anula") { echo "Se Anula Con"; } if ($c["subtl1"] == "Similar") { echo "Es Similar a"; }
                if ($c["subtl1"] != "Anula" && $c["subtl1"] != "Similar") { echo " Es " . $c["subtl1"]; }
                echo " La Fruta " . $c["noriginalfl1"] . " (" . $c["nfrutal1"] . ") Tipo " . $c["tfl1"];
                if ($c["subtipofl"] != "No") { echo " (".$c["subtipofl"].")"; } else { echo ""; }
                if ($c["modl"] != "No") { echo " Modelo " . $c["modl"]; } else { echo ""; }
                echo "<br><br><Img src='imgfrutasformas/" . $c["imgfl1"] . ".png' width='350px' height='350px'></div>";
            } else { echo "<img src='imgfrutasformas/FrutasDiablo.png' width='400px' height='400px'></div>"; }
            for ($p = 2; $p < 8; $p++) {
                if ($c["subtl$p"] != "No") { echo "<div class='carousel-item'>";
                    if ($c["subtl$p"] == "Anula"){ echo "Se Anula Con"; } if ($c["subtl$p"] == "Similar"){ echo "Es Similar a"; }
                    if ($c["subtl$p"] != "Anula" && $c["subtl$p"] != "Similar") { echo " Es " . $c["subtl$p"]; }
                    echo " La Fruta " . $c["noriginalfl$p"] . " (" . $c["nfrutal$p"] . ") Tipo " . $c["tfl$p"] .
                        "<br><br><Img src='imgfrutasformas/" . $c["imgfl$p"] .".png' width='350px' height='350px'></div>";
                }
            } echo "</div><a class='carousel-control-prev' href='#cc' data-slide='prev'></a>
                <a class='carousel-control-next' href='#cc' data-slide='next'></a></div></td></tr>";
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?>
</body>

</html>