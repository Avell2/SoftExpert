const FALHA = "Falha no cadastro";
const SUCESSO = "Inscerção realizada com sucesso";
const ERROR = "Erro no cadastro";
function validar() {
    var nome = document.getElementById("Nome");
    var tipo_produto = document.getElementById("tipo_produto");
    var preco = document.getElementById("preco");

    var i = 0;
    if (nome.value == "") {
      alert("Nome do produto do produto não informado");
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

function gravaProduto() {

    var dados = $('#cadastroProduto').serialize()
    dados = dados + '&Method=create';
    dados = dados + '&classe=cadastroProduto';


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
                    document.location.href="listagemProduto.php"
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