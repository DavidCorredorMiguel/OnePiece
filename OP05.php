<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Haki</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <form action='OP05.php' method='post' style="text-align: center;">
        <input type="text" name="tiposdehaki" placeholder="Tipo Haki">
        <input type="text" name="tipousuario" placeholder="Usuario (Canon/No Canon)">
        <input type="text" name="nivel" placeholder="Nivel Haki">
        <input type="text" name="usuariohaki" placeholder="Usuario Haki">
        <br><br><input type="submit" name="buscahaki" value="Buscar Haki">
    </form> <?php
try { if (isset($_POST["buscahaki"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM haki WHERE tiposdehaki=? OR tipousuario=? OR nivel=? OR usuariohaki=?");
        $res->bindParam(1, $_POST["tiposdehaki"]); $res->bindParam(2, $_POST["tipousuario"]); $res->bindParam(3, $_POST["nivel"]);
        $res->bindParam(4, $_POST["usuariohaki"]); $res->execute();
        echo "<table><tr><th>Tipo Haki y Técnica</th><th>Usuario Haki y Nivel</th></tr>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td bgcolor='orange'>" . $c["tiposdehaki"] . "<br><br>" . $c["nombreoriginaltecnica"] . " (" .
                $c["nombretecnica"] . ")<br><br><Img src='imghakiytecnicas/" . $c["imagentecnica"] .
                ".png' width='650px' height='650px'></td><td bgcolor='lightblue'>" . $c["usuariohaki"] . " (" .
                $c["tipousuario"] . ")<br><br>Nivel " . $c["nivel"] . "<br><br><Img src='imgpersonajes/" .
                $c["imagenusuariohaki"] . ".png' width='650px' height='650px'></td></tr>";
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?>
</body>

</html>
