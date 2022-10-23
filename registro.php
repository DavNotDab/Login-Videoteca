<?php include "validar-registro.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesi&oacute;n</title>
    <link rel="stylesheet" href="./styles/registro-style.css">
</head>
<body>
    <img src="./imagenes/videoteca.png" alt="logo-videoteca">
    <h1>Complete los datos para registrarse:</h1>

    <h1><?php if(isset($correcto)) echo $correcto;?></h1>
    <h2><?php if(isset($login)) echo $login;?></h2>

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST" class="form">
        <label for = "usuario">Usuario: </label>
        <input type = "text" id = "usuario" name = "usuario" value = "<?php if(isset($usuario_s) && !isset($usuario_error))echo strval($usuario_s);?>"> 

        <span class="error"><?php if(isset($usuario_error)) echo strval($usuario_error)."<br>";?></span>

        <label for="clave">Clave: </label>
        <input type="password" name="clave" id="clave" value="<?php if(isset($clave_s) && !isset($clave_error)) echo strval($clave_s);?>">
        
        <span class="error"><?php if(isset($clave_error)) echo strval($clave_error)."<br>";?></span>

        <label for = "nrp">NRP: </label>
        <input type = "text" id = "nrp" name = "nrp" value = "<?php if(isset($nrp_s) && !isset($nrp_error))echo strval($nrp_s);?>"> 

        <span class="error"><?php if(isset($nrp_error)) echo strval($nrp_error)."<br>";?></span>

        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="<?php if(isset($nombre_s) && !isset($nombre_error)) echo strval($nombre_s);?>">
        
        <span class="error"><?php if(isset($nombre_error)) echo strval($nombre_error)."<br>";?></span>

        <label for = "apellido1">Primer apellido: </label>
        <input type = "text" id = "apellido1" name = "apellido1" value = "<?php if(isset($apellido1_s) && !isset($apellido1_error))echo strval($apellido1_s);?>"> 

        <span class="error"><?php if(isset($apellido1_error)) echo strval($apellido1_error)."<br>";?></span>

        <label for="apellido2">Segundo apellido: </label>
        <input type="text" name="apellido2" id="apellido2" value="<?php if(isset($apellido2_s) && !isset($apellido2_error)) echo strval($apellido2_s);?>">
        
        <span class="error"><?php if(isset($apellido2_error)) echo strval($apellido2_error)."<br>";?></span>

        <label for = "correo">Correo: </label>
        <input type="text" id = "correo" name = "correo" value = "<?php if(isset($correo_s) && !isset($correo_error))echo strval($correo_s);?>"> 

        <span class="error"><?php if(isset($correo_error)) echo strval($correo_error)."<br>";?></span>

        <input type="submit" class="submit" value="Registrarse">
    </form>

</body>
</html>