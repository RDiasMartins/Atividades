<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='UTF-8'/>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <meta name ='viewport' content='width=device-width, initial-scale=1'/>
        <link rel = 'stylesheet' href = '../css/bootstrap.min.css'/>
        <script src = '../js/jquery-3.5.1.min.js'></script>
        <script src = '../js/popper.min.js'></script>
        <script src = '../js/bootstrap.min.js'></script>
        <script src = '../js/md5.js'></script>
        <script src = '../js/login.js'></script>

        <title>Faça o Login</title>
    </head>
    <body onload = 'geraForm("login")'>
        <main>
            <div class = 'container'>
                <form method = 'POST' id = 'form' onsubmit = 'submitForm()'>
                </form>
            </div>
        </main>
    </body>
</html>