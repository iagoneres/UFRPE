<?php
require_once('functions.php');

checkSession();
loadCategories();
loadOccurrences();
registerOccurrence();

$TITLE = 'SmartOutlook | Ocorrências';
$PAGE = "Ocorrências";
include(HEADER_TEMPLATE);
?>

<body>

  <?php $db = open_database(); ?>

  <body>

  <?php include(SIDEBAR_TEMPLATE); ?>

  <?php if ($db) : ?>

  	<div class="content">
      <div class="row">
        <div class="col-md-12">
          <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#occurrence-modal">
            Informar Ocorrência <i class="fa fa-plus-square" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="row">

        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title">Ocorrências</h4>
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
                  <?php foreach ($occurrences as $occurrence) :?>
                    <tr>
                      <td><?php echo $occurrence['category_description']; ?></td>
                      <td><?php echo $occurrence['event_description']; ?></td>
                      <td><?php echo $occurrence['neighborhood_description']; ?></td>
                      <td><?php echo date("d/m/Y H:i:s", strtotime($occurrence['occurrence_reg'])); ?></td>
                      <!--<td class="actions text-right">
                         <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#view-modal" onclick="getPosition()"
                          data-register="<?php echo $user['user_cpf']; ?>"
                          data-name="<?php echo $occurrence['name_singular']; ?>"
                          data-type="<?php echo $occurrence['type_singular']; ?>"
                          data-brand="<?php echo $occurrence['name_brand']; ?>"
                          data-birthdate="<?php echo date("d/m/Y", strtotime($occurrence['birthdate_singular'])); ?>"
                        >
                          <i class="fa fa-eye"></i> Visualizar...
                        </a>
                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal"
                        data-occurrence="<?php echo $occurrence['id_singular']; ?>">
                          <i class="fa fa-trash"></i> Excluir
                        </a> -->
                    </tr>
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
    </div>

  <?php else : ?>
  	<div class="alert alert-danger" role="alert">
  		<p><strong>ERRO:</strong> Could not connect to the database! </p>
  	</div>

  <?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>

<!-- Modal -->
<?php include('modal-occurrence.php'); ?>
