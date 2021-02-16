<!DOCTYPE html>
<html lang = "pt-br">
  <head>
      <meta charset = 'UTF-8'/>
      <meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'/>
      <meta name = 'viewport' content = 'width=device-width, initial-scale=1'/>

      <link rel = 'stylesheet' href = '../css/bootstrap.min.css'/>
      <link rel = 'stylesheet' href = '../css/bootstrap.css'/>
      <link rel = 'stylesheet' href = '../css/w3.css'/>

      <script src = '../js/jquery-3.5.1.min.js'></script>
      <script src = '../js/popper.min.js'></script>
      <script src = '../js/bootstrap.min.js'></script>
      <script src = '../js/bootstrap.js'></script>
      <script src = '../js/md5.js'></script>
      <noscript>Seu navegador não suporta JavaScript</noscript>

      <title>Projeto 4Bim</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light bg-dark">
      <div class = "navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2"></div>
      <div class="mx-auto order-0">
        <ul class = "navbar-nav ml-auto">
          <li class = "nav-item text-white">
            <a class = "mx-auto text-white" href = "index.php">ProjetoWEB</a>
          </li>
        </ul>
        <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = ".dual-collapse2">
          <span class = "navbar-toggler-icon"></span>
        </button>
      </div>
      <div class = "navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class = "navbar-nav ml-auto">
          <li class = "nav-item">
            <?php
              if(!isset($_SESSION['nome'])){
                echo '            
                  <a class = "mx-auto text-white" href = "cadastro.php">Cadastro</a>
                  <a class = "mx-auto text-white" href = "login.php">Entrar</a>
                ';
              }else{
                echo '
                  <a class = "mx-auto text-white" href = "logout.php">Logout</a>
                ';
              }
            ?>
          </li>
        </ul>
      </div>
    </nav>
  </body>
</html>

