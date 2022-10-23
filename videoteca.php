
<?php
    $encontradas = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        include_once "datos.php";
        crearFondo($fondos);

        if(isset($_POST["buscar"]) && $_POST["buscar"] != "") $encontradas = buscarPeli($_POST["buscar"], $fondos);
        else $encontradas = [];

        if(isset($_POST["boton1"])) $encontradas = mostrarfondos($fondos);

        if(isset($_POST["boton2"])) $encontradas = mostrarfondosTitulo($fondos);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoteca</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <hr>
    <div class="contenido">
        <div class="titulo">
            <h1>VIDEOTECA</h1>
            <img src="./imagenes/videoteca.png" alt="logo videoteca">
        </div>

        <div class="formulario">
            <h3>Colecci&oacute;n de fondos</h3>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
                <section class="buscador">
                    <label for="buscar"><span id="label-buscar">Buscar pel&iacute;cula por t&iacute;tulo</span></label>
                    <input type="search" name="buscar" id="buscar">
                    <input type="submit" class="submit" value="Buscar">
                </section>
                <input type="submit" class="submit" value="Ver listado de peliculas" name="boton1">
                <input type="submit" class="submit" value="Ver listado ordenado de peliculas" name="boton2">
            </form>
        </div>
    </div>
    <hr>
    <div class="resultados">
        <table id="peliculas">
            <tr>
                <th>T&iacute;tulo</th>
                <th>Director</th>
                <th>G&eacute;nero</th>
                <th>A&ntilde;o</th>
            </tr>
            <tr>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        foreach($encontradas as $peli) {
                            foreach(array_slice($peli, 1) as $dato) {
                                echo "<td>$dato</td>";
                            }
                            echo "</tr><tr>";
                        }
                    }
                ?>
            </tr>
        </table>
        <p id="encontradas">N&uacute;mero de peliculas encontradas: <?php echo count($encontradas);?></p>
    </div>

    <a href="./index.html"><button id="cerrar-sesion">Cerrar Sesi&oacute;n</button></a>

</body>
</html>


