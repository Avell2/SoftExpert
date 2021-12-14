const FALHA = "Falha no cadastro";
const SUCESSO = "Inscerção realizada com sucesso";
const ERROR = "Erro no cadastro";
function validar() {
    var nome = document.getElementById("Nome");
    var percentual = document.getElementById("percentual");
    var i = 0;
    if (nome.value == "") {
      alert("Tipo do produto não informado");
      nome.focus();
      i++;
      return i;
    }
    if (percentual.value == "") {
      alert("Percentual não informado");
      percentual.focus();
      i++;
      return i;
    }

    return i;

}

function gravaTipoProduto() {

    var dados = $('#cadastroTipoProduto').serialize()
    dados = dados + '&Method=create';
    dados = dados + '&classe=cadastroTipoProduto';


    erros = validar();
    if(erros == 0){

        $.ajax({
            url: "src/js/tipoProduto/tipoProduto.php",
            type:"post",
            method: "POST",
            data: dados,
            success: function (data) {
                if(data == FALHA){
                    alert(data);
                }else if(SUCESSO == data){
                    alert(data);
                    document.location.href="listagemTipoProduto.php"
                }else{
                    alert(data);
                }
            },
            error: function(data) { 
                alert("Erro, contate o administrador do sistema")
            } 
        });


    }
    
   
}