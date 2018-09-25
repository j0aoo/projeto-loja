<?php
    error_reporting(0);
    require('config.php');
    session_start(); 
  
    $sql = "SELECT * FROM contato, notificacao WHERE contato.id = notificacao.id_contato and notificacao.status = 0 ORDER BY contato.id desc";
    $query = mysqli_query($conexao, $sql);
   $rows = mysqli_num_rows($query);

    while ($dados = mysqli_fetch_assoc($query)) {
      echo '<li><!-- start message -->
          <a href="?page=notificacoes">,
          <div class="pull-left">
            <img src="image/mail.jpg" class="img-circle" alt="User Image">
          </div>
          <h4>
          '.$dados['nome'].'
          </h4>
          <p>'.$dados['msg'].'</p>
        </a>
        </li>
        <!-- end message -->';
      }

?>