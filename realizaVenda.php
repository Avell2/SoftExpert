<?php
require_once ("layout/header.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" name="realizaVenda" id="realizaVenda" method="post" novalidate="novalidate">
                    <input  id="index" value="0" required name="index" type="hidden" class="form-control" >
                    <input  id="valor_venda" required name="valor_venda" type="hidden" class="form-control" >
                    <div id="p_venda" class="row">
							                
                        <div class="col-lg-4">
                            <label for="produtoFinal" class="control-label mb-1">Produto:</label>
                            <select class="produtoFinal form-control" name="produtoFinal[]" id="produtoFinal0" product-id="0">
                                <option value="">Selecione</option>
                            </select>
                        </div>

                        <div class="col-lg-2">
                            <label for="tipo_produto" class="control-label mb-1">Quantidade:</label>
                            <input  id="qtd0" value="" required name="qtd[]" type="number" class="qtd form-control" product-id="0">
                        </div>

                        <div class="col-lg-2">
                            <label for="tipo_produto" class="control-label mb-1">Valor:</label><br>
                            <strong><span class="valorItem" id="valorItem0" valprod0="" product-id="0">R$ 0,00</span></strong>
                            
                        </div>

                        <div class="col-lg-2">
                            <label for="tipo_produto" class="control-label mb-1">Imposto:</label><br>
                            <strong><span class="valorImposto" id="valorImposto0" product-id="0">R$ 0,00</span></strong>
                        </div>

                        <div class="col-lg-2">
                            <br>
                            <input type="button" value="ADD ITEM" type="button" class="add_item btn btn-primary"/>
                        </div>
		                
					</div>
                    <span id="escreveVenda"></span>
                    <br>
                    <div id="" class="row">
							                
                        <div class="col-lg-4">
                            
                        </div>

                        <div class="col-lg-2">
                            <br>
                            <strong><label for="tipo_produto" class="control-label mb-1">Valores:</label></strong>
                        </div>

                        <div class="col-lg-2">
                            <label for="tipo_produto" class="control-label mb-1">Total em Produtos:</label><br>
                            <strong><span class="valorImposto" id="totprod" >R$ 0,00</span></strong>
                        </div>

                        <div class="col-lg-2">
                            <label for="tipo_produto" class="control-label mb-1">Total em Impostos:</label><br>
                            <strong><span class="valorImposto" id="totImp" >R$ 0,00</span></strong>
                        </div>

                        <div class="col-lg-2">
                            <label for="tipo_produto" class="control-label mb-1">Valor Total:</label><br>
                            <strong><span class="valorTotal" id="total" >R$ 0,00</span></strong>
                        </div>
		                
					</div>
                </form>
                <input onclick="vendeProduto()" value="Vender" type="button" class="btn btn-primary"/>
                <a href="vendas.php" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once ("layout/footer.php");
?>
<script src="src/js/tipoProduto/listagem.js"></script>
<script src="src/js/produto/cadastro.js"></script>
<script src="src/js/vendas/cadastro.js"></script>
<script src="src/js/produto/listagem.js"></script>
<script src="src/js/vendas/listagem.js"></script>
<script>
    carregaSelectProduto('', 'produtoFinal0');
</script>