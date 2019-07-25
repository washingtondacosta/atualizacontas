<?php echo validation_errors(); ?>
 
<?php echo form_open('faturas/editar/'.$fatura_item['codfatura']); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
		<a class="btn btn-default" href="../filtroUsuario/<?=$fatura_item['cliente'] ?>">Voltar</a>
			<form action="" method="post">
				<div class="form-group">
                                    <h4 class="text-center">Editar fatura</h4>
					<label style="padding-top: 20px;">Data da fatura</label> <input
						class="form-control" type="date" name="dtfatura"
						value="<?php echo $fatura_item['dtfatura']; ?>">
					
					<label>Valor</label> <input class="form-control"
						type="text" name="vlfatura"
						value="<?php echo $fatura_item['vlfatura']; ?>">
                                        
                                        <label>(%INPC)</label> <input class="form-control"
						type="text" name="princc"
						value="<?php echo $fatura_item['princc']; ?>">
                                        
                                        <input type="hidden" name="cliente" value="<?=$fatura_item['cliente']?>">

                                        <hr>

					<button type="submit" class="btn btn-success">Atualizar</button>
				</div>
			</form>
                    
                    
		</div>
	</div>
</div>