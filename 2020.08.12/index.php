<!doctype html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title>Exercício Compartilhado</title>

        <style>
            #quadrado{
                    border-style:solid;
                    border-width:1px;
                    width:500px;
                    height:500px;
            }
            #quadrado2{
                    border-style:solid;
                    border-width:1px;
                    width:500px;
                    height:500px;
            }
        </style>
        <script src = "jquery-3.3.1.min.js"></script>
        <script>

            //Escreve as coisas
            $(document).ready(function(){
                $("#campo").keyup(function(){

                    var HTML = $("#campo").val();
                    $("#quadrado2").text(HTML);
                });
            });

            //CSS
            $(document).ready(function(){

                $("#negrito").click(function(){
                    var fontWeight = $("#quadrado2").css("fontWeight");

                    if(fontWeight == 400){
                        $("#quadrado2").css("fontWeight", "bold");
                    }else{
                        $("#quadrado2").css("fontWeight", "normal");
                    }
                });


                $("#italico").click(function(){
                    var fontStyle = $("#quadrado2").css("fontStyle");

                    if(fontStyle == "normal"){
                        $("#quadrado2").css("fontStyle", "italic")
                    }else{
                        $("#quadrado2").css("fontStyle", "normal")
                    }
                });


                $("#sublinhado").click(function(){
                    var textDecoration = $("#quadrado2").css("textDecoration");

                    if(textDecoration.charAt(0) == "n"){
                        $("#quadrado2").css("textDecoration", "underline")
                    }else{
                        $("#quadrado2").css("textDecoration", "none")
                    }
                });
            });
        </script>
    </head>
    <body>
        <h3> Exercício Compartilhado</h3>

        <img id = "negrito" src = "negrito.png"/>
        <img id = "italico" src = "italico.png"/>
        <img id = "sublinhado" src = "sublinhado.png"/>

        <div style = "display: table">
            <div id = "quadrado" style = "display: table-cell;">
                <textarea id = "campo" name = "campo" placeholder = "Digite aqui"></textarea>
            </div>

            <div id = "quadrado2" style = "display: table-cell;"></div>
        </div>
    </body>
</html>
