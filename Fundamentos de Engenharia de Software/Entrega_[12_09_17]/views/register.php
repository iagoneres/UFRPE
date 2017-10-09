<?
require_once('functions.php');

$TITLE = 'SmartOutlook | Cadastro';
include(HEADER_TEMPLATE);
?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 mt-100">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Cadastrar Perfil</h4>
            <p class="category"></p>
          </div>
          <div class="card-content">
            <form>
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label">Nome Completo</label>
                    <input class="form-control" type="text">
                  <span class="material-input"></span></div>
                </div>

                <div class="col-md-3">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label">Data de Nascimento</label>
                    <input class="form-control" type="text">
                  <span class="material-input"></span></div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <select class="form-control" id="">
                      <optgroup label="Sexo">
                        <option value="">Informe seu sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                      </optgroup>
                    </select>
                    </div>
                </div>

              </div>
              <div class="row">

                <div class="col-md-3">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label">CPF</label>
                    <input class="form-control" type="text">
                  <span class="material-input"></span></div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label">Email</label>
                    <input class="form-control" type="email">
                  <span class="material-input"></span></div>
                </div>
                <div class="col-md-3">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label">Senha</label>
                    <input class="form-control" type="password">
                  <span class="material-input"></span></div>
                </div>

              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group label-floating is-empty">
                          <label class="control-label">Rua</label>
                          <input class="form-control" type="text">
                      <span class="material-input"></span></div>
                  </div>
                  <div class="col-md-2">
                      <div class="form-group label-floating is-empty">
                          <label class="control-label">Número</label>
                          <input class="form-control" type="text">
                      <span class="material-input"></span></div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group label-floating is-empty">
                          <label class="control-label">Complemento</label>
                          <input class="form-control" type="text">
                      <span class="material-input"></span></div>
                  </div>

              </div>
              <div class="row">

                  <div class="col-md-3">
                      <div class="form-group label-floating is-empty">
                          <label class="control-label">CEP</label>
                          <input class="form-control" type="text">
                          <span class="material-input"></span>
                        </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group label-floating is-empty">
                          <label class="control-label">Bairro</label>
                          <input class="form-control" type="text">
                          <span class="material-input"></span>
                        </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group label-floating is-empty">
                          <label class="control-label">Recife</label>
                          <input class="form-control" disabled="" type="text">
                          <span class="material-input"></span>
                        </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group label-floating is-empty">
                        <label class="control-label">Brasil</label>
                        <input class="form-control" disabled="" type="text">
                        <span class="material-input"></span>
                      </div>
                  </div>

              </div>
              <button type="submit" class="btn btn-primary pull-right">Atualizar Perfil</button>
              <div class="clearfix"></div>
            </form>
          </div>
          </div>
      </div>
    </div>
  </div>
</div>
