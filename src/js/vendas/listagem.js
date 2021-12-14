$(document).on('click', '.add_item', function () {
    
    var indice_atual = $('#index').val();
    indice_atual++;
    const vendas = $('#p_venda').eq(0).clone();
    vendas.find('.add_item').remove('.add_item')
    vendas.find('.produtoFinal').attr('product-id', indice_atual);
    vendas.find('.qtd').attr('product-id', indice_atual);
    vendas.find('.qtd').addClass('qtdB');
    vendas.find('.valorItem').attr('product-id', indice_atual);
    vendas.find('.valorImposto').attr('product-id', indice_atual);
    vendas.find('.qtd').val(0);
    vendas.find('.valorItem').html('R$ 0,00');
    vendas.find('.valorImposto').html('R$ 0,00');

    vendas.find('.produtoFinal').attr('id', 'produtoFinal'+indice_atual);
    vendas.find('.valorItem').attr('id', 'valorItem'+indice_atual);
    vendas.find('.valorImposto').attr('id', 'valorImposto'+indice_atual);

    $('#escreveVenda').append(vendas);
    $('#index').val(indice_atual);
});

$(document).on('click', '.removeItem', function () {
    $(this).closest('.row').remove();
});

$(document).on("change",".qtd", function () {

    var product_id = $(this).attr('product-id');
    var valor_qtd = $(this).val();
    var id_produto = document.getElementById('produtoFinal'+product_id).value;
    var indice_atual = $('#index').val();
    var method = "listaOne";
    var classe = "listagemProduto";
    var data = "Method=" + method + "&classe="+classe+ "&id_produto="+id_produto;
    $.ajax({
        url: "src/js/produto/produto.php",
        type:"post",
        method: "POST",
        data: data,
        success: function (data) {
            var valor_total = data[0].valor*valor_qtd;
            $('#valorItem'+product_id).html(numberFormat(valor_total));
            $('#valorItem'+product_id).attr('valprod'+product_id,valor_total);
            calculaImposto(valor_total, data[0].id_tipo_produto, product_id)
            var result = 0;
            for(var i = 0; i <= product_id; i++){
                result = result + parseInt($('#valorItem'+i).attr('valprod'+i))
            }
            $('#totprod').attr('getval',result);
            $('#totprod').html(numberFormat(result));

            
            
        }
    });

});

$(document).on("blur",".qtd", function () {
    var impostos =  parseFloat($('#totImp').attr('getimp'));
    var valores =  parseFloat($('#totprod').attr('getval'));
    var valorGeral = valores + impostos;
    $("#total").html(numberFormat(valorGeral));
    $("#valor_venda").val(valorGeral);

});

function calculaValProd(valor_total){

    
    $('#totprod').attr('sumvalprod', valor_total);
    var sumvalprodB = $('#totprod').attr('sumvalprod');
    $('#totprod').html(numberFormat(sumvalprodB));

}

function calculaImposto(valor_total, id_tipo_produto, product_id){

    var method = "listaOne";
    var classe = "listagemTipoProduto";
    var data = "Method=" + method + "&classe="+classe+ "&id_tipo_produto="+id_tipo_produto;
    $.ajax({
        url: "src/js/tipoProduto/tipoProduto.php",
        type:"post",
        method: "POST",
        data: data,
        success: function (data) {
            var valor_imposto = data.imposto/100 * valor_total;
            $('#valorImposto'+product_id).html(numberFormat(valor_imposto));
            $('#valorImposto'+product_id).attr('valimpost'+product_id,valor_imposto);
            var result = 0;
            for(var i = 0; i <= product_id; i++){
                result = result + parseFloat($('#valorImposto'+i).attr('valimpost'+i))
            }
            $('#totImp').attr('getimp',result);
            $('#totImp').html(numberFormat(result));
            
        }
    });

}

function numberFormat(val){

    var formatter = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    });

    return formatter.format(val);

}

function listaVendas(){

    var method = "listaTodos";
    var classe = "listagemVenda";
    var data = "Method=" + method + "&classe="+classe;
    var table = document.getElementById("listagemProdutos");
    var linha = 1;
    $.ajax({
        url: "src/js/vendas/venda.php",
        type:"post",
        method: "POST",
        data: data,
        success: function (data) {
            $.each(data, function(index, value) {
                var row = table.insertRow(linha);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
               
                

                cell1.innerHTML = value.data_venda;
                cell2.innerHTML = value.preco;
                
                linha++;

            });
        }
    });

}

