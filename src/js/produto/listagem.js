function listaProdutos(){
    var method = "listaTodos";
    var classe = "listagemProduto";
    var data = "Method=" + method + "&classe="+classe;
    var table = document.getElementById("listagemProdutos");
    var linha = 1;
    $.ajax({
        url: "src/js/produto/produto.php",
        type:"post",
        method: "POST",
        data: data,
        success: function (data) {
            $.each(data, function(index, value) {
                var row = table.insertRow(linha);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);

                cell1.innerHTML = value.nome;
                cell2.innerHTML = value.tipo_produto;
                cell3.innerHTML = value.preco;
                cell4.innerHTML = '<a href="#" onclick="telaEdicaoProduto('+value.id_produto+')">Editar</a>';
                cell5.innerHTML = '<a href="#" onclick="deleteProduto('+value.id_produto+')">excluir</a>';
                linha++;

            });
        }
    });
}

function carregaProduto(id_produto){

    var method = "listaOne";
    var classe = "listagemProduto";
    var data = "Method=" + method + "&classe="+classe+ "&id_produto="+id_produto;
    $.ajax({
        url: "src/js/produto/produto.php",
        type:"post",
        method: "POST",
        data: data,
        success: function (data) {
            $("#Nome").val(data[0].nome);
            carregaSelectTipoProduto(data[0].id_tipo_produto, 'tipo_produto');
            $("#preco").val(data[0].preco);
        }
    });

}

function carregaSelectProduto(id_produto, elemento){
    var method = "listaTodos";
    var classe = "listagemProduto";
    var data = "Method=" + method + "&classe="+classe;
    $.ajax({
        url: "src/js/produto/produto.php",
        type:"post",
        method: "POST",
        data: data,
        success: function (data) {
            $.each(data, function(index, value) {
                if(value.id_produto != id_produto){
                    $('#'+elemento).append($("<option />").val(value.id_produto).text(value.nome));
                }else{
                    $('#'+elemento).append($("<option />").prop('selected', true).val(value.id_produto).text(value.nome));
                }
            });
        }
    });
}


