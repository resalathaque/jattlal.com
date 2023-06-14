<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo @$title ?></title>
	<?php if (isset($description)): ?>
		<meta name="description" value="<?php echo $description ?>">
	<?php endif ?>
	<?php if (isset($keywords)): ?>
		<meta name="keywords" value="<?php echo $keywords ?>">
	<?php endif ?>

	<?php echo html::style('/static/css/bulma.min.css') ?>
	<style>
		body {
			background-color: #ddd;
			font-size: 1rem;
			font-weight: 400;
			line-height: 1.5;
		}
		.container {
			max-width: 1024px;
		}
		.main.container {
			background: #fff;
			overflow: hidden;
			margin: 10px auto;
			padding: 10px;
			-webkit-box-shadow: 0 0 10px rgba(50,50,50,.17);
			box-shadow: 0 0 10px rgba(50,50,50,.17);
		}
		.main-padd {
			padding: 10px;
		}
		.table th {
			width: 150px;
		}
		.subtitle {
			padding-left: 10px;
			border-left: 3px solid;
		}
	</style>
</head>
<body>
	<header>
		<nav class="navbar is-transparent has-shadow is-spaced">
			<div class="container">
			<div class="navbar-brand">
				<a class="navbar-item has-text-weight-bold" href="/" title="Home">
					JattLal.com
				</a>
				<div class="navbar-burger burger" data-target="navMenu">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>

			<div id="navMenu" class="navbar-menu">
				<div class="navbar-start">
					<a href="#" class="navbar-item">FDR Calculator</a>
					<a href="#" class="navbar-item">Tax Calculator</a>
				</div>

				<div class="navbar-end">
					<div class="navbar-item">
						<form action="/search" method="GET" autocomplete="off">
							<div class="field has-addons">
								<div class="control">
									<input name="q" class="input" type="text" placeholder="Search Company">
								</div>
								<div class="control">
									<input class="button is-primary" type="submit" value="Search">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			</div>
		</nav>
	</header>
	
	<div class="main container">
		<div class="columns is-variable is-1-mobile is-0-tablet is-3-desktop is-8-widescreen is-2-fullhd is-2">