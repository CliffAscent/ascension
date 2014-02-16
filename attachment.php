<?php
/**
 * Attachment Template
 *
 * Template to display an attachment page.
 */

$title      = asc_get_entry_title();
$details    = asc_get_image_details();
$image      = wp_get_attachment_image( $post->ID, 'full', false, array( 'class' => 'the-entry-image aligncenter' ) );
$prev_image = asc_get_prev_image_link();
$next_image = asc_get_next_image_link();
?>

<?php get_header(); ?>

<div id="main-content" class="<?php asc_main_content_classes( 'singular attachment' ); ?>" role="main">
	<?php do_action( 'asc_after_main_content_open' ); ?>
	
	<?php get_template_part( 'templates/widgets/widgets', 'content-top' ); ?>

	<?php if ( have_posts() ) : ?>
		<?php do_action( 'asc_before_single_entry' ); ?>
		
		<?php while ( have_posts() ) : the_post(); ?>
			<?php do_action( 'asc_before_entry' ); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php do_action( 'asc_after_entry_open' ); ?>
				
				<header class="entry-header <?php echo apply_filters( 'asc_entry_header_class', '' ); ?>">
					<?php do_action( 'asc_after_entry_header_open' ); ?>
					
					<?php if ( $title ) : ?>
						<h1 class="entry-title">
							<?php echo $title; ?>
						</h1>
					<?php endif; ?>
					
					<div class="entry-details">
						<?php echo $details; ?>
					</div>
					
					<?php do_action( 'asc_before_entry_header_close' ); ?>
				</header><!-- End .entry-header -->
				
				<?php do_action( 'asc_after_entry_header' ); ?>
				
				<?php if ( $image ) : ?>
					<div class="entry-image <?php echo apply_filters( 'asc_entry_image_class', '' ); ?>">
						<?php do_action( 'asc_after_entry_image_open' ); ?>
						
						<?php echo $image; ?>
						
						<?php do_action( 'asc_before_entry_image_close' ); ?>
					</div><!-- End .entry-image -->
				
					<?php do_action( 'asc_after_entry_image' ); ?>
				<?php endif; ?>

				<div class="entry-content <?php echo apply_filters( 'asc_entry_content_class', '' ); ?>">
					<div class="contain">
						<?php do_action( 'asc_after_entry_content_open' ); ?>
						
						<?php the_content(); ?>
							
						<?php do_action( 'asc_before_entry_content_close' ); ?>
					</div>
				</div><!-- End .entry-content -->
				
				<?php do_action( 'asc_after_entry_content' ); ?>

				<footer class="entry-footer <?php echo apply_filters( 'asc_entry_footer_class', '' ); ?>">
					<?php do_action( 'asc_after_entry_footer_open' ); ?>
					
					<?php if( $prev_image || $next_image ) : ?>
						<div class="image-links">
							<div class="contain">
								<?php if ( $prev_image ) : ?>
									<div class="prev-image">
										<?php previous_image_link(); ?>
									</div>
								<?php endif; ?>
								
								<?php if ( $next_image ) : ?>
									<div class="next-image">
										<?php next_image_link(); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					
					<?php asc_edit_entry(); ?>
					
					<?php comments_template(); ?>
					
					<?php do_action( 'asc_before_entry_footer_close' ); ?>
				</footer><!-- End .entry-footer -->
				
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
	
	<?php get_template_part( 'templates/widgets/widgets', 'content-bottom' ); ?>
	
	<?php do_action( 'asc_before_main_content_close' ); ?>
</div><!-- End #main-content -->

<?php do_action( 'asc_after_main_content' ); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>