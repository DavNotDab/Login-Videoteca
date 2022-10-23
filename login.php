<?php include "validar-login.php";?>

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
    <h1>Bienvenido a la Videoteca</h1>

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST" class="form">
        <label for = "usuario">Usuario: </label>
        <input id = "usuario" name = "usuario" type = "text" value = "<?php if(isset($usuario_s) && !isset($usuario_error))echo strval($usuario_s);?>"> 

        <span class="error"><?php if(isset($usuario_error)) echo strval($usuario_error)."<br>";?></span>

        <label for="clave">Clave: </label>
        <input type="password" name="clave" id="clave" value="<?php if(isset($clave_s) && !isset($clave_error)) echo strval($clave_s);?>">
        
        <span class="error"><?php if(isset($clave_error)) echo strval($clave_error)."<br>";?></span>

        <input type="submit" class="submit" value="Iniciar Sesión">
    </form>

</body>
</html>