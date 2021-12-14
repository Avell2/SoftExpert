function vendeProduto() {

    var dados = $('#realizaVenda').serialize()
    dados = dados + '&Method=create';
    dados = dados + '&classe=cadastroVenda';


    $.ajax({
        url: "src/js/vendas/venda.php",
        type:"post",
        method: "POST",
        data: dados,
        success: function (data) {
            if(SUCESSO == data){
                alert(data);
                document.location.href="vendas.php";
                return;
            }
            alert(data);
        },
        error: function(data) { 
            alert("Erro, contate o administrador do sistema")
        } 
    });    


    
    
   
}