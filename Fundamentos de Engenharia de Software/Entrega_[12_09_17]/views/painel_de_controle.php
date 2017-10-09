<?php
require_once('functions.php');

checkSession();
loadOccurrences();
loadOccurrencesCategory();
loadAmountOccurrences();

$TITLE = 'SmartOutlook | Painel de Controle';
$PAGE = "Painel de Controle";
include(HEADER_TEMPLATE);
?>

<?php $db = open_database(); ?>

<body>

  <?php include(SIDEBAR_TEMPLATE); ?>

  <?php if ($db) : ?>

  	<div class="content">
  		<div class="container-fluid">
  			<div class="row">

  				<div class="col-lg-3 col-md-6 col-sm-6">
  					<div class="card card-stats">
  						<div class="card-header" data-background-color="green">
                <i class="fa fa-tree" aria-hidden="true"></i>
  						</div>
  						<div class="card-content">
  							<p class="category fs-12">Árvores Plantadas</p>
  							<h3 class="title">20</h3>
  						</div>
  						<div class="card-footer">
  							<div class="stats">
                  <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Este mês
  							</div>
  						</div>
  					</div>
  				</div>

  				<div class="col-lg-3 col-md-6 col-sm-6">
  					<div class="card card-stats">
  						<div class="card-header" data-background-color="red">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
  						</div>
  						<div class="card-content">
  							<p class="category fs-12">Ocorrências</p>
  							<h3 class="title"><?php echo $amountOccurrences[0]["amountOccurrences"]; ?></h3>
  						</div>
  						<div class="card-footer">
  							<div class="stats">
  								<i class="fa fa-calendar-check-o" aria-hidden="true"></i> Este mês
  							</div>
  						</div>
  					</div>
  				</div>

          <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header" data-background-color="blue">
                  <h4 class="title">Últimas Ocorrências</h4>
                  <p class="category"></p>
              </div>
              <div class="card-content table-responsive">
                <table class="table table-hover">
                  <thead class="text-warning">
                    <tr>
                      <th>Tipo de Ocorrência</th>
                      <th>Descrição</th>
                      <th>Bairro</th>
                      <th>Data/Hora</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($occurrences) : ?>
                      <?php
                        if(count($occurrences)<5){
                          $size = count($occurrences);
                        }else{
                          $size = 5;
                        }
                      ?>
                      <?php for($position = 0; $position < $size ; $position++){ ?>
                        <tr>
                          <td><?php echo $occurrences[$position]['category_description']; ?></td>
                          <td><?php echo $occurrences[$position]['event_description']; ?></td>
                          <td><?php echo $occurrences[$position]['neighborhood_description']; ?></td>
                          <td><?php echo date("d/m/Y H:i:s", strtotime($occurrences[$position]['occurrence_reg'])); ?></td>
                        <tr>
                    <?php }else : ?>
                      <tr>
                        <td colspan="6">No records found.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header" data-background-color="purple">
                  <h4 class="title">Ocorrências por Categoria</h4>
                  <p class="category"></p>
              </div>
              <div class="card-content table-responsive">

                <table class="table table-hover">
                  <thead class="text-warning">
                    <tr>
                      <th>Tipo de Ocorrência</th>
                      <th>Quantidade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($occurrencesCategory) : ?>
                    <?php foreach ($occurrencesCategory as $occurrenceCategory) :?>
                        <tr>
                          <td><?php echo $occurrenceCategory['category_description']; ?></td>
                          <td><?php echo $occurrenceCategory['occurrences']; ?></td>
                        <tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                      <tr>
                        <td colspan="6">No records found.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end table -->

        </div>
        <!-- end row -->

  		</div>
  	</div>

  <?php else : ?>
  	<div class="alert alert-danger" role="alert">
  		<p><strong>ERRO:</strong> Could not connect to the database! </p>
  	</div>

  <?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>
