<?php

    error_reporting(0);
    require('config.php');

    if (isset($_POST['usuario']) && isset($_POST['senha'])) {

        $sql = "SELECT * FROM `users_admin` WHERE `usuario` = '".$_POST['usuario']."'";
        $query = mysqli_query($conexao, $sql);

        while ($reg = mysqli_fetch_assoc($query)) {
            
            if ($reg['usuario'] == $_POST['usuario'] & $reg['senha'] == md5($_POST['senha'])) {
                
                session_start();

                header('location: index.php');
                $_SESSION['admin'] = $_POST['usuario'];

            } else {

                echo "
                    <script> alert('Usuario/Senha incorretos!') </script>
                ";

            }

        }

    }    

?>
<!-- /VERIFICAR LOGIN -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <form method="post">

                <br><h3>Logar</h3><br>

                <span>Usuario</span><br>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required><br>

                <span>Senha</span><br>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required><br>
            
                <input class="form-control btn btn-primary" type="submit" value="Enviar">
            
            </form>

        </div>
    </div>
</div>

</body>
</html>