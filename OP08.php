<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Lugares De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <form action='OP08.php' method='post' style="text-align: center;">
        <input type=" text" name="mar" placeholder="Mar"> <input type="text" name="nombreregion" placeholder="Region">
        <input type="text" name="tipolugar" placeholder="Tipo Lugar">
        <input type="text" name="subtipolugar" placeholder="Subtipo Lugar">
        <input type="text" name="climas" placeholder="Clima"> <input type="text" name="nombrelugar" placeholder="Lugar">
        <br><br><input type="submit" name="buscalugar" value="Buscar Lugar">
    </form>
    <?php
try {
    if (isset($_POST["buscalugar"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM geografia WHERE mar=? OR nombreregion=? OR tipolugar=? OR subtipolugar=? OR climas=?
            OR nombrelugar=?"); $res->bindParam(1, $_POST["mar"]); $res->bindParam(2, $_POST["nombreregion"]);
        $res->bindParam(3, $_POST["tipolugar"]); $res->bindParam(4, $_POST["subtipolugar"]); $res->bindParam(5, $_POST["climas"]);
        $res->bindParam(6, $_POST["nombrelugar"]); $res->execute();
        echo "<table><tr><th>Region y Mar</th><th>Tipo, Subtipo y Clima De Lugar</th><th>Lugar</th></tr>";
        while ($c = $res->fetch()) {
            echo "<tr><td bgcolor='orange'>" . $c["nombreregion"] . " (" . $c["mar"] . ")<br><br>
                <Img src='imglugares/" . $c["mar"] . ".png' width='600px' height='600px'></td>
                <td bgcolor='lightblue'>" . $c["tipolugar"] . " (" . $c["subtipolugar"] . ")<br><br>Clima " .
                $c["climas"] . "</td><td bgcolor='yellow'>" . $c["nombrelugar"] . "<br><br><Img src='imglugares/" . $c["imagenlugar"] . "' width='600px' height='600px'></td>";
        }
        echo "</table>";
        $res->closeCursor();
    }
} catch (Exception $e) {
    echo "¡Error! " . $e->getMessage();
} finally {
    $con = null;
}
?>
</body>

</html>
