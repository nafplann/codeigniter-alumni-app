<!DOCTYPE html>
<html lang="en">
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title><?php echo $pageTitle; ?> | Kcdev Admin</title>

		<!-- CSS  -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="<?php echo base_url('assets/materialize/css/materialize.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="<?php echo base_url('assets/css/kcdev.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	<body>
		<header>
			<nav class="light-blue lighten-1 navbar-fixed" role="navigation">
				<div class="nav-wrapper container">
					<a id="logo-container" href="<?php echo base_url(); ?>" class="brand-logo center">
						<img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Kcdev Logo">
					</a>
					<a href="#" data-activates="sidenav" class="button-collapse"><i class="material-icons">menu</i></a>
				</div>
			</nav>
		</header>