<?php

	include("admin/config.php");

	if (isset($_POST)) {
		
		$nome = $_POST['nome'];
		$user = $_POST['user'];
		$senha = $_POST['senha'];
		$email = $_POST['email'];

		$sqlInsert = "INSERT INTO userComum VALUES (default, '".$nome."', '".$user."', '".$senha."', '".$email."');";
		$queryInsert = mysqli_query($conexao, $sqlInsert);

		if (mysqli_affected_rows($conexao) > 0) {
			
			echo "
				<script>
				
					alert('Cadastrado com sucesso!');
					location.href='cadUsers.php';

				</script>
			";

		} else {

			echo "
				<script>
				
					alert('Erro ao cadastrar!');
					location.href='cadUsers.php';

				</script>
			";

		}

	}

?>