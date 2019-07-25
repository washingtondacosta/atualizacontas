<?php echo validation_errors(); ?>
 
<?php echo form_open('tarefas/adicionar'); ?>

<section id="tarefas">
<div class="container">
	<div class="row">
		<div class="col-xs-12">
		
		<a class="btn btn-default" href="../tarefas">Voltar</a>
		
			<form action="" method="post">
				<div class="form-group"> 
					<label style="padding-top: 20px;">Titulo</label> <input class="form-control" type="text"
						name="titulo"> <label>Descricao</label>
					<textarea class="form-control" rows="8" cols="1" name="descricao"></textarea>
					<label>Prioridade</label>
					 
					<select class="form-control"
						name="prioridade">
						<option value="Alta">Alta</option>
						<option value="Baixa">Baixa</option>
						<option value="Media">Media</option>
						<option value="Indiferente">Indiferente</option>
					</select> 
					
					<label>Responsavel</label> <input class="form-control"
						type="text" name="responsavel">
						
						<input type="hidden" name="concluida" value="0"><br>
						
					<button type="submit" class="btn btn-success">Adicionar</button>
				</div>
			</form>
		</div>
	</div>
</div>
</section>