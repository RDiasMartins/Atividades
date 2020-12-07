<script>

    $(function(){

       var i; 

       function define_alterar_remover(){ 
       
        $(".alterar_tipo").click(function(){

            i = $(this).val();
            
            $.get("seleciona_tipo.php", {"id_tipo": i},function(r){
                a = r[0];                            
                $("input[name='nome_tipo']").val(a.nome);
            });
        });

        $(".remover_tipo").click(function(){

            i = $(this).val();
            t = "tipos";
            c = "id_tipo";
            p = {tabela:t, id:i, coluna:c};
            $.post("remover.php", p, function(r){
                if(r==1){
                    $("#msg").html("Tipo removido com sucesso.");
                    $("button[value='"+ i + "']").closest("li").remove();
                }else{
                    $("#msg").html("O tipo tem lojas, remova as lojas antes de remover o tipo!");
                }
            });

        });

       }

       define_alterar_remover();

       $(".salvar").click(function(){ 
           p = {
                id_tipo:i,
                nome:$("input[name='nome_tipo']").val(),
           };        
           
           $.post("atualizar_tipo.php", p ,function(r){
            if(r=='1'){
                $("#msg").html("Tipo alterado com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar o tipo.");
            }
           });
       });

       function atualizar_tabela(){           
        $.get("seleciona_tipo.php",function(r){
            t = "";
            $.each(r,function(i,a){   
                t += "<li><h4>";             
                t += a.nome;
                t += "<button class='alterar_tipo' value="+a.id_tipo+" data-toggle='modal' data-target='#modal'>✏️</button> ";
                t += "<button class='remover_tipo' value="+a.id_tipo+">ˣ</button>";
                t += "</h4></li>";    
            });           
            $("#tbody_tipo").html(t);
            define_alterar_remover();
        });
        }

    });

</script>
