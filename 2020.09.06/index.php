<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <script src="jquery-3.3.1.min.js"></script>
        <script>

            $(document).ready(function(){
                function func(){
                    $.getJSON("https://servicodados.ibge.gov.br/api/v2/censos/nomes/ranking/?decada="+$("input[name='ano']").val(), function(valores){

                        $("#nomes").html("<tr><th width='auto' height ='20px'>Posição</th><th width='auto' height ='20px'>Nome</th><th id='muda' width='100px' height ='20px'>Idade</th></tr><tr><td id='some' colspan='3' >Preencha o nome e o ano para verificar se este nome está entre os 20 mais frequentes da década.</td></tr>");
                        $("#some").hide();
                        $("#muda").html("Frequência");

                            $.each(valores[0].res, function(indice, valor){
                                $("#nomes").html($("#nomes").html()+"<tr> <td>"+valor.ranking+"</td> <td id='achou_nome"+indice+"'>"+valor.nome+"</td> <td>"+valor.frequencia+"</td> </tr>");

                                if(valor.nome.toUpperCase()==$("input[name='nome']").val().toUpperCase()){
                                    $("#achou_nome"+indice).css('color', 'green');
                                }
                                
                            });

                    });
                }

                $("input[name='nome']").blur(function(){
                    func();
                });
                $("input[name='ano']").change(function(){
                    func();
                });
            });

        </script>
        <style>
            table, th, td{
                border: 1px solid black;
                width:auto; 
                height:20px;
            }
        </style>
    </head>

    <body>
        <input type="text" name="nome" placeholder="Nome..."></input> 
        <input type="number" name="ano" min="1930" max="2010" placeholder="Ano..." step="10" value=1930></input> <br><br>
        <table id="nomes">
            <tr>
                <th width="auto" height ="20px">Posição</th>
                <th width="auto" height ="20px">Nome</th>
                <th id="muda" width="100px" height ="20px">Idade</th>
            </tr>
            <tr>
                <td id="some" colspan="3" >Preencha o nome e o ano para verificar se este nome está entre os 20 mais frequentes da década.</td>
            </tr>
        </table>
    </body>

</html>