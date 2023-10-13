<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Episodios De One Piece</title>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
</head>

<body>
    <form action='OP32.php' method='post' style="text-align: center;">
        Nº Temporada-><input type="number" name="temp" min=1 max="30">
        Nº Episodio-><input type="number" name="idep" min=1 max="2000">
        <input type="text" name="cep" placeholder="Episodio Canon (Si/No)">
        <input type="text" name="arco" placeholder="Arco">
        <input type="text" name="carc" placeholder="Arco Canon (Si/No)">
        <input type="text" name="saga" placeholder="Saga">
        <br><br><input type="submit" name="buscarep" value="Buscar Episodio">
    </form>
    <?php
try {
    if (isset($_POST["buscarep"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM episodios WHERE temp=? OR idep=? OR cep=? OR carc=? OR arco=? OR saga=?");
        $res->bindParam(1, $_POST["temp"]); $res->bindParam(2, $_POST["idep"]); $res->bindParam(3, $_POST["cep"]);
        $res->bindParam(4, $_POST["carc"]); $res->bindParam(5, $_POST["arco"]); $res->bindParam(6, $_POST["saga"]); $res->execute();
        echo "<table><tr><th>Saga Principal y Episodio</th><th>Opening y/o Ending</th><th>Arco y Saga</th></tr>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) { echo "<tr><td id='ng'>Mar ";
            if ($c["idep"]<=516){echo "De La Supervivencia: Saga De Los Supernovas"; } else{echo "Final: Saga Del Nuevo Mundo"; }
            echo "<br><br>" . $c["temp"] . "ª Temporada: Episodio " . $c["idep"];
            if ($c["cep"] == "No") { echo " (No Canon)"; }
            echo "<br><br>" . $c["nombreepisodio"] . "<br><br>Estreno: ".$c["forigep"]."<br><br><Img src='imgepisodios/Episodio " .
                $c["idep"] . ".png' width='400px'></td><td bgcolor='orange'>Opening " . $c["opening"] .
                "<br><br><Img src='imgvoljuegospeli/Opening " . $c["opening"] . ".png' width='400px'>";
            if ($c["ending"] != "Ninguno") {
                echo "<br><br>Ending " .$c["ending"]."<br><br><Img src='imgvoljuegospeli/".$c["imagenending"].".png' width='400px'>";
            }
            echo "</td><td bgcolor='orange'>Arco " . $c["arco"]; if ($c["carc"] == "No") { echo " (No Canon)"; }
            echo "<br><br><Img src='imgvoljuegospeli/Arco " . $c["arco"] . ".png' width='400px'><br><br>Saga " . $c["saga"] .
                "<br><br><Img src='imgvoljuegospeli/Saga " . $c["saga"] . ".png' width='400px'></td></tr>";
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?>
</body>

</html>
