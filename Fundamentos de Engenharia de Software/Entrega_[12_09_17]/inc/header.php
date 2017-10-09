<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo BASEURL; ?>assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?php echo BASEURL; ?>assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title> <?php echo $TITLE ?> </title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <!-- Bootstrap core CSS and Material Dashboard CSS -->
  <link href="<?php echo BASEURL; ?>assets/css/libs/bootstrap.min.css" rel="stylesheet" type='text/css'/>
	<link href="<?php echo BASEURL; ?>assets/css/libs/material-dashboard.css" rel="stylesheet" type='text/css'/>

	<!-- Default CSS -->
  <link href="<?php echo BASEURL; ?>assets/css/default.css" rel="stylesheet" type='text/css'/>
	<?php
		if(isset($IMPORTS)){
			echo $IMPORTS;
		}
	?>

  <!--     Fonts and icons     -->
  <link href="<?php echo BASEURL; ?>assets/css/font-awesome.min.css" rel="stylesheet" type='text/css'/>

	<!-- JS -->
	<script src="<?php echo BASEURL; ?>assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>

</head>
