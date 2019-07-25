<section id="tarefas">
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1><?php echo $tarefa_item['titulo'];?></h1>
				</div>
				<div class="panel-body">
					<h4><?php echo 'Responsavel: '.$tarefa_item['responsavel']; ?></h4>
  <p class="text-justify"><?php echo $tarefa_item['descricao'];?></p>
  <p>Prioridade: <?php echo $tarefa_item['prioridade']?></p>
  <p>Status: <?php 
  
if ($tarefa_item['concluida']==1){
						echo 'Concluida';
					}else {
						echo 'Nao concluida';
					}
  ?></p>
   <a href="../">Voltar</a>
  </div>
			</div>
		</div>
	</div>
</div>
</section>