<?php
/**
 * Header Template
 *
 * Document head, user control bar, header image and title, and main navigation bar.
 */

global $asc_theme_options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- This site was built using Ascension http://cliffascent.com/ascension -->
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( ASC_THEME_SEPARATOR, true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if lt IE 9]>
		<script src="<?php echo ASC_TEMPLATE_DIR_URI; ?>/js/vendor/html5shiv/html5shiv.js" type="text/javascript"></script>
	<![endif]-->

	<?php /* Scripts and styles are loaded by asc_scripts() in functions.php */ ?>
	
	<?php wp_head();?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'asc_after_body_open' ); ?>

<header id="header" class="wrapper" role="banner">
	<div class="row">
		<?php do_action( 'asc_before_header_content' ); ?>
		<?php asc_get_header(); ?>
		<?php do_action( 'asc_after_header_content' ); ?>
	</div>
</header><!-- End #header -->

<?php do_action( 'asc_after_header' ); ?>

<?php get_template_part( 'templates/modules/widgets', 'top' ) ?>

<div id="content" class="wrapper">
	<div class="row">
		<?php do_action( 'asc_after_content_open' ); ?>