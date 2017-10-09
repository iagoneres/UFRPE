<?php
require_once('functions.php');

checkSession();

$TITLE = 'SmartOutlook | Simulações';
$PAGE = "Simulações";
include(HEADER_TEMPLATE);
?>

<?php $db = open_database(); ?>

<body>

  <?php include(SIDEBAR_TEMPLATE); ?>

  <?php if ($db) : ?>

  	<div class="content">
      <h1>Em breve estará disponível para você.</h1>
  	</div>

  <?php else : ?>
  	<div class="alert alert-danger" role="alert">
  		<p><strong>ERRO:</strong> Could not connect to the database! </p>
  	</div>

  <?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>
