<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Designed and coded by Firefly Creative Company: http://fireflycompany.com">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo home_url(); ?>/favicon.png">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/html5shiv.min.js"></script>
		<![endif]-->
	
		<!-- 
			<script type="text/javascript" src="http://use.typekit.com/mpe4ylu.js"></script>
			<script type="text/javascript">try{Typekit.load();}catch(e){}</script> 
		-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class() ?>>
		<div id="page">
			<?php get_template_part("header", "masthead"); ?>