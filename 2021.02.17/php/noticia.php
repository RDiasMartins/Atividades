<?php
    session_start();

    include 'const_cookie.php';
    include 'cabecalho.php';

    $nomeCookie = COOKIE;
    $cookie = base64_decode($_COOKIE[$nomeCookie]);
    if(!isset($_SESSION['valorCookie'])){
      header('Location: gravar_cookie.php');
    }else if($cookie>5){
?>
      <button type="button" id="botao" class="btn btn-primary" data-toggle="modal" data-target="#modal" style="display:block;"></button>
      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title" id="exampleModalLongTitle"><b>Atenção</b></h1>
            </div>
            <div class="modal-body">
              Limite de acessos atingido!<br>
              Deseja tornar-se um assinante?<a class="btn btn-link" href="#">Cadastrar</a><br>
              Já é assinante? Clique aqui para entrar<a class="btn btn-link" href="login.php">Login</a>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        $(document).ready(function() {
            $("#botao").hide();
            $("#modal").modal("show");
        });

        $('#modal').modal({
          backdrop: 'static', keyboard: false
        });
      </script>
<?php
    }else{
?>

      <h1 class="text-center">NOTÍCIA</h1>
      <div class="container">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">Título</h5>
            <p class="card-text">Descrição.</p>
          </div>
        </div>
      </div>
<?php
    }
?>