<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Especies De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <form action='OP23.php' method='post' style="text-align: center;">
        <input type="text" name="tipoespecie" placeholder="Tipo Especie">
        <input type="text" name="subtipoespecie" placeholder="Subtipo (Canon/No Canon)">
        <input type="text" name="miembroespecies" placeholder="Miembro Especie">
        <input type="text" name="nombreespecie" placeholder="Especie">
        <input type="text" name="marorigen" placeholder="Mar Origen">
        <input type="text" name="nombrelugarorigen" placeholder="Lugar Origen"><br><br>
        <input type="submit" name="buscaespecie" value="Buscar Especie">
    </form> <?php
try { if (isset($_POST["buscaespecie"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM especies WHERE tipoespecie=? OR subtipoespecie=? OR miembroespecies=?
            OR nombreespecie=? OR marorigen=? OR nombrelugarorigen=?"); $res->bindParam(1, $_POST["tipoespecie"]);
        $res->bindParam(2, $_POST["subtipoespecie"]); $res->bindParam(3, $_POST["miembroespecies"]);
        $res->bindParam(4, $_POST["nombreespecie"]); $res->bindParam(5, $_POST["marorigen"]);
        $res->bindParam(6, $_POST["nombrelugarorigen"]); $res->execute();
        echo "<table><tr><th>Miembro De La Especie (Tipo y Subtipo)</th><th>Especie</th><th>Lugar De Origen</th></tr>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td bgcolor='orange'>" . $c ["tipoespecie"] . " ("
                . $c ["subtipoespecie"] . "): " . $c ["miembroespecies"] . "<br><br><Img src='imgespecieyraza/"
                . $c ["imagenmiembroespecies"] . "' width='475px' height='475px'></td>
                <td bgcolor='lightgreen'>" . $c ["nombreespecie"] .
                "<br><br><Img src='imgespecieyraza/" . $c ["imagenespecie"] .
                "' width='475px' height='475px'></td><td bgcolor='lightgreen'>" .
                $c ["nombrelugarorigen"] . " (" . $c ["marorigen"] . ")<br><br><Img src='imglugares/"
                . $c ["imagenlugarorigen"] . ".png' width='475px' height='475px'></td></tr>";
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?>
</body>

</html>
