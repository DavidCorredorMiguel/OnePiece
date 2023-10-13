<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Estilos Combate</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <form action='OP50.php' method='post' style="text-align: center;">
        <input type="text" name="armaestiloc" placeholder="Arma/Estilo Combate">
        <input type="text" name="tipoestiloc" placeholder="Tipo Estilo Combate">
        <input type="text" name="subtipoestiloc1" placeholder="Subtipo1 Estilo Combate">
        <input type="text" name="subtipoestiloc2" placeholder="Subtipo2 Estilo Combate">
        <input type="text" name="tcanon" placeholder="Técnica Canon (Si/No)">
        <input type="text" name="uso" placeholder="Uso Técnica">
        <input type="text" name="usuario" placeholder="Nombre Usuario"><br><br>
        <input type="text" name="tipofruta" placeholder="Tipo Fruta Del Diablo">
        <input type="text" name="subtipofruta" placeholder="Subtipo Fruta Del Diablo">
        <input type="text" name="cfruta" placeholder="Fruta Canon (Si/No)">
        <input type="text" name="nfruta" placeholder="Nombre Fruta Del Diablo">
        <input type="text" name="modelo" placeholder="Modelo Fruta Del Diablo"><br><br>
        <input type="submit" name="buscaestilo" value="Buscar Estilo Combate">
    </form> <?php
try { if (isset($_POST["buscaestilo"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM tecnicas WHERE armaestiloc=? OR tipoestiloc=? OR subtipoestiloc1=? OR subtipoestiloc2=?
        OR tcanon=? OR uso=? OR tipofruta=? OR subtipofruta=? OR cfruta=? OR nfruta=? OR modelo=? OR usuario=?");
        $res->bindParam(1, $_POST["armaestiloc"]); $res->bindParam(2, $_POST["tipoestiloc"]);
        $res->bindParam(3, $_POST["subtipoestiloc1"]); $res->bindParam(4, $_POST["subtipoestiloc2"]);
        $res->bindParam(5, $_POST["tcanon"]); $res->bindParam(6, $_POST["uso"]); $res->bindParam(7, $_POST["tipofruta"]);
        $res->bindParam(8, $_POST["subtipofruta"]); $res->bindParam(9, $_POST["cfruta"]); $res->bindParam(10, $_POST["nfruta"]);
        $res->bindParam(11, $_POST["modelo"]); $res->bindParam(12, $_POST["usuario"]); $res->execute(); echo "<table>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><th>Arma/Estilo Combate (Tipo y Subtipos)</th><th>Técnica";
            if ($c["tcanon"]!="Si") { echo " No Canon"; } echo "</th><th>Usuario/s</th>";
            if ($c["tipofruta"] !="No") { echo "<th>Fruta Del Diablo (Tipo y Subtipo)</th>"; } echo "</tr><tr><td>" . $c["tipoestiloc"];
            if ($c["subtipoestiloc1"] !="No") { echo ": " . $c["subtipoestiloc1"]; }
            if ($c["subtipoestiloc2"] !="No") { echo " (" . $c["subtipoestiloc2"] . ")"; }
            echo "<br><br>Basado En: ".$c["armaestiloc"]."<br><br>Uso: ".$c["uso"] . "</td><td bgcolor='lightgreen'>";
            if ($c["tecnica"]!="No") { echo $c["noriginaltecnica"]." (".$c["tecnica"].")"; }
            echo "<br><br><Img src='imghakiytecnicas/" . $c["imgtecnica"] . ".png' width='400px' height='400px'></td>
                <td bgcolor='yellow'>" . $c["usuario"] . "<br><br><Img src='imgpersonajes/" . $c["imgusuario"] .
                ".png' width='400px' height='400px'></td>";
            if ($c["tipofruta"]!="No"){ echo "<td bgcolor='orange'>".$c["tipofruta"]." ";
                if ($c["subtipofruta"]!="Normal"){ echo $c["subtipofruta"]; }
                if ($c["cfruta"]!="Si"){echo " (No Canon)"; } echo "<br><br>Fruta " . $c["noriginal"]." (".$c["nfruta"] . ")";
                if ($c["modelo"] != "Sin Modelo" || $c["nfruta"] == "Picor") { echo " Modelo " . $c["modelo"]; }
                echo "<br><br><Img src='imgfrutasformas/" . $c["imgfruta"] . ".png' width='400px' height='400px'></td>";
            } echo "</tr>";
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?>
</body>

</html>
