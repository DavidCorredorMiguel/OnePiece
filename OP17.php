<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Grupos Del Gobierno</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <form action='OP17.php' method='post' style="text-align: center;">
        <input type="text" name="tiposdegrupos" placeholder="Tipo Grupo Gobierno">
        <input type="text" name="canon" placeholder="Subtipo (Canon/No Canon)">
        <input type="text" name="tipomiembro" placeholder="Tipo Miembro Gobierno">
        <input type="text" name="titulogrupo" placeholder="Titulo Grupo Gobierno">
        <input type="text" name="grupo" placeholder="Grupo Gobierno">
        <input type="text" name="anteriorgrupo" placeholder="Anterior Grupo">
        <input type="text" name="barco" placeholder="Barco"><br><br>
        <input type="submit" name="buscagrupogob" value="Buscar Grupo Gobierno">
    </form> <?php
try { if (isset($_POST["buscagrupogob"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM gruposgobierno WHERE tiposdegrupos=? OR canon=? OR tipomiembro=?
            OR titulogrupo=? OR grupo=? OR anteriorgrupo=? OR barco=?"); $res->bindParam(1, $_POST["tiposdegrupos"]);
        $res->bindParam(2, $_POST["canon"]); $res->bindParam(3, $_POST["tipomiembro"]); $res->bindParam(4, $_POST["titulogrupo"]);
        $res->bindParam(5, $_POST["grupo"]); $res->bindParam(6, $_POST["anteriorgrupo"]);
        $res->bindParam(7, $_POST["barco"]); $res->execute();
        echo "<table><tr><th>Titulo, Tipo y Miembro Grupo</th><th>Grupos</th><th>Barco</th></tr>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td bgcolor='orange'>".$c["tipomiembro"]." Del Grupo ".$c["tiposdegrupos"];
            if ($c["canon"]!="Si"){echo " (No Canon)"; } echo ": " . $c["miembrogrupo"]; if ($c["muerte"]!="No"){echo " (Fallecido/a)"; }
            echo "<br><span style='color: blue'>Ocupacion: </span>" . $c["titulogrupo"] . "<br><br><Img src='imgpersonajes/" .
                $c["imgmiembro"] . ".png' width='475px' height='475px'></td><td bgcolor='lightgreen'>" . $c["grupo"] .
                "<br><span style='color: blue'>Estado: </span>" . $c["estado"] . "<br><span style='color: blue'>Nº Miembros: </span>" .
                $c["miembros"] . "<br><br><Img src='imgrecygrupos/" . $c["imggrupo"] . ".png' width='475px' height='475px'><br><br>";
            if ($c["grupo"] != $c["anteriorgrupo"]) {
                echo $c["anteriorgrupo"] . "<br><br><Img src='imgrecygrupos/" . $c["imganteriorgrupo"] .
                    ".png' width='475px' height='475px'>";
            }
            echo "</td><td bgcolor='lightgreen'>" . $c["barco"] . "<br><br><Img src='imgrecygrupos/" . $c["imgbarco"] .
                ".png' width='475px' height='475px'></td></tr>";
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?>
</body>

</html>