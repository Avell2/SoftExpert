<?php
require_once ("layout/header.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <form enctype="multipart/form-data" name="updateTipoProduto" id="updateTipoProduto" method="post" novalidate="novalidate">
                    <div class="row">
							                
                        <div class="col-lg-6">
                            <label for="Nome" class="control-label mb-1">Tipo do Produto:</label>
                            <input  id="Nome" value="" required name="Nome" type="text" class="form-control" >   
                        </div>

                        <div class="col-lg-6">
                            <label for="percentual" class="control-label mb-1">Tipo de Imposto:</label>
                            <select class="form-control" name="percentual" id="percentual">
                                <option value="">Selecione</option>
                            </select>
                        </div>
		                
					</div><br>

                    <input value="Gravar" type="button" class="gravaUpdateTipoProduto btn btn-primary"/>
                    <a href="listagemTipoProduto.php" class="btn btn-secondary">Voltar</a>
                </form> 
                
            </div>
        </div>
    </div>
</div>

<?php
require_once ("layout/footer.php");
?>
<script src="src/js/tipoProduto/atualiza.js"></script>
<script src="src/js/impostos/listagem.js"></script>
<script src="src/js/tipoProduto/listagem.js"></script>
<script>
    var id_tipo_produtos = JSON.parse(sessionStorage.getItem('id_tipo_produtos'));
    

    if (id_tipo_produtos === null) {
        alert("Pagina não encontrada");
        self.location.href='listagem.php';
    }else{         
        carregaTipoProduto(id_tipo_produtos);
    }
    
</script>