function listaImpostos(){
    var method = "listaTodos";
    var classe = "listagemPercentual";
    var data = "Method=" + method + "&classe="+classe;
    var table = document.getElementById("listagemImpostos");
    var linha = 1;
    $.ajax({
        url: "src/js/impostos/impostos.php",
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

                cell1.innerHTML = value.nome;
                cell2.innerHTML = value.percental;
                cell3.innerHTML = '<a href="#" onclick="telaEdicao('+value.id_imposto+')">Editar</a>';
                cell4.innerHTML = '<a href="#" onclick="deleteImpostos('+value.id_imposto+')">excluir</a>';
                linha++;

            });
        }
    });
}

function carregaImposto(id_imposto){

    var method = "listaOne";
    var classe = "listagemPercentual";
    var data = "Method=" + method + "&classe="+classe+ "&id_imposto="+id_imposto;
    $.ajax({
        url: "src/js/impostos/impostos.php",
        type:"post",
        method: "POST",
        data: data,
        success: function (data) {
            $("#Nome").val(data[0].nome);
            $("#percentual").val(data[0].percental);
        }
    });

}

function carregaTipoImpostos(id_imposto, elemento){
    var method = "listaTodos";
    var classe = "listagemPercentual";
    var data = "Method=" + method + "&classe="+classe;
    $.ajax({
        url: "src/js/impostos/impostos.php",
        type:"post",
        method: "POST",
        data: data,
        success: function (data) {
            $.each(data, function(index, value) {
                if(value.id_imposto != id_imposto){
                    $('#'+elemento).append($("<option />").val(value.id_imposto).text(value.nome));
                }else{
                    $('#'+elemento).append($("<option />").prop('selected', true).val(value.id_imposto).text(value.nome));
                }
            });
        }
    });
}