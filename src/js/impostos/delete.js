function deleteImpostos(id_impostos){

    var method = "delete";
    var classe = "deletePercentual";
    
    var r = confirm("Após a exclusão essa ação não poderá ser desfeita");
    if (r == true) {
        var data = "Method=" + method + "&classe=" + classe + "&id_impostos="+id_impostos;
       $.ajax({
            cache:false,
            url: "src/js/impostos/impostos.php",
            type:"post",
            data:data,
            success: function (data) {  
               alert("Exclusão realizada com sucesso");
               document.location.reload();
            }
            
        });
    }
}