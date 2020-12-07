<script>

    $(function(){

       var id_loja; 

       function define_alterar_remover(){ 
       
        $(".alterar_loja").click(function(){

            id_loja = $(this).val();
            
            $.get("seleciona_loja.php", {"id_loja": id_loja},function(r){
                a = r[0];
                $("input[name='nome_loja']").val(a.nome_loja);
            });
        });

        $(".remover_loja").click(function(){
            
            i = $(this).val();
            t = "loja";
            c = "id_loja";
            p = {tabela:t, id:i, coluna:c};
            $.post("remover.php", p, function(r){
                if(r==1){
                    $("#msg").html("Loja removido com sucesso.");
                    $("button[value='"+ i + "']").closest("li").remove();
                }else{
                    $("#msg").html("Erro ao remover a loja!");
                }
            });

        });

       }

       define_alterar_remover();

       $(".salvar").click(function(){       
           p = {
                id_loja:id_loja,
                nome:$("input[name='nome_loja']").val(),
           };
           
           
           $.post("atualizar_loja.php", p ,function(r){
            console.log(r);
            if(r=='1'){
                $("#msg").html("Loja alterada com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar o loja.");
            }
           });
       });

       function atualizar_tabela(){           
        $.get("seleciona_loja.php",function(r){
            t = "";
            t+= "<table>";
            t+=     "<tr>";
            t+=         "<th>Nome</th>";
            t+=     "</tr>";
            $.each(r,function(i,a){   
                t+= "<tr>"
                t+=     "<td>"+a.nome_loja+"</td>";
                t+=     "<td><button class='alterar_loja' value='$id' data-toggle='modal' data-target='#modal'>✏️</button><td> ";
                t+=     "<td><button class='remover_loja' value='$id'>X</button></td>";
                t+= "</tr>";    
            });
            t+= "</table>"           
            $("#tbody_loja").html(t);
            define_alterar_remover();
        });
        }

    });

</script>