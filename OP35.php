<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Videojuegos De OP</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
</head>

<body>
    <form action='OP35.php' method='post' style="margin-top: 10px; text-align: center;">
        <input type="text" name="nombrejuego" placeholder="Juego">
        <input type="text" name="plataforma" placeholder="Plataforma">
        <input type="text" name="genero" placeholder="Genero"> <input type="text" name="tipoNPC" placeholder="Tipo NPC">
        <br><br><input type="submit" name="buscarjuego" value="Buscar Videojuego">
    </form><?php try { if (isset($_POST["buscarjuego"])) { $con = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $con->exec("set character set utf8");
        $res = $con->prepare("SELECT * FROM videojuegos WHERE nombrejuego=? OR plataforma1=? OR plataforma2=? OR plataforma3=?
            OR genero=? OR tipoNPC=?"); $res->bindParam(1, $_POST["nombrejuego"]); $res->bindParam(2, $_POST["plataforma"]);
        $res->bindParam(3, $_POST["plataforma"]); $res->bindParam(4, $_POST["plataforma"]);
        $res->bindParam(5, $_POST["genero"]); $res->bindParam(6, $_POST["tipoNPC"]); $res->execute();
        echo "<table><tr><th>Videojuego y Plataforma/s</th><th>Género, Desarrollador y Editor</th>
            <th colspan='2'>Personaje Jugable y/o No Jugable (NPC)</th></tr>";
        while ($c = $res->fetch(PDO::FETCH_ASSOC)) {
            if ($c["spaj"] == "5" || $c["spaj"] == "6" || $c["spaj"] == "6V" || $c["spaj"] == "7"
                || $c["spaj"] == "7V" || $c["spaj"] == "8") {
                echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
                    $c["nombrejuego"] . "<br><div class='carousel-inner'><div class='carousel-item active'>"
                    . $c["plataforma1"] . "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                    $c["plataforma1"] . ".png' width='400px' height='400px'></div>";
                for ($p = 2; $p < 8; $p++) {
                    if ($c["plataforma$p"] != "Ninguna") {
                        echo "<div class='carousel-item'>" . $c["plataforma$p"] . "<br><img src='imgvoljuegospeli/" .
                            $c["nombrejuego"] . " " . $c["plataforma$p"] . ".png' width='400px' height='400px'></div>";
                    }
                }
                echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $c["genero"] .
                    "<br><br>Desarrollador: " . $c["desarrollador"] . "<br><br>Editor: " . $c["editor"] . "</td>";
                echo "<td bgcolor='lightblue'>Monkey D. Luffy<br><br>
                <Img src='imgpersonajes/Monkey D. Luffy.png' width='400px' height='400px'></td>
                <td bgcolor='orange'>NPC: Monkey D. Luffy (Aliado/a)<br><br>
                <Img src='imgpersonajes/Monkey D. Luffy.png' width='400px' height='400px'></td></tr>";
                echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
                    $c["nombrejuego"] . "<br><div class='carousel-inner'><div class='carousel-item active'>"
                    . $c["plataforma1"] . "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                    $c["plataforma1"] . ".png' width='400px' height='400px'></div>";
                for ($p = 2; $p < 8; $p++) {
                    if ($c["plataforma$p"] != "Ninguna") {
                        echo "<div class='carousel-item'>" . $c["plataforma$p"] .
                            "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                            $c["plataforma$p"] . ".png' width='400px' height='400px'></div>";
                    }
                }
                echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $c["genero"] .
                    "<br><br>Desarrollador: " . $c["desarrollador"] . "<br><br>Editor: " . $c["editor"] . "</td>";
                echo "<td bgcolor='lightblue'>Roronoa Zoro<br><br>
                <Img src='imgpersonajes/Roronoa Zoro.png' width='400px' height='400px'></td>
                <td bgcolor='orange'>NPC: Roronoa Zoro (Aliado/a)<br><br>
                <Img src='imgpersonajes/Roronoa Zoro.png' width='400px' height='400px'></td></tr>";
                echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
                    $c["nombrejuego"] . "<br><div class='carousel-inner'><div class='carousel-item active'>"
                    . $c["plataforma1"] . "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                    $c["plataforma1"] . ".png' width='400px' height='400px'></div>";
                for ($p = 2; $p < 8; $p++) {
                    if ($c["plataforma$p"] != "Ninguna") {
                        echo "<div class='carousel-item'>" . $c["plataforma$p"] .
                            "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                            $c["plataforma$p"] . ".png' width='400px' height='400px'></div>";
                    }
                }
                echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $c["genero"] .
                    "<br><br>Desarrollador: " . $c["desarrollador"] . "<br><br>Editor: " . $c["editor"] . "</td>";
                echo "<td bgcolor='lightblue'>Nami<br><br><Img src='imgpersonajes/Nami.png'
                width='400px' height='400px'></td><td bgcolor='orange'>NPC: Nami (Aliado/a)<br><br>
                <Img src='imgpersonajes/Nami.png' width='400px' height='400px'></td></tr>";
                echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
                    $c["nombrejuego"] . "<br><div class='carousel-inner'><div class='carousel-item active'>"
                    . $c["plataforma1"] . "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                    $c["plataforma1"] . ".png' width='400px' height='400px'></div>";
                for ($p = 2; $p < 8; $p++) {
                    if ($c["plataforma$p"] != "Ninguna") {
                        echo "<div class='carousel-item'>" . $c["plataforma$p"] .
                            "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                            $c["plataforma$p"] . ".png' width='400px' height='400px'></div>";
                    }
                }
                echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                    data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                    data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $c["genero"] .
                    "<br><br>Desarrollador: " . $c["desarrollador"] . "<br><br>Editor: " . $c["editor"] . "</td>";
                echo "<td bgcolor='lightblue'>Usopp<br><br><Img src='imgpersonajes/Usopp.png' width='400px'
                    height='400px'></td><td bgcolor='orange'>NPC: Usopp (Aliado/a)<br><br>
                    <Img src='imgpersonajes/Usopp.png' width='400px' height='400px'></td></tr>";
                echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
                    $c["nombrejuego"] . "<br><div class='carousel-inner'><div class='carousel-item active'>"
                    . $c["plataforma1"] . "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                    $c["plataforma1"] . ".png' width='400px' height='400px'></div>";
                for ($p = 2; $p < 8; $p++) {
                    if ($c["plataforma$p"] != "Ninguna") {
                        echo "<div class='carousel-item'>" . $c["plataforma$p"] .
                            "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                            $c["plataforma$p"] . ".png' width='400px' height='400px'></div>";
                    }
                }
                echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                    data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                    data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $c["genero"] .
                    "<br><br>Desarrollador: " . $c["desarrollador"] . "<br><br>Editor: " . $c["editor"] . "</td>";
                echo "<td bgcolor='lightblue'>Sanji<br><br><Img src='imgpersonajes/Sanji.png' width='400px'
                    height='400px'></td><td bgcolor='orange'>NPC: Sanji (Aliado/a)<br><br>
                    <Img src='imgpersonajes/Sanji.png' width='400px' height='400px'></td></tr>";
            }
            if ($c["spaj"] == "6" || $c["spaj"] == "7" || $c["spaj"] == "7V" || $c["spaj"] == "8") {
                echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
                    $c["nombrejuego"] . "<br><div class='carousel-inner'><div class='carousel-item active'>"
                    . $c["plataforma1"] . "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                    $c["plataforma1"] . ".png' width='400px' height='400px'></div>";
                for ($p = 2; $p < 8; $p++) {
                    if ($c["plataforma$p"] != "Ninguna") {
                        echo "<div class='carousel-item'>" . $c["plataforma$p"] .
                            "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                            $c["plataforma$p"] . ".png' width='400px' height='400px'></div>";
                    }
                }
                echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $c["genero"] .
                    "<br><br>Desarrollador: " . $c["desarrollador"] . "<br><br>Editor: " . $c["editor"] . "</td>";
                echo "<td bgcolor='lightblue'>Tony Tony Chopper<br><br>
                <Img src='imgpersonajes/Tony Tony Chopper.png' width='400px' height='400px'></td>
                <td bgcolor='orange'>NPC: Tony Tony Chopper (Aliado/a)<br><br>
                <Img src='imgpersonajes/Tony Tony Chopper.png' width='400px' height='400px'></td></tr>";
            }
            if ($c["spaj"] == "7" || $c["spaj"] == "7V" || $c["spaj"] == "8") {
                echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
                    $c["nombrejuego"] . "<br><div class='carousel-inner'><div class='carousel-item active'>"
                    . $c["plataforma1"] . "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                    $c["plataforma1"] . ".png' width='400px' height='400px'></div>";
                for ($p = 2; $p < 8; $p++) {
                    if ($c["plataforma$p"] != "Ninguna") {
                        echo "<div class='carousel-item'>" . $c["plataforma$p"] .
                            "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                            $c["plataforma$p"] . ".png' width='400px' height='400px'></div>";
                    }
                }
                echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $c["genero"] .
                    "<br><br>Desarrollador: " . $c["desarrollador"] . "<br><br>Editor: " . $c["editor"] . "</td>";
                echo "<td bgcolor='lightblue'>Nico Robin<br><br><Img src='imgpersonajes/Nico Robin.png' width='400px'
                height='400px'></td><td bgcolor='orange'>NPC: Nico Robin (Aliado/a)<br><br>
                <Img src='imgpersonajes/Nico Robin.png' width='400px' height='400px'></td></tr>";
            }
            if ($c["spaj"] == "8") {
                echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
                    $c["nombrejuego"] . "<br><div class='carousel-inner'><div class='carousel-item active'>"
                    . $c["plataforma1"] . "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                    $c["plataforma1"] . ".png' width='400px' height='400px'></div>";
                for ($p = 2; $p < 8; $p++) {
                    if ($c["plataforma$p"] != "Ninguna") {
                        echo "<div class='carousel-item'>" . $c["plataforma$p"] .
                            "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                            $c["plataforma$p"] . ".png' width='400px' height='400px'></div>";
                    }
                }
                echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $c["genero"] .
                    "<br><br>Desarrollador: " . $c["desarrollador"] . "<br><br>Editor: " . $c["editor"] . "</td>";
                echo "<td bgcolor='lightblue'>Franky<br><br><Img src='imgpersonajes/Franky.png' width='400px'
                height='400px'></td><td bgcolor='orange'>NPC: Franky (Aliado/a)<br><br>
                <Img src='imgpersonajes/Franky.png' width='400px' height='400px'></td></tr>";
            }
            if ($c["spaj"] == "6V" || $c["spaj"] == "7V") {
                echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
                    $c["nombrejuego"] . "<br><div class='carousel-inner'><div class='carousel-item active'>"
                    . $c["plataforma1"] . "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                    $c["plataforma1"] . ".png' width='400px' height='400px'></div>";
                for ($p = 2; $p < 8; $p++) {
                    if ($c["plataforma$p"] != "Ninguna") {
                        echo "<div class='carousel-item'>" . $c["plataforma$p"] .
                            "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                            $c["plataforma$p"] . ".png' width='400px' height='400px'></div>";
                    }
                }
                echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $c["genero"] .
                    "<br><br>Desarrollador: " . $c["desarrollador"] . "<br><br>Editor: " . $c["editor"] . "</td>";
                echo "<td bgcolor='lightblue'>Nefertari Vivi<br><br><Img src='imgpersonajes/Nefertari Vivi.png'
                width='400px' height='400px'></td><td bgcolor='orange'>NPC: Nefertari Vivi (Aliado/a)<br><br>
                <Img src='imgpersonajes/Nefertari Vivi.png' width='400px' height='400px'></td></tr>";
            }
            if ($c["spaj"] != "7") {
                echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
                    $c["nombrejuego"] . "<br><div class='carousel-inner'><div class='carousel-item active'>"
                    . $c["plataforma1"] . "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                    $c["plataforma1"] . ".png' width='400px' height='400px'></div>";
                for ($p = 2; $p < 8; $p++) {
                    if ($c["plataforma$p"] != "Ninguna") {
                        echo "<div class='carousel-item'>" . $c["plataforma$p"] .
                            "<br><img src='imgvoljuegospeli/" . $c["nombrejuego"] . " " .
                            $c["plataforma$p"] . ".png' width='400px' height='400px'></div>";
                    }
                }
                echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $c["genero"] .
                    "<br><br>Desarrollador: " . $c["desarrollador"] . "<br><br>Editor: " . $c["editor"] . "</td>";
                if ($c["spaj"] == "7J") {
                    echo "<td bgcolor='lightblue'><div id='cc' class='carousel slide'
                    data-ride='carousel'><div class='carousel-inner'><div class='carousel-item active'>" .
                        $c["pjugable"] . "<br><br><Img src='imgpersonajes/" . $c["imgpjugable"] .
                        ".png' width='400px' height='400px'></div><div class='carousel-item'>Monkey D. Luffy<br><br>
                    <Img src='imgpersonajes/Monkey D. Luffy.png' width='400px' height='400px'></div>
                    <div class='carousel-item'>Roronoa Zoro<br><br>
                    <Img src='imgpersonajes/Roronoa Zoro.png' width='400px' height='400px'></div>
                    <div class='carousel-item'>Nami<br><br>
                    <Img src='imgpersonajes/Nami.png' width='400px' height='400px'></div>
                    <div class='carousel-item'>Usopp<br><br>
                    <Img src='imgpersonajes/Usopp.png' width='400px' height='400px'></div>
                    <div class='carousel-item'>Sanji<br><br>
                    <Img src='imgpersonajes/Sanji.png' width='400px' height='400px'></div>
                    <div class='carousel-item'>Tony Tony Chopper<br><br>
                    <Img src='imgpersonajes/Tony Tony Chopper.png' width='400px' height='400px'></div>
                    <div class='carousel-item'>Nefertari Vivi<br><br>
                    <Img src='imgpersonajes/Nefertari Vivi.png' width='400px' height='400px'></div>
                    </div></td><td bgcolor='orange'>NPC: " . $c["NPC"] . " (" .
                        $c["tipoNPC"] . ")<br><br><Img src='imgpersonajes/" . $c["imgNPC"] .
                        ".png' width='400px' height='400px'></td></tr>";
                }
                if ($c["spaj"] == "8J" || $c["spaj"] == "9J" || $c["spaj"] == "10J") {
                    echo "<td bgcolor='lightblue'><div id='cc' class='carousel slide'
                    data-ride='carousel'><div class='carousel-inner'><div class='carousel-item active'>" .
                        $c["pjugable"] . "<br><br><Img src='imgpersonajes/" . $c["imgpjugable"] .
                        ".png' width='400px' height='400px'></div><div class='carousel-item'>Monkey D. Luffy<br><br>
                    <Img src='imgpersonajes/Monkey D. Luffy.png' width='400px' height='400px'></div>
                    <div class='carousel-item'>Roronoa Zoro<br><br>
                    <Img src='imgpersonajes/Roronoa Zoro.png' width='400px' height='400px'></div>
                    <div class='carousel-item'>Nami<br><br>
                    <Img src='imgpersonajes/Nami.png' width='400px' height='400px'></div>
                    <div class='carousel-item'>Usopp<br><br>
                    <Img src='imgpersonajes/Usopp.png' width='400px' height='400px'></div>
                    <div class='carousel-item'>Sanji<br><br>
                    <Img src='imgpersonajes/Sanji.png' width='400px' height='400px'></div>
                    <div class='carousel-item'>Tony Tony Chopper<br><br>
                    <Img src='imgpersonajes/Tony Tony Chopper.png' width='400px' height='400px'></div>
                    <div class='carousel-item'>Franky<br><br>
                    <Img src='imgpersonajes/Franky.png' width='400px' height='400px'></div>";
                }
                if ($c["spaj"] == "9J" || $c["spaj"] == "10J") {
                    echo "<div class='carousel-item'>Brook<br><br>
                    <Img src='imgpersonajes/Brook.png' width='400px' height='400px'></div>";
                }
                if ($c["spaj"] == "10J") {
                    echo "<div class='carousel-item'>Jinbe<br><br>
                    <Img src='imgpersonajes/Jinbe.png' width='400px' height='400px'></div>";
                }
                if ($c["spaj"] == "8J" || $c["spaj"] == "9J" || $c["spaj"] == "10J") {
                    echo "</div></td><td bgcolor='orange'>NPC: " . $c["NPC"] . " (" .
                        $c["tipoNPC"] . ")<br><br><Img src='imgpersonajes/" . $c["imgNPC"] .
                        ".png' width='400px' height='400px'></td></tr>";
                }
                if($c["spaj"] != "7J" && $c["spaj"] != "8J" && $c["spaj"] != "9J" && $c["spaj"] != "10J") {
                    if ($c["NPC"] == "Ninguno Mas") {
                        echo "<td bgcolor='lightblue' colspan='2'>" . $c["pjugable"] . "<br><br>
                            <Img src='imgpersonajes/" . $c["imgpjugable"] . ".png' width='400px' height='400px'>
                            </td>";
                    }
                    if ($c["pjugable"] == "Ninguno Mas") {
                        echo "<td bgcolor='orange' colspan='2'>NPC: " . $c["NPC"] . " (" . $c["tipoNPC"] .
                            ")<br><br><Img src='imgpersonajes/" . $c["imgNPC"] . ".png' width='400px' height='400px'>
                            </td></tr>";
                    }
                    if ($c["pjugable"] != "Ninguno Mas" && $c["NPC"] != "Ninguno Mas") {
                        echo "<td bgcolor='lightblue'>" . $c["pjugable"] . "<br><br><Img src='imgpersonajes/" .
                            $c["imgpjugable"] . ".png' width='400px' height='400px'></td><td bgcolor='orange'>
                <div id='cc' class='carousel slide' data-ride='carousel'>
                <div class='carousel-inner'><div class='carousel-item active'>NPC: " . $c["NPC"] . " (" .
                            $c["tipoNPC"] . ")<br><br><Img src='imgpersonajes/" . $c["imgNPC"] .
                            ".png' width='400px' height='400px'></div>";
                        if ($c["spaj"] == "5VZ" || $c["spaj"] == "6C") {
                            echo "<div class='carousel-item'>NPC: Monkey D. Luffy (Aliado/a)<br><br>
                            <Img src='imgpersonajes/Monkey D. Luffy.png' width='400px' height='400px'></div>
                            <div class='carousel-item'>NPC: Roronoa Zoro (Aliado/a)<br><br>
                            <Img src='imgpersonajes/Roronoa Zoro.png' width='400px' height='400px'></div>
                            <div class='carousel-item'>NPC: Nami (Aliado/a)<br><br>
                            <Img src='imgpersonajes/Nami.png' width='400px' height='400px'></div>
                            <div class='carousel-item'>NPC: Usopp (Aliado/a)<br><br>
                            <Img src='imgpersonajes/Usopp.png' width='400px' height='400px'></div>
                            <div class='carousel-item'>NPC: Sanji (Aliado/a)<br><br>
                            <Img src='imgpersonajes/Sanji.png' width='400px' height='400px'></div>
                            <div class='carousel-item'>NPC: Tony Tony Chopper (Aliado/a)<br><br>
                            <Img src='imgpersonajes/Tony Tony Chopper.png' width='400px' height='400px'></div>";
                        }
                        if ($c["spaj"] == "5VZ") {
                            echo "<div class='carousel-item'>NPC: Nefertari Vivi (Aliado/a)<br><br>
                            <Img src='imgpersonajes/Nefertari Vivi.png' width='400px' height='400px'></div>";
                        }
                        if ($c["spaj"] == "6C") {
                            echo "<div class='carousel-item'>NPC: Nico Robin (Aliado/a)<br><br>
                            <Img src='imgpersonajes/Nico Robin.png' width='400px' height='400px'></div>";
                        }
                        if ($c["spaj"] == "7NJ") {
                            echo "<div class='carousel-item'>NPC: Nami (Dialogo)<br><br>
                            <Img src='imgpersonajes/Nami.png' width='400px' height='400px'></div>
                            <div class='carousel-item'>NPC: Usopp (Dialogo)<br><br>
                            <Img src='imgpersonajes/Usopp.png' width='400px' height='400px'></div>
                            <div class='carousel-item'>NPC: Sanji (Dialogo)<br><br>
                            <Img src='imgpersonajes/Sanji.png' width='400px' height='400px'></div>
                            <div class='carousel-item'>NPC: Tony Tony Chopper (Dialogo)<br><br>
                            <Img src='imgpersonajes/Tony Tony Chopper.png' width='400px' height='400px'></div>
                            <div class='carousel-item'>NPC: Nico Robin (Dialogo)<br><br>
                            <Img src='imgpersonajes/Nico Robin.png' width='400px' height='400px'></div>
                            <div class='carousel-item'>NPC: Franky (Dialogo)<br><br>
                            <Img src='imgpersonajes/Franky.png' width='400px' height='400px'></div>
                            <div class='carousel-item'>NPC: Brook (Dialogo)<br><br>
                            <Img src='imgpersonajes/Brook.png' width='400px' height='400px'></div>";
                        }
                        echo "</div></td></tr>";
                    }
                }
            }
        } echo "</table>"; $res->closeCursor();
    }
} catch (Exception $e) { echo "¡Error! " . $e->getMessage(); } finally { $con = null; } ?> </body>

</html>
