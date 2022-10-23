<?php 

    $fondos = [];

    function guardarDatos($datos) {
        $archivo = fopen("profesores.txt", "a");
        if(!$archivo) {
            echo "No se encuentra el fichero o no se pudo leer <br>";
            return false;
        }

        fwrite($archivo, implode(" ", $datos).PHP_EOL);
        fclose($archivo);
        return true;
    }

    function login($usu, $pw) {   
        $archivo = fopen("profesores.txt", "r");
        $existe = false;

        if ($archivo) {
            while(!feof($archivo)) {
                fscanf($archivo, "%s %s %s %s %s %s %s", $usuario, $passw, $rnp, $nombre, $apellido1, $apellido2, $correo);
                
                if ($usu == $usuario && $pw == $passw) $existe = true;
            }
            fclose($archivo);
            return $existe;
        }
    }
    
    function registro_correcto($datos) {
        $nrp_registro = $datos[2];
        $correcto = true;
        $archivo = fopen("profesores.txt", "r");

        if ($archivo) {
            while(!feof($archivo)) {
                fscanf($archivo, "%s %s %s %s %s %s %s", $usuario, $passw, $nrp, $nombre, $apellido1, $apellido2, $correo);
                
                if ($nrp == $nrp_registro) $correcto = false;
            }
            fclose($archivo);
            return $correcto;
        }
    }

    function guardarPeli($peli, &$fondos) {
        array_push($fondos, $peli);
    }

    function buscarPeli($buscada, $fondos) {
        $titulos = [];
        $encontradas = [];
        foreach ($fondos as $peli) {
            array_push($titulos, $peli[1]);
        }

        foreach($titulos as $titulo) {
            if (str_contains($titulo, $buscada)) {
                foreach($fondos as $peli) {
                    if ($peli[1] == $titulo) array_push($encontradas, $peli);
                }
            }
        }
        return $encontradas;
    }

    function mostrarfondos($fondos) {
        return $fondos;
    }

    function mostrarfondosTitulo($fondos) {
        $aux = [];
        foreach ($fondos as $peli) {
            array_push($aux, $peli[1]);
        }
        array_multisort($aux, SORT_ASC, $fondos);
        
        return $fondos;
    }

    function crearProfes() {
        if (!file_exists("profesores.txt")) {
            $profesor1 = ["Mariamola", "Mariamola24", "123456789A", "Maria", "Ortiz", "Lopez", "marilola@gmail.com"];
            $profesor2 = ["Pepecrack", "Pepecrack999", "987654321A", "Pepe", "Benitez", "Ortega", "pepitogrillo@gmail.com"];
            $profesor3 = ["Joselito", "Joseelmejor00", "123498765A", "Jose", "Cid", "Campos", "joselito00@gmail.com"];

            guardarDatos($profesor1);
            guardarDatos($profesor2);
            guardarDatos($profesor3);
        }
    }

    crearProfes();

    function crearFondo(&$fondos) {
        $peli1 = ["1234E", "El gran dictador", "Charles Chaplin", "Comedia", "1940"];
        $peli2 = ["9876E", "The Matrix", "Larry Wachowsky", "Ciencia Ficcion", "1999"];
        $peli3 = ["4321E", "Los pajaros", "Alfred Hitchcock", "Thriller", "1963"];

        guardarPeli($peli1, $fondos);
        guardarPeli($peli2, $fondos);
        guardarPeli($peli3, $fondos);
    }
    

?>