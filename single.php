<?php
/**
 * Single Template
 *
 * Template to display the single post layout.
 */
?>

<?php get_header(); ?>

<div id="main-content" class="<?php asc_main_content_classes( 'single' ); ?>" role="main">
	<?php do_action( 'asc_after_main_content_open' ); ?>
	
	<?php get_template_part( 'templates/modules/widgets', 'content-top' ); ?>

	<?php /* The post loop. */ ?>
	<?php if ( have_posts() ) : ?>
		<?php do_action( 'asc_before_single_entry' ); ?>
		
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'templates/content/content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<?php do_action( 'asc_after_single_entry' ); ?>
	<?php else : ?>
		<?php do_action( 'asc_before_single_entry' ); ?>
		
		<?php get_template_part( 'templates/content/content', '404' ); ?>
		
		<?php do_action( 'asc_after_single_entry' ); ?>
	<?php endif; ?>
	
	<?php get_template_part( 'templates/modules/widgets', 'content-bottom' ); ?>
	
	<?php do_action( 'asc_before_main_content_close' ); ?>
</div><!-- End #main-content -->

<?php do_action( 'asc_after_main_content' ); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>