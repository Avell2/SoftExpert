function deleteProduto(id_produto){

    var method = "delete";
    var classe = "deleteProduto";
    
    var r = confirm("Após a exclusão essa ação não poderá ser desfeita");
    if (r == true) {
        var data = "Method=" + method + "&classe=" + classe + "&id_produto="+id_produto;
       $.ajax({
            cache:false,
            url: "src/js/produto/produto.php",
            type:"post",
            data:data,
            success: function (data) {  
               alert(data);
               document.location.reload();
            }
            
        });
    }
}