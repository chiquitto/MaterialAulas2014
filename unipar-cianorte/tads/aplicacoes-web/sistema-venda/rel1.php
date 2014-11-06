<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();


?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Compras por cliente</title>

        <?php headCss(); ?>
    </head>
    <body>

        <?php include 'nav.php'; ?>

        <div class="container">

            <div class="page-header">
                <h1><i class="fa fa-reorder"></i> Compras por cliente</h1>
            </div>

            <?php if ($msg) { msgHtml($msg); } ?>

            <form role="form" method="get" action="rel1-imprimir.php">
                <div class="row">
                    <div class="form-group col-sm-6 col-xs-6">
                      <label for="fsenha">Período</label>
                      <select id="fcategoria" name="periodo" class="form-control" required>
                        <option value="1">Última semana</option>
                        <option value="2">Últimos quinze dias</option>
                        <option value="3">Últimos 30 dias</option>
                        <option value="4">Últimos 3 meses</option>
                        <option value="5">Neste ano</option>
                        <option value="6">Último ano</option>
                      </select>
                    </div>
                </div>

                <div class="checkbox">
                    <label for="fativo">
                        <input type="checkbox" name="ativo" id="fativo" value="1"> Clientes ativos
                    </label>
                </div>

                <div class="checkbox">
                    <label for="fagrupar">
                        <input type="checkbox" name="agrupar" id="fagrupar" value="1"> Agrupar por cliente
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </form>

        </div>

        <script src="./lib/jquery.js"></script>
        <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>