<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package TuanNona
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div class="container mainpage">
		<header>
			<h1><a href="<?= get_home_url(); ?>" class="logo"></a></h1>
			<div class="banner">
				<div class="wrapper">
					<div class="middle">
						<div class="buletan">
						</div>
					</div>
				</div>
			</div>
		</header>