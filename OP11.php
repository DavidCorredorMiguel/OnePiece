<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Recompensas</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <form action='OP11.php' method='post' style="text-align: center;">
        <input type="text" name="tiporec" placeholder="Tipo Recompensa">
        <input type="text" name="subtiporec" placeholder="Subtipo (Canon/No Canon)">
        <input type="number" name="recompensa" placeholder="Recompensa" min=0>
        <input type="text" name="usuariorecompensa" placeholder="Usuario Recompensa">
        <input type="text" name="nombrebanda" placeholder="Banda"><br><br>
        <input type="submit" name="buscarecompensa" value="Buscar Recompensa">
    </form> <?php
try { if (isset($_POST["buscarecompensa"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM recompensas WHERE tiporec=? OR subtiporec=? OR recompensa=? OR usuariorecompensa=?
            OR nombrebanda=?"); $res->bindParam(1, $_POST["tiporec"]); $res->bindParam(2, $_POST["subtiporec"]);
        $res->bindParam(3, $_POST["recompensa"]); $res->bindParam(4, $_POST["usuariorecompensa"]);
        $res->bindParam(5, $_POST["nombrebanda"]); $res->execute();
        echo "<table><tr><th>Recompensa</th><th>Personaje</th><th>Nombre Banda</th></tr>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td bgcolor='orange'>Recompensa " . $c["tiporec"] . " (" . $c["subtiporec"] . ")<br><br>" .$c["num"]."ª Cifra: "
                 . $c["recompensa"] . " <Img src='imgrecygrupos/Berry.gif'><br><br><Img src='imgrecygrupos/Recompensa " .
                 $c["imagenrecompensa"] . ".png' width='475px' height='475px'></td><td bgcolor='yellow'>" . $c["usuariorecompensa"];
                if ($c["muerte"]!="No"){echo " (Fallecido/a)"; }
            echo "<br><br><Img src='imgpersonajes/" .$c["imgusuariorecompensa"] . ".png' width='475px' height='475px'></td>
                <td bgcolor='yellow'>" . $c["nombrebanda"] . "<br><br><Img src='imgrecygrupos/" . $c["imagenbanda"] .
                ".png' width='475px' height='475px'></td></tr>";
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; }
?>
</body>

</html>