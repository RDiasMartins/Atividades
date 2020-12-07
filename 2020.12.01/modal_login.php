<script src ="js/jquery-3.5.1.min.js"></script>
<script src ="js/MD5.js"></script>
<script>
    $(function(){
        $(".autenticar").click(function(){
            var senha_md5 = $.md5($("input[name='senha']").val());
            $("input[name='senha']").val(senha_md5);
            $("#login").submit();
        });
    });
</script>



<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="login" method="post" action="autenticacao.php">
          <input type="email" name="email" placeholder="Email..."> <br><br>
          <input type="password" name="senha" placeholder="Senha..."> <br><br>
        </form>
        <h6>Ainda não é cadastrado? <strong><a href="">Cadastre-se Aqui</a></strong></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn-sm btn-primary">Autenticar</button>
      </div>
    </div>
  </div>
</div>