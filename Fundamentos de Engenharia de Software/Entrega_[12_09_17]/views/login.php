<?
  $error = isset($_GET['error']) ? $_GET['error'] : 0;
?>

<?
require_once('functions.php');

login();

$TITLE = 'SmartOutlook | Login';
include(HEADER_TEMPLATE);
?>

<body class="login">

  <div class="content">
    <div class="container">
      <div class="row mt-200">
        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">

          <form method="post" action="login.php">

            <div class="card card-login">
              <div class="card-header text-center" data-background-color="green">
                <h4 class="card-title">Login</h4>

              </div>

              <div class="card-content">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                  </span>
                  <div class="form-group label-floating is-empty">
                    <label class="control-label">Email address</label>
                    <input required name="login" class="form-control" type="email">
                    <span class="material-input"></span>
                  </div>
                </div>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                  </span>
                  <div class="form-group label-floating is-empty">
                    <label class="control-label">Password</label>
                    <input required name="password" class="form-control" type="password">
                    <span class="material-input"></span>
                  </div>
                </div>
              </div>

              <div class="footer text-center">
                <a href="register.php">
                  <button type="" class="btn btn-default btn-sm"> Cadastrar</button>
                </a>
                <button type="submit" class="btn btn-info btn-sm"> Entrar</button>
                <p class="copyright text-right mt-10  mr-10">
                  &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://github.com/iagoneresb">Iago Neres</a>
                </p>
              </div>

            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

<?php include(FOOTER_TEMPLATE); ?>
