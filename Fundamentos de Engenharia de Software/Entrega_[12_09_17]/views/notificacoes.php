<?php
require_once('functions.php');

checkSession();

$TITLE = 'SmartOutlook | Notificações';
$PAGE = "Notificações";
include(HEADER_TEMPLATE);
?>

<?php $db = open_database(); ?>

  <body>

  <?php include(SIDEBAR_TEMPLATE); ?>

  <?php if ($db) : ?>

  	<div class="content">
  	</div>

  <?php else : ?>
  	<div class="alert alert-danger" role="alert">
  		<p><strong>ERRO:</strong> Could not connect to the database! </p>
  	</div>

  <?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>
