<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Capitulos De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <form action='OP29.php' method='post' style="text-align: center;">
        Nº Volumen-><input type="number" name="vol" min=1 max="200">
        Nº Capitulo-><input type="number" name="idcap" min=1 max="2000">
        <input type="text" name="minihistoria" placeholder="Minihistoria">
        <input type="text" name="tipoportada" placeholder="Tipo Portada">
        <input type="text" name="arco" placeholder="Arco"> <input type="text" name="saga" placeholder="Saga">
        <br><br><input type="submit" name="buscarcap" value="Buscar Capítulo">
    </form>
    <?php
try {
    if (isset($_POST["buscarcap"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM capitulos WHERE vol=? OR idcap=? OR minihistoria=? OR tipoportada=?OR arco=?OR saga=?");
        $res->bindParam(1, $_POST["vol"]); $res->bindParam(2, $_POST["idcap"]); $res->bindParam(3, $_POST["minihistoria"]);
        $res->bindParam(4, $_POST["tipoportada"]); $res->bindParam(5, $_POST["arco"]); $res->bindParam(6, $_POST["saga"]);
        $res->execute(); echo "<table><tr><th>Saga Principal y Volumen</th><th>Capitulo</th><th>Arco y Saga</th></tr>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) { echo "<tr><td bgcolor='lightgreen'>Mar ";
                if ($c["idcap"]<=597){echo "De La Supervivencia: Saga De Los Supernovas"; } else{echo "Final: Saga Del Nuevo Mundo"; }
                echo "<br><br>Volumen " . $c["vol"] . ": " . $c["nombrevolumen"] . "<br><br>Lanzamiento: " . $c["forigvol"] . " (" . 
                $c["vopag"] . " Paginas En Total)<br><br>Lanzamiento (En España): " . $c["fvol"] . " (" . $c["vpag"] . " Paginas En Total)
                <br><br><Img src='imgvoljuegospeli/Volumen " . $c["vol"] . ".png' width='450px'></td><td>Capítulo " .
                $c["idcap"] . ": " . $c["nombrecapitulo"] . "<br><br>" . $c["tipoportada"];
            if ($c["minihistoria"] != "Ninguna") { echo "<br><br>" . $c["minihistoria"]; }
            if ($c["nombreportada"] != "Ninguna") { echo ": " . $c["nombreportada"]; }
            echo "<br><br>Lanzamiento: " . $c["fcap"] . " (" . $c["npag"] . " Paginas)<br><Img src='imgcapitulos/Capitulo " .
                $c["idcap"]; if ($c["c"] == "C") { echo "C"; }
            echo ".png' width='450px'></td><td bgcolor='orange'>Arco " .$c["arco"] .
                "<br><br><Img src='imgvoljuegospeli/Arco " . $c["arco"] . ".png' width='450px'><br><br>Saga " . $c["saga"] .
                "<br><br><Img src='imgvoljuegospeli/Saga " . $c["saga"] . ".png' width='450px'></td></tr>";
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?>
</body>

</html>
