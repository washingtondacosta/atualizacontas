<?php echo validation_errors(); ?>

<?php echo form_open('faturas/adicionar'); ?>

<div class="container">
    <div class="row hidden-print">
        <form action="" method="post">
            <div class="form-group"> 
                <div class="col-xs-12 col-md-4">
                    <label style="padding-top: 20px;">Data da fatura</label> 
                    <input class="form-control" type="date" name="dtfatura" required="">
                </div>

                <div class="col-xs-12 col-md-4">
                    <label style="padding-top: 20px;">Valor</label> 
                    <input class="form-control" type="text" name="vlfatura">
                </div>

                <div class="col-xs-12 col-md-4">
                    <label style="padding-top: 20px;">(%) INPC</label> 
                    <input class="form-control" type="text" name="princc">
                </div>
                <?php
                $link = $_SERVER["REQUEST_URI"];
                $ex = explode('/', $link);
                $ultima = $ex[count($ex) - 1];
                ?>


                <div class="col-xs-12">
                    <input class="form-control" type="hidden" name="cliente" value=" <?= $ultima; ?>">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div
            </div>
        </form>
    </div>
</div>
<!-- Tabela de tarefas -->

<div class="hidden-print" style="margin-left: 90%">
    <br>
    <a
        title="Imprimir relatorio" href="#" class="btn btn-default btn-sm"
        onClick="return print()"><span class="glyphicon glyphicon-print"></span>
        Imprimir</a>

</div>

<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-bordered table-condensed text-center" style="margin-top: 40px;">
            <thead>
                <tr>
                    <th style="text-align: center"></th>
                    <th style="text-align: center">Data da fatura</th>
                    <th style="text-align: center">Valor</th>
                    <th style="text-align: center">Valor 27%</th>
                    <th style="text-align: center">(%) INPC</th>
                    <th style="text-align: center">Valor INPC</th>
                    <th style="text-align: center">Reajuste 6%</th>
                    <th style="text-align: center">Dif. Meses</th>
                    <th style="text-align: center">Resultado</th>
                    <th class="hidden-print" style="text-align: center">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php
                echo "<tr>";

                $sumVlFatura = 0;
                $sumVl27 = 0;
                $sumInpc = 0;
                $sumReajuste = 0;
                $sumResultado = 0;
                $contador=1;

                foreach ($faturas as $fatura_item) :

                    $dataOrig = $fatura_item['dtfatura'];

                    $dataFormatada = date("d-m-Y", strtotime($dataOrig));
                    echo "<td>" . $contador . "</td>";
                    echo "<td>" . $dataFormatada . "</td>";
                    echo "<td> R$ " . $fatura_item['vlfatura'] . "</td>";
                    $vl27 = (float) $fatura_item['vlfatura'] * 0.27;
                    echo "<td>" . $vl27 . "</td>";
                    echo "<td>" . $fatura_item['princc'] . "</td>";
                    $prinpc = (float) $fatura_item['princc'] / 100;
                    $vlinpc = (float) $fatura_item['vlfatura'] * $prinpc;
                    echo "<td>R$  " . $vlinpc . "</td>";
                    $vlBase = $vl27 + $vlinpc;
                    $data1 = new DateTime(date('Y-m-d'));
                    $data2 = new DateTime($fatura_item['dtfatura']);
                    $intervalo = $data1->diff($data2);
                    $anos = $intervalo->y;
                    $meses = $intervalo->m;
                    $reajusteMensal = 0.004867;

                    if ($data1->format('Y') == $data2->format('Y')) {
                        $qtMeses = $meses;
                    } else {
                        $qtMeses = $anos * 12;
                        $qtMeses = $qtMeses + $meses;
                    }

                    $vlajustado = ($vlBase * $reajusteMensal) * $qtMeses;
                    $resultado = $vlBase + $vlajustado;
                    echo "<td>R$ " . number_format($vlajustado, 2, '.', '') . "</td>";
                    echo "<td>" . $qtMeses . "</td>";
                    echo "<td>R$ " . number_format($resultado, 2, '.', '') . "</td>";

                    $sumVlFatura += (float) $fatura_item['vlfatura'];
                    $sumVl27 += $vl27;
                    $sumInpc += $vlinpc;
                    $sumReajuste += $vlajustado;
                    $sumResultado += $resultado;
                    ?>

                <td class="hidden-print"><a href="<?php echo base_url('index.php/faturas/delete/' . $fatura_item['codfatura']); ?>"
                                            onClick="return confirm('Deseja deletar o registro?<?php echo ' ' . $fatura_item['dtfatura']; ?>')"
                                            <button title="Deletar tarefa" class="glyphicon glyphicon-remove btn btn-default"></button>
                    </a>


                    <a href="../editar/<?= $fatura_item['codfatura']; ?>"
                       <button title="Editar" class="glyphicon glyphicon-pencil btn btn-default"></button></a>



                </td>
                <?php
                echo "</tr>";
                $contador++;
            endforeach;
            echo "<tr>";
            echo '<td>-</td>';
            echo '<td><strong>TOTAL<strong></td>';
            echo '<td>R$ ' . number_format($sumVlFatura, 2, '.', '') . '</td>';
            echo '<td>R$ ' . number_format($sumVl27, 2, '.', '') . '</td>';
            echo '<td>-</td>';
            echo '<td>R$ ' . number_format($sumInpc, 2, '.', '') . '</td>';
            echo '<td>R$ ' . number_format($sumReajuste, 2, '.', '') . '</td>';
            echo '<td>-</td>';
            echo '<td>R$ ' . number_format($sumResultado, 2, '.', '') . '</td>';
            echo '<td class="hidden-print">-</td>';
            echo "</tr>";
            ?>
            </tbody>
        </table>
        <!-- Fim tabela de tarefas -->
    </div>
</div>
</div>