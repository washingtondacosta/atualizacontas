<?php echo validation_errors(); ?>
 
<?php echo form_open('tarefas/editar/'.$tarefa_item['id']); ?>

<section id="tarefas">
<div class="container">
	<div class="row">
		<div class="col-xs-12">
		
		<a class="btn btn-default" href="../">Voltar</a>
		
			<form action="" method="post">
				<div class="form-group">
					
					<label style="padding-top: 20px;">Titulo</label> <input
						class="form-control" type="text" name="titulo"
						value="<?php echo $tarefa_item['titulo']; ?>"> <label>Descricao</label>
					<textarea class="form-control" rows="8" cols="1" name="descricao"><?php echo $tarefa_item['descricao']; ?></textarea>
					<label>Prioridade</label> <select class="form-control"
						name="prioridade">
						<option value="<?php echo $tarefa_item['prioridade'] ?>"><?php echo $tarefa_item['prioridade']; ?></option>
						<option value="Alta">Alta</option>
						<option value="Baixa">Baixa</option>
						<option value="Media">Media</option>
						<option value="Indiferente">Indiferente</option>
					</select> <label>Responsavel</label> <input class="form-control"
						type="text" name="responsavel"
						value="<?php echo $tarefa_item['responsavel']; ?>">

					<hr>
					
					<?php 
					switch($tarefa_item['concluida']){
                        case 1:
						echo '<input type="checkbox" name="concluida" value="1" checked> Concluida<br>';
						break;
                        
                        default:
                        echo '<input type="checkbox" name="concluida" value="1"> Concluida<br>';
                        break;
					}
						?>

					<button type="submit" class="btn btn-success">Atualizar</button>
				</div>
			</form>
		</div>
	</div>
</div>
</section>