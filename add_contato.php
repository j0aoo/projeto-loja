<?php

    require('admin/config.php');

    $nome = $_POST['nome'];
    $assunto = $_POST['assunto'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $sql = "INSERT INTO contato VALUES (DEFAULT, '$nome', '$assunto', '$tel', '$email', '$mensagem')";
    $query = mysqli_query($conexao, $sql);

    $sqlNot = "SELECT LAST_INSERT_ID()";
    $queryNot = mysqli_query($conexao, $sqlNot);

    $valRow = mysqli_fetch_row($queryNot);
    $valRowSalva = $valRow[0];

    $sqlNotInsert = "INSERT INTO `notificacao` VALUES ('$valRowSalva', '0')";
    $queryNotInsert = mysqli_query($conexao, $sqlNotInsert);

    if (mysqli_affected_rows($conexao)>0) {
        
        echo "<script>
                alert('Enviado com sucesso');
                location.href = 'contact.html';
            </script>";
        
    }

    //Inserindo na tabela notificacao
    // 0 e 1 - 0 ñ visualizada e 1 visualizada

    //Mail

    // subject
    $subject = 'Preenchimento de formulario de contato';

    // message
    $message = '
    <html>
    <head>
        <title>Fashe</title>
    </head>
    <body>
        <p>Recebemos seu contato e logo estaremos respondendo</p>
    </body>
    </html>
    ';

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Mail it
    mail($email, $subject, $message, $headers);

?>