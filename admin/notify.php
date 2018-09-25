<?php
    
    error_reporting(0);

    require('config.php');
    
    $sql = "SELECT * FROM `notificacao` WHERE `status` = '0'";
    $query = mysqli_query($conexao, $sql);
    
    $linha = mysqli_num_rows($query);

    if($linha > 0){
    
    	echo $rows;	
    
    } else {

    	echo "0";

    }
    
?>