const FALHA = "Falha no cadastro";
const SUCESSO = "Inscerção realizada com sucesso";
const ERROR = "Erro no cadastro";
function validar() {
    var nome = document.getElementById("Nome");
    var tipo_produto = document.getElementById("tipo_produto");
    var preco = document.getElementById("preco");

    var i = 0;
    if (nome.value == "") {
      alert("Nome do produto não informado");
      nome.focus();
      i++;
      return i;
    }
    if (tipo_produto.value == "") {
      alert("Tipo do produto não informado");
      tipo_produto.focus();
      i++;
      return i;
    }

    if (preco.value == "") {
      alert("Tipo do produto não informado");
      preco.focus();
      i++;
      return i;
    }

    return i;

}

$(document).on("click",".gravaUpdateProduto", function () {
    var id_produto = JSON.parse(sessionStorage.getItem('id_produto'));
    var dados = $('#updateProduto').serialize()
    dados = dados + '&Method=update';
    dados = dados + '&classe=atualizaProduto';
    dados = dados + '&id_produto='+id_produto;


    erros = validar();
    if(erros == 0){

        $.ajax({
            url: "src/js/produto/produto.php",
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

function telaEdicaoProduto(id){
    sessionStorage.setItem("id_produto", JSON.stringify(id));
    location.href = "atualizaProduto.php";
}