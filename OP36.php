<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Videojuegos De One Piece</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../ModelosEstilos/CSS2.css">
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
</head>

<body> <?php $con = new mysqli("localhost", "root", "", "onepiecedb"); if (!($res = $con->stmt_init())) { die(mysqli_connect_error());}
if (!isset($_GET["pag"])) { $pag = 1; } else { $pag = $_GET["pag"]; } $resultadopag = 100;
$res->prepare("select count(*) as 'total' from videojuegos"); $res->execute(); $res->bind_result($total);
$fila = $res->fetch(); $numpag = ceil($total / $resultadopag); $pagactual = ($pag - 1) * $resultadopag;
$res->prepare("select * from videojuegos LIMIT " . $pagactual . ", " . $resultadopag); $res->execute();
$res->bind_result($spaj, $nombrejuego, $plataforma1, $plataforma2, $plataforma3, $plataforma4, $plataforma5, $plataforma6, $plataforma7,
$genero, $desarrollador, $editor, $pjugable, $imgpjugable, $tipoNPC, $NPC, $imgNPC);
echo "<table><tr><th>Videojuego y Plataforma/s</th><th>Género, Desarrollador y Editor</th>
    <th colspan='2'>Personaje Jugable y/o No Jugable (NPC)</th></tr>";
while ($res->fetch()) {
    if ($spaj == "5" || $spaj == "6" || $spaj == "6V" || $spaj == "7"
        || $spaj == "7V" || $spaj == "8") {
        echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" . $nombrejuego .
            "<br><div class='carousel-inner'><div class='carousel-item active'>" . $plataforma1 .
            "<br><img src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma1 . ".png' width='400px' height='400px'></div>";
        if ($plataforma2 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma2 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma2 . ".png' width='400px' height='400px'></div>";
            if ($plataforma3 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma3 . "<br><br><br><img src='imgvoljuegospeli/" .
                    $nombrejuego . " " . $plataforma3 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma4 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma4 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma4 . ".png' width='400px' height='400px'></div>";
            if ($plataforma5 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma5 . "<br><br><br><img src='imgvoljuegospeli/" . $nombrejuego . " " .
                $plataforma5 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma6 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma6 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma6 . ".png' width='400px' height='400px'></div>";
            if ($plataforma7 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma7 . "<br><br><br><img src='imgvoljuegospeli/" . $nombrejuego . " " .
                $plataforma7 . ".png' width='400px' height='400px'></div>";
            }
        }
        echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $genero .
            "<br><br>Desarrollador: " . $desarrollador . "<br><br>Editor: " . $editor . "</td>";
        echo "<td bgcolor='lightblue'>Monkey D. Luffy<br><br>
                <Img src='imgpersonajes/Monkey D. Luffy.png' width='400px' height='400px'></td>
                <td bgcolor='orange'>NPC: Monkey D. Luffy (Aliado/a)<br><br>
                <Img src='imgpersonajes/Monkey D. Luffy.png' width='400px' height='400px'></td></tr>";
        echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
            $nombrejuego . "<br><div class='carousel-inner'><div class='carousel-item active'>"
            . $plataforma1 . "<br><img src='imgvoljuegospeli/" . $nombrejuego . " " .
            $plataforma1 . ".png' width='400px' height='400px'></div>";
        if ($plataforma2 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma2 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma2 . ".png' width='400px' height='400px'></div>";
            if ($plataforma3 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma3 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma3 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma4 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma4 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma4 . ".png' width='400px' height='400px'></div>";
            if ($plataforma5 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma5 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma5 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma6 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma6 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma6 . ".png' width='400px' height='400px'></div>";
            if ($plataforma7 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma7 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma7 . ".png' width='400px' height='400px'></div>";
            }
        }
        echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $genero .
            "<br><br>Desarrollador: " . $desarrollador . "<br><br>Editor: " . $editor . "</td>";
        echo "<td bgcolor='lightblue'>Roronoa Zoro<br><br>
                <Img src='imgpersonajes/Roronoa Zoro.png' width='400px' height='400px'></td>
                <td bgcolor='orange'>NPC: Roronoa Zoro (Aliado/a)<br><br>
                <Img src='imgpersonajes/Roronoa Zoro.png' width='400px' height='400px'></td></tr>";
        echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
            $nombrejuego . "<br><div class='carousel-inner'><div class='carousel-item active'>"
            . $plataforma1 . "<br><img src='imgvoljuegospeli/" . $nombrejuego . " " .
            $plataforma1 . ".png' width='400px' height='400px'></div>";
        if ($plataforma2 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma2 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma2 . ".png' width='400px' height='400px'></div>";
            if ($plataforma3 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma3 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma3 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma4 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma4 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma4 . ".png' width='400px' height='400px'></div>";
            if ($plataforma5 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma5 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma5 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma6 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma6 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma6 . ".png' width='400px' height='400px'></div>";
            if ($plataforma7 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma7 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma7 . ".png' width='400px' height='400px'></div>";
            }
        }
        echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $genero .
            "<br><br>Desarrollador: " . $desarrollador . "<br><br>Editor: " . $editor . "</td>";
        echo "<td bgcolor='lightblue'>Nami<br><br><Img src='imgpersonajes/Nami.png'
                width='400px' height='400px'></td><td bgcolor='orange'>NPC: Nami (Aliado/a)<br><br>
                <Img src='imgpersonajes/Nami.png' width='400px' height='400px'></td></tr>";
        echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
            $nombrejuego . "<br><div class='carousel-inner'><div class='carousel-item active'>"
            . $plataforma1 . "<br><img src='imgvoljuegospeli/" . $nombrejuego . " " .
            $plataforma1 . ".png' width='400px' height='400px'></div>";
        if ($plataforma2 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma2 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma2 . ".png' width='400px' height='400px'></div>";
            if ($plataforma3 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma3 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma3 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma4 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma4 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma4 . ".png' width='400px' height='400px'></div>";
            if ($plataforma5 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma5 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma5 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma6 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma6 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma6 . ".png' width='400px' height='400px'></div>";
            if ($plataforma7 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma7 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma7 . ".png' width='400px' height='400px'></div>";
            }
        }
        echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                    data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                    data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $genero .
            "<br><br>Desarrollador: " . $desarrollador . "<br><br>Editor: " . $editor . "</td>";
        echo "<td bgcolor='lightblue'>Usopp<br><br><Img src='imgpersonajes/Usopp.png' width='400px'
                    height='400px'></td><td bgcolor='orange'>NPC: Usopp (Aliado/a)<br><br>
                    <Img src='imgpersonajes/Usopp.png' width='400px' height='400px'></td></tr>";
        echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
            $nombrejuego . "<br><div class='carousel-inner'><div class='carousel-item active'>"
            . $plataforma1 . "<br><img src='imgvoljuegospeli/" . $nombrejuego . " " .
            $plataforma1 . ".png' width='400px' height='400px'></div>";
        if ($plataforma2 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma2 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma2 . ".png' width='400px' height='400px'></div>";
            if ($plataforma3 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma3 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma3 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma4 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma4 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma4 . ".png' width='400px' height='400px'></div>";
            if ($plataforma5 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma5 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma5 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma6 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma6 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma6 . ".png' width='400px' height='400px'></div>";
            if ($plataforma7 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma7 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma7 . ".png' width='400px' height='400px'></div>";
            }
        }
        echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                    data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                    data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $genero .
            "<br><br>Desarrollador: " . $desarrollador . "<br><br>Editor: " . $editor . "</td>";
        echo "<td bgcolor='lightblue'>Sanji<br><br><Img src='imgpersonajes/Sanji.png' width='400px'
                    height='400px'></td><td bgcolor='orange'>NPC: Sanji (Aliado/a)<br><br>
                    <Img src='imgpersonajes/Sanji.png' width='400px' height='400px'></td></tr>";
    }
    if ($spaj == "6" || $spaj == "7" || $spaj == "7V" || $spaj == "8") {
        echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
            $nombrejuego . "<br><div class='carousel-inner'><div class='carousel-item active'>"
            . $plataforma1 . "<br><img src='imgvoljuegospeli/" . $nombrejuego . " " .
            $plataforma1 . ".png' width='400px' height='400px'></div>";
        if ($plataforma2 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma2 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma2 . ".png' width='400px' height='400px'></div>";
            if ($plataforma3 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma3 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma3 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma4 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma4 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma4 . ".png' width='400px' height='400px'></div>";
            if ($plataforma5 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma5 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma5 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma6 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma6 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma6 . ".png' width='400px' height='400px'></div>";
            if ($plataforma7 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma7 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma7 . ".png' width='400px' height='400px'></div>";
            }
        }
        echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $genero .
            "<br><br>Desarrollador: " . $desarrollador . "<br><br>Editor: " . $editor . "</td>";
        echo "<td bgcolor='lightblue'>Tony Tony Chopper<br><br>
                <Img src='imgpersonajes/Tony Tony Chopper.png' width='400px' height='400px'></td>
                <td bgcolor='orange'>NPC: Tony Tony Chopper (Aliado/a)<br><br>
                <Img src='imgpersonajes/Tony Tony Chopper.png' width='400px' height='400px'></td></tr>";
    }
    if ($spaj == "7" || $spaj == "7V" || $spaj == "8") {
        echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
            $nombrejuego . "<br><div class='carousel-inner'><div class='carousel-item active'>"
            . $plataforma1 . "<br><img src='imgvoljuegospeli/" . $nombrejuego . " " .
            $plataforma1 . ".png' width='400px' height='400px'></div>";
        if ($plataforma2 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma2 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma2 . ".png' width='400px' height='400px'></div>";
            if ($plataforma3 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma3 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma3 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma4 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma4 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma4 . ".png' width='400px' height='400px'></div>";
            if ($plataforma5 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma5 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma5 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma6 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma6 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma6 . ".png' width='400px' height='400px'></div>";
            if ($plataforma7 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma7 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma7 . ".png' width='400px' height='400px'></div>";
            }
        }
        echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $genero .
            "<br><br>Desarrollador: " . $desarrollador . "<br><br>Editor: " . $editor . "</td>";
        echo "<td bgcolor='lightblue'>Nico Robin<br><br><Img src='imgpersonajes/Nico Robin.png' width='400px'
                height='400px'></td><td bgcolor='orange'>NPC: Nico Robin (Aliado/a)<br><br>
                <Img src='imgpersonajes/Nico Robin.png' width='400px' height='400px'></td></tr>";
    }
    if ($spaj == "8") {
        echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
            $nombrejuego . "<br><div class='carousel-inner'><div class='carousel-item active'>"
            . $plataforma1 . "<br><img src='imgvoljuegospeli/" . $nombrejuego . " " .
            $plataforma1 . ".png' width='400px' height='400px'></div>";
        if ($plataforma2 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma2 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma2 . ".png' width='400px' height='400px'></div>";
            if ($plataforma3 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma3 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma3 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma4 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma4 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma4 . ".png' width='400px' height='400px'></div>";
            if ($plataforma5 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma5 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma5 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma6 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma6 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma6 . ".png' width='400px' height='400px'></div>";
            if ($plataforma7 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma7 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma7 . ".png' width='400px' height='400px'></div>";
            }
        }
        echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $genero .
            "<br><br>Desarrollador: " . $desarrollador . "<br><br>Editor: " . $editor . "</td>";
        echo "<td bgcolor='lightblue'>Franky<br><br><Img src='imgpersonajes/Franky.png' width='400px'
                height='400px'></td><td bgcolor='orange'>NPC: Franky (Aliado/a)<br><br>
                <Img src='imgpersonajes/Franky.png' width='400px' height='400px'></td></tr>";
    }
    if ($spaj == "6V" || $spaj == "7V") {
        echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
            $nombrejuego . "<br><div class='carousel-inner'><div class='carousel-item active'>"
            . $plataforma1 . "<br><img src='imgvoljuegospeli/" . $nombrejuego . " " .
            $plataforma1 . ".png' width='400px' height='400px'></div>";
        if ($plataforma2 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma2 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma2 . ".png' width='400px' height='400px'></div>";
            if ($plataforma3 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma3 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma3 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma4 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma4 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma4 . ".png' width='400px' height='400px'></div>";
            if ($plataforma5 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma5 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma5 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma6 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma6 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma6 . ".png' width='400px' height='400px'></div>";
            if ($plataforma7 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma7 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma7 . ".png' width='400px' height='400px'></div>";
            }
        }
        echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $genero .
            "<br><br>Desarrollador: " . $desarrollador . "<br><br>Editor: " . $editor . "</td>";
        echo "<td bgcolor='lightblue'>Nefertari Vivi<br><br><Img src='imgpersonajes/Nefertari Vivi.png'
                width='400px' height='400px'></td><td bgcolor='orange'>NPC: Nefertari Vivi (Aliado/a)<br><br>
                <Img src='imgpersonajes/Nefertari Vivi.png' width='400px' height='400px'></td></tr>";
    }
    if ($spaj != "7") {
        echo "<tr><td><div id='cc' class='carousel slide' data-ride='carousel'>" .
            $nombrejuego . "<br><div class='carousel-inner'><div class='carousel-item active'>"
            . $plataforma1 . "<br><img src='imgvoljuegospeli/" . $nombrejuego . " " .
            $plataforma1 . ".png' width='400px' height='400px'></div>";
        if ($plataforma2 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma2 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma2 . ".png' width='400px' height='400px'></div>";
            if ($plataforma3 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma3 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma3 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma4 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma4 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma4 . ".png' width='400px' height='400px'></div>";
            if ($plataforma5 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma5 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma5 . ".png' width='400px' height='400px'></div>";
            }
        }
        if ($plataforma6 != "Ninguna") {
            echo "<div class='carousel-item'>" . $plataforma6 . "<br><img src='imgvoljuegospeli/" .
                $nombrejuego . " " . $plataforma6 . ".png' width='400px' height='400px'></div>";
            if ($plataforma7 != "Ninguna") {
                echo "<div class='carousel-item'>" . $plataforma7 . "<br><br><img
            src='imgvoljuegospeli/" . $nombrejuego . " " . $plataforma7 . ".png' width='400px' height='400px'></div>";
            }
        }
        echo "</div><a class='carousel-control-prev' href='#cc' role='button'
                data-slide='prev'></a><a class='carousel-control-next' href='#cc' role='button'
                data-slide='next'></a></div></td><td bgcolor='lightgreen'>Género/s: " . $genero .
            "<br><br>Desarrollador: " . $desarrollador . "<br><br>Editor: " . $editor . "</td>";
        if ($spaj == "7J") {
            echo "<td bgcolor='lightblue'><div id='cc' class='carousel slide'
                    data-ride='carousel'><div class='carousel-inner'><div class='carousel-item active'>" .
                $pjugable . "<br><br><Img src='imgpersonajes/" . $imgpjugable .
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
                    </div></td><td bgcolor='orange'>NPC: " . $NPC . " (" .
                $tipoNPC . ")<br><br><Img src='imgpersonajes/" . $imgNPC .
                ".png' width='400px' height='400px'></td></tr>";
        }
        if ($spaj == "8J" || $spaj == "9J" || $spaj == "10J") {
            echo "<td bgcolor='lightblue'><div id='cc' class='carousel slide'
                    data-ride='carousel'><div class='carousel-inner'><div class='carousel-item active'>" .
                $pjugable . "<br><br><Img src='imgpersonajes/" . $imgpjugable .
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
        if ($spaj == "9J" || $spaj == "10J") {
            echo "<div class='carousel-item'>Brook<br><br>
                    <Img src='imgpersonajes/Brook.png' width='400px' height='400px'></div>";
        }
        if ($spaj == "10J") {
            echo "<div class='carousel-item'>Jinbe<br><br>
                    <Img src='imgpersonajes/Jinbe.png' width='400px' height='400px'></div>";
        }
        if ($spaj == "8J" || $spaj == "9J" || $spaj == "10J") {
            echo "</div></td><td bgcolor='orange'>NPC: " . $NPC . " (" .
                $tipoNPC . ")<br><br><Img src='imgpersonajes/" . $imgNPC .
                ".png' width='400px' height='400px'></td></tr>";
        }
        if ($spaj != "7J" && $spaj != "8J" && $spaj != "9J" && $spaj != "10J") {
            if ($NPC == "Ninguno Mas") {
                echo "<td bgcolor='lightblue' colspan='2'>" . $pjugable . "<br><br><Img src='imgpersonajes/" .
                    $imgpjugable . ".png' width='400px' height='400px'></td>";
            }
            if ($pjugable == "Ninguno Mas") {
                echo "<td bgcolor='orange' colspan='2'>NPC: " . $NPC . " (" . $tipoNPC .
                    ")<br><br><Img src='imgpersonajes/" . $imgNPC . ".png' width='400px' height='400px'></td></tr>";
            }
            if ($pjugable != "Ninguno Mas" && $NPC != "Ninguno Mas") {
                echo "<td bgcolor='lightblue'>" . $pjugable . "<br><br><Img src='imgpersonajes/" .
                    $imgpjugable . ".png' width='400px' height='400px'></td><td bgcolor='orange'>
                <div id='cc' class='carousel slide' data-ride='carousel'>
                <div class='carousel-inner'><div class='carousel-item active'>NPC: " . $NPC . " (" .
                    $tipoNPC . ")<br><br><Img src='imgpersonajes/" . $imgNPC .
                    ".png' width='400px' height='400px'></div>";
                if ($spaj == "5VZ" || $spaj == "6C") {
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
                if ($spaj == "5VZ") {
                    echo "<div class='carousel-item'>NPC: Nefertari Vivi (Aliado/a)<br><br>
                            <Img src='imgpersonajes/Nefertari Vivi.png' width='400px' height='400px'></div>";
                }
                if ($spaj == "6C") {
                    echo "<div class='carousel-item'>NPC: Nico Robin (Aliado/a)<br><br>
                            <Img src='imgpersonajes/Nico Robin.png' width='400px' height='400px'></div>";
                }
                if ($spaj == "7NJ") {
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
} echo "</table><br><br><div id='pag' style='text-align: center'>";
if ($pag != 1) { echo " <a href='OP36.php?pag=" . ($pag - 1) . "'><</a> <a href='OP36.php?pag=1'>1</a> "; }
for ($i = $pag - 1; $i < $pag + 2; $i++) { if ($i > 1 && $i <= $numpag) { echo " <a href='OP36.php?pag=" . $i . "'>$i</a> "; } }
if ($pag != $numpag) { echo " ... <a href='OP36.php?pag=$numpag'>$numpag</a> <a href='OP36.php?pag=" . ($pag + 1) . "'>></a>"; }
echo "<br><br></div>"; $res->close(); ?> </body>

</html>