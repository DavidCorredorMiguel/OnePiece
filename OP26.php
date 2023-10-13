<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Razas De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <form action='OP26.php' method='post' style="text-align: center;">
        <input type="text" name="tiporaza" placeholder="Tipo Raza">
        <input type="text" name="subtiporaza" placeholder="Subtipo (Canon/No Canon)">
        <input type="text" name="miembroraza" placeholder="Miembro Raza">
        <input type="text" name="nombreraza" placeholder="Raza">
        <input type="text" name="marorigen" placeholder="Mar Origen">
        <input type="text" name="nombrelugarorigen" placeholder="Lugar Origen"><br><br>
        <input type="submit" name="buscaraza" value="Buscar Raza">
    </form> <?php
try {
    if (isset($_POST["buscaraza"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM razas WHERE tiporaza=? OR subtiporaza=? OR miembroraza=? OR nombreraza=? OR marorigen=?
            OR nombrelugarorigen=?"); $res->bindParam(1, $_POST["tiporaza"]); $res->bindParam(2, $_POST["subtiporaza"]);
        $res->bindParam(3, $_POST["miembroraza"]); $res->bindParam(4, $_POST["nombreraza"]);
        $res->bindParam(5, $_POST["marorigen"]); $res->bindParam(6, $_POST["nombrelugarorigen"]); $res->execute();
        echo "<table><tr><th>Miembro De La Raza (Tipo y Subtipo)</th><th>Raza</th><th>Lugar De Origen</th></tr>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td bgcolor='orange'>" . $c["tiporaza"] . " (" . $c["subtiporaza"] . "): " .
                $c["miembroraza"] . "<br><br><Img src='imgespecieyraza/" . $c["imagenmiembroraza"] .
                "' width='475px' height='475px'></td><td bgcolor='lightgreen'>" .
                $c["nombreraza"] . "<br><br><Img src='imgespecieyraza/" . $c["imagenraza"] .
                "' width='475px' height='475px'></td><td bgcolor='lightgreen'>" .
                $c["nombrelugarorigen"] . " (" . $c["marorigen"] . ")<br><br><Img src='imglugares/"
                . $c["imagenlugarorigen"] . "' width='475px' height='475px'></td></tr>";
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?>
</body>

</html>
