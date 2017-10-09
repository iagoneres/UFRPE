<?php require_once('functions.php'); ?>

<!-- Modal de Supply -->
<div class="modal fade" id="occurrence-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel">Registro de Ocorrência</h4>
      </div>
      <div class="modal-body">
        <form class="" action="ocorrencias.php" method="post">

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <select id="CmbCategory" class="form-control" name="category['category_id']">
                <?php if ($categories) : ?>
                  <option value="">Selecione a Categoria</option>
          				<?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_description']; ?></option>
                  <?php endforeach; ?>
                <?php else : ?>
                    <option value="notFound">Nenhuma categoria encontrado.</td>
                <?php endif; ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <select id="CmbEvent" class="form-control" name="occurrence['event_id']">
              </select>
              <script type="text/javascript">
                $(document).ready(function() {
                  $('#CmbCategory').change(function(e) {
                      $('#CmbEvent').empty();
                      var id = $(this).val();

                      $.post('call_events.php', {category_id: id}, function(data){
                          var cmb = '<option value="">Selecione o Evento</option>';
                          $.each(data, function (index, value){
                              cmb = cmb + '<option value="' + value.event_id + '">' + value.event_description + '</option>';
                          });
                          $('#CmbEvent').html(cmb);
                      }, 'json');
                  });
                });
              </script>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
      				<div class="form-group label-floating is-empty">
      					<label class="control-label">Comentário</label>
      					<input id="Nome" type="text" class="form-control date" name="occurrence['occurrence_comment']">
      				  <span class="material-input"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
      				<div class="form-group">

                <!-- $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lon&key=<AQUI ESTÁ MINHA API KEY>"; -->

      					<input  type="hidden" class="form-control date" name="occurrence['user_cpf']" value="<?php echo $_SESSION['logged_id'] ?>">
                <input id="lat" type="hidden" class="form-control date" name="occurrence['occurrence_lat']" value="">
                <input id="lon" type="hidden" class="form-control date" name="occurrence['occurrence_lon']" value="">

                

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-info"name="button">Registra Ocorrência</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
          </div>

        </form>
      </div> <!-- /modal-body -->

      <div class="modal-footer">

      </div> <!-- /modal-footer -->

    </div>
  </div>

</div> <!-- /.modal -->
