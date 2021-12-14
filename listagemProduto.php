<?php
require_once ("layout/header.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="cadastroProduto.php" class="btn btn-success">Incluir</a><br><br>
                <table id="listagemProdutos" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Tipo do Produto</th>
                            <th scope="col">Preço</th>
                            <th class="text-center" colspan="2" scope="col">&nbsp;</th>
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
<script src="src/js/produto/listagem.js"></script>
<script src="src/js/produto/atualiza.js"></script>
<script src="src/js/produto/delete.js"></script>
<script>

    listaProdutos();

</script>