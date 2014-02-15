<?php
/**
 * Archive Template
 *
 * Template to display the archive and category layout.
 */

$description = asc_get_category_desc();
$prev_posts  = get_previous_posts_link( apply_filters( 'asc_prev_entries_link', __( 'Previous Page', 'ascension' ) ) );
$next_posts  = get_next_posts_link( apply_filters( 'asc_next_entries_link', __( 'Next Page', 'ascension' ) ) );
?>

<?php get_header(); ?>

<div id="main-content" class="<?php asc_main_content_classes( 'archive' ); ?>" role="main">
	<?php do_action( 'asc_after_main_content_open' ); ?>
	
	<?php get_template_part( 'templates/widgets/widgets', 'content-top' ); ?>
	
	<?php /* Category description. */ ?>
	<?php if ( $description ) : ?>
		<?php do_action( 'asc_before_category_description' ); ?>
		
		<div class="category-description">
			<?php echo $description; ?>
		</div>
		
		<?php do_action( 'asc_after_category_description' ); ?>
	<?php endif; ?>

	<?php /* The post loop. */ ?>
	<?php if ( have_posts() ) : ?>
		<?php do_action( 'asc_before_posts_list' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php asc_archive_content_template(); ?>
		<?php endwhile; ?>
		
		<?php do_action( 'asc_after_posts_list' ); ?>
		
		<?php /* Links to more posts. */ ?>
		<?php if ( $next_posts || $prev_posts ) : ?>
			<?php do_action( 'asc_before_posts_links' ); ?>
			
			<div class="posts-pages">
				<div class="contain">
					<?php if ( $prev_posts ) : ?>
						<div class="prev-posts">
							<?php echo $prev_posts; ?>
						</div>
					<?php endif; ?>
					
					<?php if ( $next_posts ) : ?>
						<div class="next-posts">
							<?php echo $next_posts; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			
			<?php do_action( 'asc_after_posts_links' ); ?>
		<?php endif; ?>
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