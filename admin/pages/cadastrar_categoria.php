<?php 
	
	include("config.php");

	if ($_POST['nomeC']) {
		
		$sql = "INSERT INTO categoria VALUES (DEFAULT, '".$_POST['nomeC']."')";
		$query = mysqli_query($conexao, $sql);

		if (mysqli_affected_rows($conexao)) {
        
        	echo "<script> alert('Categoria cadastrada com sucesso'); </script>";
        
    	} else {

    		echo "<script> alert('Categoria não cadastrada'); </script>";

    	}

	}

?>
<div class="row">
	<div class="col-md-12">
		<form method="post">
		
			<span>Nome</span><br>
			<input class="form-control" type="text" name="nomeC" id="nomeC" required><br>

			<input class="form-control btn btn-primary" type="submit" value="Enviar">

		</form>	
	</div>
</div>