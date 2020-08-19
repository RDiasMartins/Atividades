<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8"/>
        <title> Engenharia reversa </title>
        <script src="jquery-3.3.1.min.js"></script>
        <style>
            .imagem {
                height: 100px;
                width: 100px;
            }

            .box{
                margin-bottom: 10px;
            }

            .msg{
                color:red;
                font-weight: bold;
            }
        </style>
    </head>
    <script>
        $(document).ready(function(){
            $("select[name='ocultar']").change(function(){
                var imagem = $("select[name='ocultar']").val();
                var display = $("#"+imagem).css("display");

                if(display == "none"){
                    $("#msg").html('Imagem '+imagem+' já ocultada!');
                }else{
                    $("#msg").html('');
                    $("#"+imagem).fadeOut();
                }
                var imagem = $("select[name='ocultar']").val("");
            });

            $("select[name='mostrar']").change(function(){
                var imagem = $("select[name='mostrar']").val();
                var display = $("#"+imagem).css("display");

                if(display != "none"){
                    $("#msg").html('Imagem '+imagem+' já está na tela!');
                }else{
                    $("#msg").html('');
                    $("#"+imagem).fadeIn();
                }

                var imagem = $("select[name='mostrar']").val("");
            });
        });
    </script>
    <body>
        <div class = "box" >
            <select name = "ocultar">
                <option value = "">Selecione qual ocultar</option>
                <option value = "1">Imagem 1</option>
                <option value = "2">Imagem 2</option>
                <option value = "3">Imagem 3</option>
                <option value = "4">Imagem 4</option>
                <option value = "5">Imagem 5</option>
                <option value = "6">Imagem 6</option>
                <option value = "7">Imagem 7</option>
                <option value = "8">Imagem 8</option>
            </select>

            <select name = "mostrar">
                <option value = "">Selecione qual mostrar</option>
                <option value = "1">Imagem 1</option>
                <option value = "2">Imagem 2</option>
                <option value = "3">Imagem 3</option>
                <option value = "4">Imagem 4</option>
                <option value = "5">Imagem 5</option>
                <option value = "6">Imagem 6</option>
                <option value = "7">Imagem 7</option>
                <option value = "8">Imagem 8</option>
            </select>
        </div>

        <div class ="msg" id="msg"></div>
        <hr>

        <div class = "imagens">
            <img id = "1" class = "imagem" src="img/img1.png"/>
            <img id = "2" class = "imagem" src="img/img2.png"/>
            <img id = "3" class = "imagem" src="img/img3.png"/>
            <img id = "4" class = "imagem" src="img/img4.png"/>
            <img id = "5" class = "imagem" src="img/img5.png"/>
            <img id = "6" class = "imagem" src="img/img6.png"/>
            <img id = "7" class = "imagem" src="img/img7.png"/>
            <img id = "8" class = "imagem" src="img/img8.png"/>
        </div>
    </body>
</html>
