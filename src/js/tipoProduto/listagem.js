function listaTipos(){
    var method = "listaTodos";
    var classe = "listagemTipoProduto";
    var data = "Method=" + method + "&classe="+classe;
    var table = document.getElementById("listagemImpostos");
    var linha = 1;
    $.ajax({
        url: "src/js/tipoProduto/tipoProduto.php",
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

                cell1.innerHTML = value.tipo_nome;
                cell2.innerHTML = value.imposto;
                cell3.innerHTML = '<a href="#" onclick="telaEdicaoTipoProdutos('+value.id_tipo_produto+')">Editar</a>';
                cell4.innerHTML = '<a href="#" onclick="deleteTipoProduto('+value.id_tipo_produto+')">excluir</a>';
                linha++;

            });
        }
    });
}

function  carregaTipoProduto(id_tipo_produto){

    var method = "listaOne";
    var classe = "listagemTipoProduto";
    var data = "Method=" + method + "&classe="+classe+ "&id_tipo_produto="+id_tipo_produto;
    $.ajax({
        url: "src/js/tipoProduto/tipoProduto.php",
        type:"post",
        method: "POST",
        data: data,
        success: function (data) {
            $("#Nome").val(data.tipo_nome);
            carregaTipoImpostos(data.id_imposto,'percentual');
        }
    });

}

function carregaSelectTipoProduto(id_tipo_produto, elemento){
    var method = "listaTodos";
    var classe = "listagemTipoProduto";
    var data = "Method=" + method + "&classe="+classe;
    $.ajax({
        url: "src/js/tipoProduto/tipoProduto.php",
        type:"post",
        method: "POST",
        data: data,
        success: function (data) {
            $.each(data, function(index, value) {
                if(value.id_tipo_produto != id_tipo_produto){
                    $('#'+elemento).append($("<option />").val(value.id_tipo_produto).text(value.tipo_nome));
                }else{
                    $('#'+elemento).append($("<option />").prop('selected', true).val(value.id_tipo_produto).text(value.tipo_nome));
                }
            });
        }
    });
}