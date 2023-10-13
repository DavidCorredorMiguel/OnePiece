<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Frutas Del Diablo</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <form action='OP02.php' method='post' style="text-align: center;">
        <input type="text" name="tipofruta" placeholder="Tipo Fruta Del Diablo">
        <input type="text" name="subtipofruta" placeholder="Subtipo Fruta Del Diablo">
        <input type="text" name="canon" placeholder="Fruta Canon (Si/No)">
        <input type="text" name="nfruta" placeholder="Nombre Fruta Del Diablo">
        <input type="text" name="modelo" placeholder="Modelo Fruta Del Diablo"><br><br>
        <input type="text" name="mostrada" placeholder="Fruta Mostrada (Si/No)">
        <input type="text" name="nivel" placeholder="Nivel Usuario Fruta">
        <input type="text" name="usuario" placeholder="Nombre Usuario Actual">
        <input type="text" name="usuarioanterior" placeholder="Nombre Usuario Anterior"><br><br>
        <input type="submit" name="buscafruta" value="Buscar Fruta">
    </form> <?php
try { if (isset($_POST["buscafruta"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM frutasdiablo WHERE tipofruta=? OR subtipofruta=? OR canon=? OR nfruta=? OR modelo=?
            OR mostrada=? OR nivel=? OR usuario=? OR usuarioanterior=?"); $res->bindParam(1, $_POST["tipofruta"]);
        $res->bindParam(2, $_POST["subtipofruta"]); $res->bindParam(3, $_POST["canon"]); $res->bindParam(4, $_POST["nfruta"]);
        $res->bindParam(5, $_POST["modelofruta"]); $res->bindParam(6, $_POST["mostrada"]); $res->bindParam(7, $_POST["nivel"]);
        $res->bindParam(8, $_POST["usuario"]); $res->bindParam(9, $_POST["usuarioanterior"]); $res->execute(); echo "<table><tr>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) {
            if ($c["tipofruta"] == "Zoan") { echo "<th colspan='2'>Fruta Del Diablo (Tipo, Subtipo, Uso y Forma/s)</th>"; }
            else { echo "<th>Fruta Del Diablo (Tipo, Subtipo y Uso)</th>"; }
            echo "<th>Técnica</th><th>Usuario/s y Nivel</th></tr><tr><td bgcolor='orange'>". $c["tipofruta"]." ";
            if ($c["subtipofruta"]!="Normal"){ echo $c["subtipofruta"]; }
            if ($c["canon"]!="Si"){echo " (No Canon)"; } echo "<br><br>Fruta " . $c["noriginal"] . " (" . $c["nfruta"] . ")";
            if ($c["modelo"] != "Sin Modelo" || $c["nfruta"] == "Picor") { echo " Modelo " . $c["modelo"]; }
            echo "<br><br>Uso De La Fruta: " . $c["usofruta"] . "<br><br><Img src='imgfrutasformas/" . $c["imgfruta"] .
                ".png' width='350px' height='350px'>";
            if ($c["tipofruta"] == "Zoan") { echo "</td><td bgcolor='orange'>Forma ";
                if ($c["fanimal"] != "No" && $c["fhibrida"] != "No") {
                    echo "Animal<br><br><Img src='imgfrutasformas/" . $c["fanimal"] ." Animal.png' width='350px' height='350px'><br><br>
                        Hibrida<br><br><Img src='imgfrutasformas/" . $c["fhibrida"] . " Hibrida.png' width='350px' height='350px'>";
                } else {
                    if ($c["fanimal"]!="No") {
                        echo "Animal<br><br><Img src='imgfrutasformas/".$c["fanimal"].
                            " Animal.png' width='350px' height='350px'><br><br>";
                    } if ($c["fhibrida"]!="No") {
                        echo "Hibrida<br><br><Img src='imgfrutasformas/".$c["fhibrida"]." Hibrida.png' width='350px' height='350px'>";
                    }
                }
            } echo"</td><td bgcolor='lightgreen'>"; if ($c["tecnica"] != "No") { echo $c["noriginaltecnica"]." (".$c["tecnica"].")"; }
            echo "<br><br><Img src='imghakiytecnicas/".$c["imgtecnica"].".png' width='350px' height='350px'></td><td bgcolor='yellow'>";
            if ($c["usuario"] == "Desconocido") {
                echo "Usuario Anterior: " . $c["usuarioanterior"] . " (Nivel " . $c["nivel"] . ")<br><br><Img src='imgpersonajes/" .
                $c["imgusuarioanterior"];
            } else {
                if ($c["usuarioanterior"] != "No") {
                    echo $c["usuario"] . " (Nivel " . $c["nivel"] . ")<br><br><Img src='imgpersonajes/" . $c["imgusuario"] .
                        ".png' width='350px' height='350px'><br><br>Usuario Anterior: " . $c["usuarioanterior"] .
                        "<br><br><Img src='imgpersonajes/" . $c["imgusuarioanterior"];
                } else { echo $c["usuario"] . " (Nivel " . $c["nivel"] . ")<br><br><Img src='imgpersonajes/" . $c["imgusuario"]; }
            } echo ".png' width='350px' height='350px'></td></tr>";
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?>
</body>

</html>
