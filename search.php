<?php
/**
 * Search Template
 *
 * Template to display for the search page.
 */

$prev_posts  = get_previous_posts_link( apply_filters( 'asc_prev_entries_link', __( 'Previous Page', 'ascension' ) ) );
$next_posts  = get_next_posts_link( apply_filters( 'asc_next_entries_link', __( 'Next Page', 'ascension' ) ) );
?>

<?php get_header(); ?>

<div id="main-content" class="<?php asc_main_content_classes( 'archive search-page' ); ?>" role="main">
	<?php do_action( 'asc_after_main_content_open' ); ?>
	
	<?php get_template_part( 'templates/modules/widgets', 'content-top' ); ?>
		
	<div class="search-header">
		<h1><?php _e( apply_filters( 'asc_search_page_title', 'Search' ), 'ascension' ) ?></h1>
		<?php get_search_form(); ?>
	</div>

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
		
		<?php do_action( 'asc_before_entry' ); ?>

		<article id="not-found" <?php post_class(); ?>>
			<?php do_action( 'asc_after_entry_open' ); ?>
				
			<header class="entry-header <?php echo apply_filters( 'asc_entry_header_class', '' ); ?>">
				<?php do_action( 'asc_after_entry_header_open' ); ?>
				
				<h1 class="entry-title">
					<?php apply_filters( 'asc_404_title', _e( 'No Posts Found', 'ascension' ) ); ?>
				</h1>
				
				<?php do_action( 'asc_before_entry_header_close' ); ?>
			</header><!-- End .entry-header -->
			
			<?php do_action( 'asc_after_entry_header' ); ?>

			<div class="entry-content <?php echo apply_filters( 'asc_entry_content_class', '' ); ?>">
				<div class="contain">
					<?php do_action( 'asc_after_entry_content_open' ); ?>
					
					<?php apply_filters( 'asc_404_content', _e( 'Your search did not return any results.', 'ascension' ) ); ?>
						
					<?php do_action( 'asc_before_entry_content_close' ); ?>
				</div>
			</div><!-- End .entry-content -->
			
			<?php do_action( 'asc_after_entry_content' ); ?>

			<footer class="entry-footer <?php echo apply_filters( 'asc_entry_footer_class', '' ); ?>">
				<?php do_action( 'asc_after_entry_footer_open' ); ?>
				
				<?php do_action( 'asc_before_entry_footer_close' ); ?>
			</footer><!-- End .entry-footer -->
			
			<?php do_action( 'asc_before_entry_close' ); ?>
		</article><!-- End #not-found -->
		
		<?php do_action( 'asc_after_entry' ); ?>
		
		<?php do_action( 'asc_after_single_entry' ); ?>
	<?php endif; ?>
	
	<?php get_template_part( 'templates/modules/widgets', 'content-bottom' ); ?>
	
	<?php do_action( 'asc_before_main_content_close' ); ?>
</div><!-- End #main-content -->

<?php do_action( 'asc_after_main_content' ); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>