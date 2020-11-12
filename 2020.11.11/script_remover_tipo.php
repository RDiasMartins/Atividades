<script>
    $(function(){
       $(".remover").click(function(){
           i = $(this).val();
           c = "id_tipo";
           t = "tipo";
           p = {tabela: t, id:i, coluna:c}
           $.post("remover.php",p,function(r){
            if(r=='1'){                
                $("#msg").html("Tipo removido com sucesso.");
                $("button[value='"+ i +"']").closest("tr").remove();
            }
           });
       }); 
    });
</script>