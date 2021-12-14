<?php
require_once ("layout/header.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <form enctype="multipart/form-data" name="updateProduto" id="updateProduto" method="post" novalidate="novalidate">
                    <div class="row">
							                
                        <div class="col-lg-6">
                            <label for="Nome" class="control-label mb-1">Produto:</label>
                            <input  id="Nome" value="" required name="Nome" type="text" class="form-control" >   
                        </div>

                        <div class="col-lg-6">
                            <label for="tipo_produto" class="control-label mb-1">Tipo de Produto:</label>
                            <select class="form-control" name="tipo_produto" id="tipo_produto">
                                <option value="">Selecione</option>
                            </select>
                        </div>
		                
					</div>
                    
                    <div class="row">
							                
                        <div class="col-lg-6">
                            <label for="preco" class="control-label mb-1">Preço</label>
                            <input  id="preco" onfocus="mascara();" value="" required name="preco" type="text" class="ValoresItens form-control" >   
                        </div>
		                
					</div>
                    
                    
                    <br>

                    <input value="Gravar" type="button" class="gravaUpdateProduto btn btn-primary"/>
                    <a href="listagemProduto.php" class="btn btn-secondary">Voltar</a>
                </form> 
                
            </div>
        </div>
    </div>
</div>

<?php
require_once ("layout/footer.php");
?>
<script src="src/js/produto/listagem.js"></script>
<script src="src/js/tipoProduto/listagem.js"></script>
<script src="src/js/produto/atualiza.js"></script>
<script>
    function mascara(){
        $(".ValoresItens").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: true, allowZero:true, allowNegative: true});
    }
    var id_produto = JSON.parse(sessionStorage.getItem('id_produto'));


    if (id_produto === null) {
        alert("Pagina não encontrada");
        self.location.href='listagem.php';
    }else{          
        carregaProduto(id_produto);
    }
</script>