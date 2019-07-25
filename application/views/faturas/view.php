<section id="faturas">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1><?php echo $fatura_item['codfatura']; ?></h1>
                    </div>
                    <div class="panel-body">
                        <h4><?php echo 'Responsavel: ' . $fatura_item['dtfatura']; ?></h4>
                        <p class="text-justify"><?php echo $fatura_item['vlfatura']; ?></p>
                        <p>Prioridade: <?php echo $fatura_item['princc'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>