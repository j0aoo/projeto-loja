
<?php

	include("config.php");

	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$cat = $_POST['categoria'];
	$quant = $_POST['quantidade'];
	$desc = $_POST['desc'];
	$inform = $_POST['inform'];

	if (isset($nome) && isset($_FILES['arquivo'])) {

		$dir = "img/";
		$ext1 = strtolower(substr($_FILES['arquivo']['name'], -4));

		$novoNome1 = microtime().$ext1;
		move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$novoNome1);

		$sql = "INSERT INTO `produtos` VALUES (default,'".$cat."','".$nome."','".$preco."','".$quant."','".$desc."','".$inform."','0')";
		$query = mysqli_query($conexao, $sql);

		$sqlImg = "SELECT LAST_INSERT_ID();";
		$queryImg = mysqli_query($conexao, $sqlImg);
		$valRow = mysqli_fetch_row($queryImg);
		$salvaRow = $valRow[0];

		$sqlSalvaImg = "INSERT INTO `img_produto` VALUES ('".$salvaRow."','".$novoNome1."')";
		mysqli_query($conexao, $sqlSalvaImg);
		

		if (mysqli_affected_rows($conexao)>0) {
			
			echo "<script> alert('Produto cadastrado') </script>";
			echo "<script> location.herf='?page=cadastrar_produto;' </script>";

		} else {

			echo "<script> alert('Erro ao cadastrar') </script>";

		}

	}

?>
<div class="row">
	<div class="col-md-12">
		<form method="post" enctype="multipart/form-data" multiple>

			<span>Nome</span><br>
			<input class="form-control" type="text" name="nome" id="nome" required><br>
			
			<span>Preço</span><br>
			<input class="form-control" type="text" name="preco" id="preco" required ><br>

			<span for="categoria_produto">Categoria</span><br>
			<select class="form-control" name="categoria" id="categoria" required=>
				<option> - </option>
				<?php 
				
					$sqlCat = "SELECT * FROM categoria";
					$queryCat = mysqli_query($conexao, $sqlCat);

					while ($reg = mysqli_fetch_assoc($queryCat)) {
						
						echo '<option value="'.$reg['nome'].'">'.$reg['nome'].'</option>';

					}
				
				?>
			</select><br>
			
			<span for="quantidade">Quantidade</span><br>
			<input class="form-control" type="number" name="quantidade" id="quantidade" required><br>

			<span>Descrição</span><br>
			<textarea class="form-control" name="desc" id="desc" required></textarea><br>

			<span>Informação adicional</span><br>
			<textarea class="form-control" name="inform" id="inform" required></textarea><br>
			
			<!-- imagens -->
			<span>Imagem - 1</span><br>
			<input class="form-control" type="file" name="arquivo" id="arquivo" required><br>
			
			<input class="form-control btn btn-primary" type="submit" value="Enviar"><br>

		</form>
	</div>
</div>