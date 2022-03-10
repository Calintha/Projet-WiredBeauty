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
			<div class="all-link" >
				<?php 
					foreach ($variable as $key => $value) {
						# code...
					}
				?>
			</div>   
		</nav>   
	</header>
</body>