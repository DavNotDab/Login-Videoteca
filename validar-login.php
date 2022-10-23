<?php 

    function validar_usuario($usuario) {
        $valido = preg_match("([^a-zA-Z0-9])", $usuario);
        
        return !$valido;
    }

    function validar_clave($clave) {
        if(strlen($clave) < 7) return false;

        $valido = preg_match("(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@*!$]).+$)", $clave);

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

        if (!isset($usuario_error) && !isset($clave_error)){
            $datos_formulario = array($usuario_s, $clave_s);

            require_once "datos.php";

            if (login($usuario_s, $clave_s)) header("Location: videoteca.php");
            else echo "<h1>DATOS DE INICIO DE SESIÓN INCORRECTOS</h1>";
        }
    }

?>