<?php
require_once ("layout/header.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="cadastroTipoProduto.php" class="btn btn-success">Incluir</a><br><br>
                <table id="listagemImpostos" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">Tipo do Imposto</th>
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
<script src="src/js/tipoProduto/listagem.js"></script>
<script src="src/js/tipoProduto/atualiza.js"></script>
<script src="src/js/tipoProduto/delete.js"></script>
<script>

    listaTipos();

</script>