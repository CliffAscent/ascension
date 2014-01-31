<?php
/*
Template Name: Stripped
*/

$title   = asc_get_entry_title();
$details = asc_get_entry_page_details( $id );
$image   = has_post_thumbnail();
?>

<?php get_header(); ?>

<div id="main-content" class="<?php asc_main_content_classes( 'singular page' ); ?>" role="main">
	<?php do_action( 'asc_after_main_content_open' ); ?>
	
	<?php get_template_part( 'templates/modules/widgets', 'content-top' ); ?>

	<?php /* The post loop. */ ?>
	<?php if ( have_posts() ) : ?>
		<?php do_action( 'asc_before_single_entry' ); ?>
		
		<?php while ( have_posts() ) : the_post(); ?>
			<?php do_action( 'asc_before_entry' ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php do_action( 'asc_after_entry_open' ); ?>
				
				<?php do_action( 'asc_after_entry_header' ); ?>

				<?php if ( $image ) : ?>
					<div class="entry-image <?php echo apply_filters( 'asc_entry_image_class', '' ); ?>">
						<?php do_action( 'asc_after_entry_image_open' ); ?>
						
						<?php the_post_thumbnail( 'ascension-large', array( 'class' => 'the-entry-image ' . apply_filters( 'asc_page_image_class', 'aligncenter' ) ) ); ?>
						
						<?php do_action( 'asc_before_entry_image_close' ); ?>
					</div><!-- End .entry-image -->
				
					<?php do_action( 'asc_after_entry_image' ); ?>
				<?php endif; ?>
				
				<?php do_action( 'asc_after_entry_image' ); ?>

				<div class="entry-content <?php echo apply_filters( 'asc_entry_content_class', '' ); ?>">
					<div class="contain">
						<?php do_action( 'asc_after_entry_content_open' ); ?>
						
						<?php the_content(); ?>
						
						<?php asc_entry_pages(); ?>
							
						<?php do_action( 'asc_before_entry_content_close' ); ?>
					</div>
				</div><!-- End .entry-content -->
				
				<?php do_action( 'asc_after_entry_content' ); ?>
				
				<?php do_action( 'asc_before_entry_close' ); ?>
			</article><!-- End #post-<?php the_ID(); ?> -->

			<?php do_action( 'asc_after_entry' ); ?>
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