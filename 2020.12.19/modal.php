<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?=$titulo;?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include $formulario; ?>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal">Cancelar</button>
        <button type="button" class="salvar">Salvar</button>
      </div>
    </div>
  </div>
</div>