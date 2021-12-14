const FALHA = "Falha no cadastro";
const SUCESSO = "Inscerção realizada com sucesso";
const ERROR = "Erro no cadastro";
function validar() {
    var nome = document.getElementById("Nome");
    var percentual = document.getElementById("percentual");
    var i = 0;
    if (nome.value == "") {
      alert("Nome não informado");
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

$(document).on("click",".gravaUpdateTipoProduto", function () {
    var id_tipo_produto = JSON.parse(sessionStorage.getItem('id_tipo_produtos'));
    var dados = $('#updateTipoProduto').serialize()
    dados = dados + '&Method=update';
    dados = dados + '&classe=atualizaTipoProduto';
    dados = dados + '&id_tipo_produto='+id_tipo_produto;


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
                }else{
                    alert(data);
                }
            },
            error: function(data) { 
                alert("Erro, contate o administrador do sistema")
            } 
        });


    }
    
   
});

function telaEdicaoTipoProdutos(id){
    sessionStorage.setItem("id_tipo_produtos", JSON.stringify(id));
    location.href = "atualizaTipoProduto.php";
}