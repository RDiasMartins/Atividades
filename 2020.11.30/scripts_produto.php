<script>

    $(function(){

       var id_produto; 

       function define_alterar_remover(){ 
       
        $(".alterar_produto").click(function(){

            id_produto = $(this).val();
            
            $.get("seleciona_produto.php", {"id_produto": id_produto},function(r){
                a = r[0];
                $("input[name='nome_produto']").val(a.nome_produto);
                $("input[name='descricao_produto']").val(a.descricao_produto);
            });
        });

        $(".remover_produto").click(function(){
            
            i = $(this).val();
            t = "produto";
            c = "id_produto";
            p = {tabela:t, id:i, coluna:c};
            $.post("remover.php", p, function(r){
                console.log(r);
                if(r==1){
                    $("#msg").html("Produto removido com sucesso.");
                    $("button[value='"+ i + "']").closest("li").remove();
                }else{
                    $("#msg").html("Erro ao remover o produto!");
                }
            });

        });

       }

       define_alterar_remover();

       $(".salvar").click(function(){       
           p = {
                id_produto:id_produto,
                nome:$("input[name='nome_produto']").val(),
                descricao:$("input[name='descricao_produto']").val(),
           };
           
           
           $.post("atualizar_produto.php", p ,function(r){
            console.log(r);
            if(r=='1'){
                $("#msg").html("Produto alterada com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").html("Falha ao atualizar o produto.");
            }
           });
       });

       function atualizar_tabela(){           
        $.get("seleciona_produto.php",function(r){
            t = "";
            t+= "<table>";
            t+=     "<tr>";
            t+=         "<th>Nome</th>";
            t+=         "<th>Descrição</th>";
            t+=     "</tr>";
            $.each(r,function(i,a){   
                t+= "<tr>"
                t+=     "<td>"+a.nome_produto+"</td>";
                t+=     "<td>"+a.descricao_produto+"</td>";
                t+=     "<td><button class='alterar_produto' value='$id' data-toggle='modal' data-target='#modal'>✏️</button><td> ";
                t+=     "<td><button class='remover_produto' value='$id'>X</button></td>";
                t+= "</tr>";    
            });
            t+= "</table>"           
            $("#tbody_produto").html(t);
            define_alterar_remover();
        });
        }

    });

</script>