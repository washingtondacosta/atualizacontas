<?php echo validation_errors(); ?>

<?php echo form_open('clientes/adicionar'); ?>

<section id="tarefas">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">	
                <form action="" method="post">
                    <div class="form-group"> 
                        <label style="padding-top: 20px;">Cliente</label> 
                        <input class="form-control" type="text" name="nome">

                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <!-- Tabela de tarefas -->
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            echo "<tr>";
                            foreach ($clientes as $cliente_item) :
                                ?>

                            <td><a href="<?php echo base_url('index.php/faturas/filtroUsuario/' . $cliente_item['id']); ?>"><?= $cliente_item['nome'] ?></a></td>


                            <td><a href="<?php echo site_url('/clientes/delete/' . $cliente_item['id']); ?>"
                                   onClick="return confirm('Deseja deletar o registro?<?php echo ' '.$cliente_item['nome'];?>')"
                                   <button title="Deletar fatura" class="glyphicon glyphicon-remove btn btn-default"></button>
                            </a></td>


                            <?php
                            echo "</tr>";

                        endforeach;
                        ?>
                        </tbody>
                    </table>
                    <!-- Fim tabela de tarefas -->

                </div>

            </div>
            </section>