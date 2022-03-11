<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width,initial-scale=1" name="viewport">

	<?php wp_head(); ?>

	<link href="/favicon.ico" rel="icon" data-n-head="true" type="image/x-icon">
</head>

<body <?php body_class(); ?>>

	<header>
		<nav class="navbar" style="background: <?=$args['bgColor'] ?>">

			<div class="cont-logo">
				<a href="/"><img class="logo" src="<?=ASSETS_URL."/img/logo.svg"?>"></a>
			</div>
			<div class="nav-links" >
				<?php 
					wp_nav_menu( array( 'theme_location' => 'header-menu') ); 
				?>
			</div>
			<a class="login" href="/login">LOG IN</a>
		</nav>   
	</header>
</body>