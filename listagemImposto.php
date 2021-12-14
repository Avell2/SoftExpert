<?php
require_once ("layout/header.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="cadastroImposto.php" class="btn btn-success">Incluir</a><br><br>
                <table id="listagemImpostos" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Percentual</th>
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
<script src="src/js/impostos/listagem.js"></script>
<script src="src/js/impostos/atualiza.js"></script>
<script src="src/js/impostos/delete.js"></script>
<script>

    listaImpostos();

</script>