const FALHA = "Falha no cadastro";
const SUCESSO = "Inscerção realizada com sucesso";
const ERROR = "Erro no cadastro";
function validar() {
    var nome = document.getElementById("Nome");
    var sobrenome = document.getElementById("percentual");
    var i = 0;
    if (nome.value == "") {
      alert("Nome não informado");
      nome.focus();
      i++;
      return i;
    }
    if (sobrenome.value == "") {
      alert("Percentual não informado");
      sobrenome.focus();
      i++;
      return i;
    }

    return i;

}

function gravaImposto() {

    var dados = $('#cadastroImposto').serialize()
    dados = dados + '&Method=create';
    dados = dados + '&classe=cadastroPercentual';


    erros = validar();
    if(erros == 0){

        $.ajax({
            url: "src/js/impostos/impostos.php",
            type:"post",
            method: "POST",
            data: dados,
            success: function (data) {
                if(data == FALHA){
                    alert(data);
                }else if(SUCESSO == data){
                    alert(data);
                    document.location.href="listagemImposto.php"
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