<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        
        body {
            background-color: #FFC0CB;
            font-family: sans-serif;
            font-size: 14px;

        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-form {
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 400px;
        }
        .logo {
            margin-bottom: 20px;
            width: 100%;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: left;
        }
        input {
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 10px;
            width: 100%;
        }
        button {
            background-color: #4CAF50;
            border: none;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            width: 100%;
        }
        button:hover {
            background-color: #3e8e41;
        }
    </style>
    <!-- <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/dist/css/bootstrap.min.css"> -->
</head>
<body>
    <div class="container">
        <div class="login-form">
            <img class="logo" src="<?php echo base_url('public/Images/images/logo3.jpeg')?>" alt="Logo de la empresa" height="350px" width="40px">
            <h1>Almacenes ALDO </h1>
            <?php if(session('errores')){
                $errores = session('errores');

            }

            ?>
            
            <form method="post" action="<?php echo base_url('login'); ?>">

         


                <label for="username">Nombre de usuario:</label>
                    <input type="text" name="username" id="username" value="<?php if(old('username')){ echo old('username'); }?>">
                    <span class="fw-bold text-danger"><?=(isset($errores['username']))?$errores['username']:''?></span>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">

                <input type="submit" value="Iniciar sesión">
            </form>


            <p><a href="/forgot-password">¿Olvidó su contraseña?</a></p>
            <p>¿No tiene una cuenta? <a href="/register">Regístrese aquí</a></p>
        </div>
    </div>
</body>
</html>