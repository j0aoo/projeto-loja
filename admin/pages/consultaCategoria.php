<?php

	include("config.php");

	if (isset($_GET['apaga'])) {
		
		$sqlApaga = "DELETE FROM categoria WHERE `nome` = '".$_GET['apaga']."';";
		$queryApaga = mysqli_query($conexao, $sqlApaga);

		if (mysqli_affected_rows($conexao)) {

			echo "<script> alert('Deletado com sucesso!') </script>";
		
		}

	}

?>
<div class="row">
	<div class="col-md-12">
		
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Categoria</th>
				</tr>
			</thead>
			<tbody>
				<?php

					include("config.php");
					
					$sql = "SELECT * FROM `categoria`;";
					$query = mysqli_query($conexao, $sql);

					while ($reg = mysqli_fetch_assoc($query)) {
					
						echo "
						<tr>
							<td>".$reg['nome']."</td>
							<td><a href='?page=consultaCategoria&apaga=".$reg['nome']."'>Deletar</a></td>
						</td>
						";

					}
				
				?>
			</tbody>
		</table>

	</div>
</div>