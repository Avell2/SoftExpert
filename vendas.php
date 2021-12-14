<?php
require_once ("layout/header.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="realizaVenda.php" class="btn btn-success">Realizar Venda</a><br><br>
                <table id="listagemProdutos" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Data da Venda</th>
                            <th scope="col">Valor Total + Impostos</th>
                        </tr>
                    </thead>
                    <tbody id="corpo_tabela">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
require_once ("layout/footer.php");
?>
<script src="src/js/vendas/listagem.js"></script>
<script src="src/js/vendas/cadastro.js"></script>
<script>

    listaVendas();

</script>