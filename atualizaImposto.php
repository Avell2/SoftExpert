<?php
require_once ("layout/header.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <form enctype="multipart/form-data" name="updateImposto" id="updateImposto" method="post" novalidate="novalidate">
                    <div class="row">
							                
                        <div class="col-lg-6">
                            <label for="Nome" class="control-label mb-1">Nome Imposto:</label>
                            <input  id="Nome" value="" required name="Nome" type="text" class="form-control" >   
                        </div>

                        <div class="col-lg-6">
                            <label for="percentual" class="control-label mb-1">Percentual:</label>
                            <input id="percentual" value="" required name="percentual" class="form-control" >   
                        </div>
		                
					</div><br>

                    <input value="Gravar" type="button" class="gravaUpdateImposto btn btn-primary"/>
                    <a href="listagemImposto.php" class="btn btn-secondary">Voltar</a>
                </form> 
                
            </div>
        </div>
    </div>
</div>

<?php
require_once ("layout/footer.php");
?>
<script src="src/js/impostos/atualiza.js"></script>
<script src="src/js/impostos/listagem.js"></script>
<script>
    $('#percentual').mask('99.99');
    var id_imposto = JSON.parse(sessionStorage.getItem('id_imposto'));


    if (id_imposto === null) {
        alert("Pagina não encontrada");
        self.location.href='listagem.php';
    }else{          
        carregaImposto(id_imposto);
    }
    
</script>