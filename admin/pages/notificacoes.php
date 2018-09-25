<?php
    
    error_reporting(0);
    require('config.php');
    session_start();

    if (isset($_GET['apaga'])) {

        //apagar de contato
        $sqlA_contato = "DELETE FROM contato WHERE id = ".$_GET['id_contato'];
        $apagaContato = mysqli_query($conexao,$sqlA_contato);

        //apagar de notificacao
        $sqlA_contato = "DELETE FROM notificacao WHERE id_contato = ".$_GET['id_contato'];
        $apagaContato = mysqli_query($conexao,$sqlA_contato);
    
        if (mysqli_affected_rows($conexao) != 0) {
        
            echo "<script> alert('Notificação excluioda com sucesso!') </script>";
        
        }
    
    }
                
?>

<div class="row">
    <div class="col-md-12">
        
        <table class="table table-hover" style="color: black">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Assunto</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $sql = "SELECT * FROM contato, notificacao WHERE contato.id = notificacao.id_contato ORDER BY contato.id desc";
                    $query = mysqli_query($conexao, $sql);
                    
                    while ($reg = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                   
                    <td><?php echo $reg['nome']?></td>
                    <td><?php echo $reg['assunto']?></td>
                    <td><a href="#" data-toggle="modal" data-target="#exampleModal" data-id=<?php echo $reg['id_contato'] ?> data-nome=<?php echo $reg['nome'] ?> data-assunto=<?php echo $reg['assunto'] ?> data-telefone=<?php echo $reg['tel'] ?> data-email=<?php echo $reg['email'] ?> data-msg=<?php echo $reg['msg'] ?>> Ver <i class="fa fa-envelope-open-text"></i></a></td>
                    <td><a href=?page=notificacoes&apaga=1&id_contato=<?php echo $reg['id_contato']?>> Apagar <i class="fa fa-trash-alt"></i></a></td>   
                
                </tr>
                
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Contato</h5>
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
                    <label for="recipient-nome" class="col-form-label">Nome: </label>
                    <input type="text" class="form-control" id="nome" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-assunto" class="col-form-label">Assunto: </label>
                    <input type="text" class="form-control" id="assunto" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-telefone" class="col-form-label">Telefone: </label>
                    <input type="text" class="form-control" id="telefone" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-email" class="col-form-label">E-mail: </label>
                    <input type="text" class="form-control" id="email" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-msg" class="col-form-label">Msg: </label>
                    <textarea class="form-control" id="msg" cols="30" rows="5" readonly></textarea>
                </div>
                <div class="modal-footer">
	                <div class="text-right">
	                	<input class="btn btn-danger" type="submit" value="Fechar">
	            	</div>
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
        var recipient_nome = button.data('nome')
        var recipient_assunto = button.data('assunto')
        var recipient_telefone = button.data('telefone')
        var recipient_email = button.data('email')
        var recipient_msg = button.data('msg')

        var modal = $(this)

        modal.find('#id').val(recipient_id)
        modal.find('#nome').val(recipient_nome)
        modal.find('#assunto').val(recipient_assunto)
        modal.find('#telefone').val(recipient_telefone)
        modal.find('#email').val(recipient_email)
        modal.find('#msg').val(recipient_msg)
        
    })
</script>