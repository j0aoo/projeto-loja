<?php

	include("../config.php");

	if (isset($_GET['apaga'])) {
		
		$deleteImg = "SELECT * FROM img_produto WHERE id_produto = '".$_GET['apaga']."'";
		$queryDeleteImg = mysqli_query($conexao, $deleteImg);

		while ($img = mysqli_fetch_assoc($queryDeleteImg)) {
			
			unlink("../img/".$img['nome']);

		}

		$sqlDeleteProd = "DELETE FROM produtos WHERE id = '".$_GET['apaga']."'";
		$queryDeleteProd = mysqli_query($conexao, $sqlDeleteProd);

		$sqlDeleteImgProd = "DELETE FROM img_produto WHERE id_produto = '".$_GET['apaga']."'";
		$queryDeleteImgProd = mysqli_query($conexao, $sqlDeleteImgProd);

	}

?>
<div class="row">
	<div class="col-md-12">
		
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Produto</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$sqlSelectProd = "SELECT * FROM produtos;";
				$querySelectProd = mysqli_query($conexao, $sqlSelectProd);

				while ($regProd = mysqli_fetch_assoc($querySelectProd)) {
					
					echo '

						<tr>
							<td>'.$regProd['nome'].'</td>
							<td>
								<a href="#" data-toggle="modal" data-target="#exampleModal" data-id="'.$regProd['id'].'" data-categoria="'.$regProd['cat'].'" data-nome="'.$regProd['nome'].'" data-preco="'.$regProd['preco'].'" data-quant="'.$regProd['quantidade'].'" data-desc="'.$regProd['descricao'].'" data-inform="'.$regProd['inform'].'" data-view="'.$regProd['view'].'"> Ver <i class=""></i></a>
							</td>
							<td><a href=?page=consulta_produto&apaga='.$regProd['id'].'> Apagar <i class="fa fa-trash-alt"></i></a></td>  
						</tr>

					';

				}

			?>
			
			</tbody>
		</table>

	</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Produto</h5>
        </div>
        <div class="modal-body">
            <form method="get">
            	<input type="hidden" name="acao" value="open">
                <input type="hidden" name="page" value="notificacoes">
                <div class="form-group">
                    <label for="recipient-id" class="col-form-label">ID: </label>
                    <input type="text" class="form-control" id="id" name="id" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-cat" class="col-form-label">Categoria: </label>
                    <input type="text" class="form-control" id="categoria" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-nome" class="col-form-label">Nome: </label>
                    <input type="text" class="form-control" id="nome" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-preco" class="col-form-label">Preço: </label>
                    <input type="text" class="form-control" id="preco" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-quant" class="col-form-label">Quantidade: </label>
                    <input type="text" class="form-control" id="quant" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-desc" class="col-form-label">Descrição: </label>
                    <textarea class="form-control" id="desc" cols="4" rows="10" readonly style="height: 120px"></textarea>
                </div>
                <div class="form-group">
                    <label for="recipient-inform" class="col-form-label">Informação adicional: </label>
                    <textarea class="form-control" id="inform" cols="4" rows="10" readonly style="height: 120px"></textarea>
                </div>
                <div class="form-group">
                    <label for="recipient-view" class="col-form-label">Views: </label>
                    <input type="number" class="form-control" id="view" readonly>
                </div>
                <div class="modal-footer">
	    
            	</div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)

        var recipient_id = button.data('id')
        var recipient_cat = button.data('categoria')
        var recipient_nome = button.data('nome')
        var recipient_preco = button.data('preco')
        var recipient_quant = button.data('quant')
        var recipient_desc = button.data('desc')
        var recipient_inform = button.data('inform')
        var recipient_view = button.data('view')

        var modal = $(this)

        modal.find('#id').val(recipient_id)
        modal.find('#categoria').val(recipient_cat)
        modal.find('#nome').val(recipient_nome)
        modal.find('#preco').val(recipient_preco)
        modal.find('#quant').val(recipient_quant)
        modal.find('#desc').val(recipient_desc)
        modal.find('#inform').val(recipient_inform)
        modal.find('#view').val(recipient_view)
        
    })
</script>