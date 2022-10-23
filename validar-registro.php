<?php 

    function validar_usuario($usuario) {
        if(strlen($usuario) < 6) return false;
        $valido = !preg_match("([^a-zA-Z0-9])", $usuario);
        return $valido;
    }

    function validar_clave($clave) {
        if(strlen($clave) < 7) return false;
        $valido = preg_match("(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@*!$]).+$)", $clave);
        return $valido;
    }

    function validar_nombre($nombre) {
        if(strlen($nombre) < 3) return false;
        $valido = !preg_match("([^a-zA-Z\s])", $nombre);
        return $valido;
    }

    function validar_correo($correo) {
        if(strlen($correo) < 8) return false;
        $valido = preg_match("(^[a-zA-Z0-9]+@[a-z]+\.[a-z]+$)", $correo);
        return $valido;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["usuario"]) && $_POST["usuario"] != "") {
            $usuario = $_POST["usuario"];
            $usuario_s = filter_var($usuario, FILTER_SANITIZE_STRING);
            $usuario_s = filter_var($usuario_s, FILTER_SANITIZE_SPECIAL_CHARS);

            if (!validar_usuario($usuario_s)) $usuario_error = "¡El usuario no es válido!";
        }
        else $usuario_error = "¡Se requiere un usuario!";


        if (isset($_POST["clave"]) && $_POST["clave"] != "") {
            $clave = $_POST["clave"];
            $clave_s = filter_var($clave, FILTER_SANITIZE_STRING);
            $clave_s = filter_var($clave_s, FILTER_SANITIZE_SPECIAL_CHARS);

            if (!validar_clave($clave_s)) $clave_error = "¡La clave no es válida!";
        }
        else
            $clave_error = "¡Se requiere una clave!";


        if (isset($_POST["nrp"]) && $_POST["nrp"] != "") {
            $nrp = $_POST["nrp"];
            $nrp_s = filter_var($nrp, FILTER_SANITIZE_STRING);
            $nrp_s = filter_var($nrp_s, FILTER_SANITIZE_SPECIAL_CHARS);

            if (!validar_usuario($nrp_s)) $nrp_error = "¡El NRP no es válido!";
        }
        else
            $nrp_error = "¡Se requiere un NRP!";


        if (isset($_POST["nombre"]) && $_POST["nombre"] != "") {
            $nombre = $_POST["nombre"];
            $nombre_s = filter_var($nombre, FILTER_SANITIZE_STRING);
            $nombre_s = filter_var($nombre_s, FILTER_SANITIZE_SPECIAL_CHARS);

            if (!validar_nombre($nombre_s)) $nombre_error = "¡El nombre no es válido!";
        }
        else
            $nombre_error = "¡Se requiere un nombre!";


        if (isset($_POST["apellido1"]) && $_POST["apellido1"] != "") {
            $apellido1 = $_POST["apellido1"];
            $apellido1_s = filter_var($apellido1, FILTER_SANITIZE_STRING);
            $apellido1_s = filter_var($apellido1_s, FILTER_SANITIZE_SPECIAL_CHARS);

            if (!validar_nombre($apellido1_s)) $apellido1_error = "¡El primer apellido no es válido!";
        }
        else
            $apellido1_error = "¡Se requiere un primer apellido!";


        if (isset($_POST["apellido2"]) && $_POST["apellido2"] != "") {
            $apellido2 = $_POST["apellido2"];
            $apellido2_s = filter_var($apellido2, FILTER_SANITIZE_STRING);
            $apellido2_s = filter_var($apellido2_s, FILTER_SANITIZE_SPECIAL_CHARS);

            if (!validar_nombre($apellido2_s)) $apellido2_error = "¡El segundo apellido no es válido!";
        }
        else
            $apellido2_error = "¡Se requiere un segundo apellido!";


        if (isset($_POST["correo"]) && $_POST["correo"] != "") {
            $correo = $_POST["correo"];
            $correo_s = filter_var($correo, FILTER_SANITIZE_STRING);
            $correo_s = filter_var($correo_s, FILTER_SANITIZE_SPECIAL_CHARS);

            if (!validar_correo($correo_s)) $correo_error = "¡El correo no es válido!";
        }
        else
            $correo_error = "¡Se requiere un correo!";


        if (!isset($usuario_error) && !isset($clave_error) && !isset($nrp_error) && !isset($nombre_error) && !isset($apellido1_error) && !isset($apellido2_error) && !isset($correo_error)){
            $datos_formulario = array($usuario_s, $clave_s, $nrp_s, $nombre_s, $apellido1_s, $apellido2_s, $correo_s);

            require_once "datos.php";

            if (guardarDatos($datos_formulario)) {

                if(registro_correcto($datos_formulario)) {
                    $correcto = "REGISTRO CORRECTO";
                    header("refresh: 3; url=index.html");
                }
                else {
                    $correcto = "EL USUARIO YA EXISTE";
                    $login = '<a href="./login.php">Inicie sesi&oacute;n</a>';
                }
            }
        }
    }

?>