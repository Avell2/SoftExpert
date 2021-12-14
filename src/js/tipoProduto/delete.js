function deleteTipoProduto(id_tipo_produto){

    var method = "delete";
    var classe = "deleteTipoProduto";
    
    var r = confirm("Após a exclusão essa ação não poderá ser desfeita");
    if (r == true) {
        var data = "Method=" + method + "&classe=" + classe + "&id_tipo_produto="+id_tipo_produto;
       $.ajax({
            cache:false,
            url: "src/js/tipoProduto/tipoProduto.php",
            type:"post",
            data:data,
            success: function (data) {  
               alert(data);
               document.location.reload();
            }
            
        });
    }
}