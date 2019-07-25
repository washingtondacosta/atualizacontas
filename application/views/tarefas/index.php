<section id="tarefas">
	<div class="container alturafull">
	<!-- Botões, adicionar, imprimir e status -->
		<div class="row">
			<div class="col-xs-12">
				<div class="page-header hidden-print">
					<h1>Tarefas</h1>
					<p>Gerenciamento de tarefas</p>
				</div>

				<div class="page-header visible-print">
					<h1>Relatorio de tarefas cadastradas</h1>
					<p>Versao de impressao</p>
				</div>

				<div class="btn-group hidden-print" role="group" aria-label="...">
					<a title="Adicionar novo registro"
						href="<?php echo site_url('tarefas/adicionar');?>"
						class="btn btn-default btn-sm"><span
						class="glyphicon glyphicon-plus"></span> Adicionar</a> <a
						title="Imprimir relatorio" href="#" class="btn btn-default btn-sm"
						onClick="return print()"><span class="glyphicon glyphicon-print"></span>
						Imprimir</a>

					<button title="Visualizar status geral das tarefas" type="button"
						class="btn btn-default btn-sm" data-toggle="modal"
						data-target="#grafico">
						<span class="glyphicon glyphicon-stats"></span> Status
					</button>
				</div>
			</div>
		</div>
		<!-- FIM Botões, adicionar, imprimir e status -->
		
		<!-- Tabela de tarefas -->
		<div class="row">
			<div class="col-xs-12">
				<table class="table table-striped table-bordered table-condensed">
					<thead>
						<tr>
							<th>Id</th>
							<th>T&iacute;tulo</th>
							<th>Prioridade</th>
							<th>Respons&aacute;vel</th>
							<th>Conclu&iacute;da</th>
							<th class="hidden-print text-center">Acoes</th>
						</tr>
					</thead>
                        <?php
                        // Contadores usados para o calculo de status

                        $contador = 0;
                        $contConcluidas = 0;
                        $contNaoConcluida = 0;

                        foreach ( $tarefas as $tarefa_item ) :
	                    ?>  
                        <tr>
						     <td><?php echo $tarefa_item['id']; ?></td>
						     <td class="hidden-print"><a
							 href="<?php echo site_url('tarefas/view/'.$tarefa_item['id']); ?>"><?php echo $tarefa_item['titulo']; ?></a></td>
						     <td class="visible-print"><?php echo $tarefa_item['titulo']; ?></td>
						     <td><?php echo $tarefa_item['prioridade']; ?></td>
						     <td><?php echo $tarefa_item['responsavel']; ?></td>
						     <td><?php
	
	                         if ($tarefa_item ['concluida'] == 1) {
		                     echo 'SIM';
	                         } else {
		                     echo 'NAO';
	                         }
	                         ?></td>

						     <td class="hidden-print text-center"><a
							 href="<?php echo site_url('tarefas/endTask/'.$tarefa_item['id']); ?>"
							 onClick="return confirm('Deseja finalizar a tarefa: <?php echo $tarefa_item['titulo'];?>')">
							<button title="Finalizar tarefa"
									<?php
	                                if ($tarefa_item ['concluida'] == 1) {
		                            echo 'class="glyphicon glyphicon-ok-circle btn btn-default disabled"';
	                                } else {
		                            echo 'class="glyphicon glyphicon-ok-circle btn btn-default"';
	                                }?>>
	                         </button></a> 
						    
						    <a href="<?php echo site_url('tarefas/delete/'.$tarefa_item['id']); ?>"
							onClick="return confirm('Deseja deletar o registro?<?php echo $tarefa_item['titulo'];?>')"><button
									title="Deletar tarefa"
									class="glyphicon glyphicon-remove btn btn-default"></button></a>
							
							<a href="<?php echo site_url('tarefas/editar/'.$tarefa_item['id']); ?>"><button
									title="Editar registro"
									class="glyphicon glyphicon-pencil btn btn-default"></button></a>
					</tr>
					
			<?php
	                     $contador ++;
	                     if ($tarefa_item ['concluida'] == 1) {
		                 $contConcluidas ++;
	                     } else {
		                 $contNaoConcluida ++;
	                     }
	                     endforeach;
	                     echo "<h3><span class='label label-primary'>" . $contador . "</span> Registros</h3>";
	         ?>	
                </table>
                <!-- Fim tabela de tarefas -->
                
				<!--- janela modal -->
				<div class="modal fade" id="grafico" role="dialog" tabindex="-1"
					aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal header">

								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden>&times;</span><span class="sr-only">Fechar</span>
								</button>

								<h4 class="modal-title">Janela Modal</h4>
							</div>

							<div class="modal-body">
								<p>Status das tarefas no sistema</p>
							
							<?php
							
							if ($contador == 0) {
								$contador = 1;
							}
							//Calculo de status
							$percConcluidas = number_format ( ($contConcluidas * 100) / $contador );
							$percNaoConcluidas = number_format ( ($contNaoConcluida * 100) / $contador );
							?>
							
							<!-- Informações janela modal -->
                            <h3>(%) Tarefas concluidas</h3>
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $percConcluidas?>"
									aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percConcluidas?>%;"><?php echo $percConcluidas?>%</div>
								</div>

								<h3>(%) Tarefas nao concluidas</h3>
								<div class="progress">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $percNaoConcluidas?>"
									aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percNaoConcluidas?>%;"><?php echo $percNaoConcluidas?>%</div>
								</div>

							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-default"
									data-dismiss="modal">Fechar</button>

							</div>

						</div>
					</div>
				</div>

				<!--- fim da janela modal -->


			</div>
		</div>


	</div>
</section>