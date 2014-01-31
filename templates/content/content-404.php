<?php
/**
 * Page Not Found Content Template
 *
 * Displays the content for the 404 page not found.
 */
?>

<?php do_action( 'asc_before_entry' ); ?>

<article id="not-found" class="entry not-found">
	<?php do_action( 'asc_after_entry_open' ); ?>
				
	<header class="entry-header <?php echo apply_filters( 'asc_entry_header_class', '' ); ?>">
		<?php do_action( 'asc_after_entry_header_open' ); ?>
		
		<h1 class="entry-title">
			<?php apply_filters( 'asc_404_title', _e( 'Post Not Found', 'ascension' ) ); ?>
		</h1>
		
		<?php do_action( 'asc_before_entry_header_close' ); ?>
	</header><!-- End .entry-header -->
	
	<?php do_action( 'asc_after_entry_header' ); ?>

	<div class="entry-content <?php echo apply_filters( 'asc_entry_content_class', '' ); ?>">
		<div class="contain">
			<?php do_action( 'asc_after_entry_content_open' ); ?>
			
			<?php apply_filters( 'asc_404_content', _e( 'The post you\'re looking for does not exist, want to try a search?', 'ascension' ) ); ?>
				
			<?php do_action( 'asc_before_entry_content_close' ); ?>
		</div>
	</div><!-- End .entry-content -->
	
	<?php do_action( 'asc_after_entry_content' ); ?>

	<footer class="entry-footer <?php echo apply_filters( 'asc_entry_footer_class', '' ); ?>">
		<?php do_action( 'asc_after_entry_footer_open' ); ?>
			
		<?php get_search_form(); ?>
			
		<?php do_action( 'asc_before_entry_footer_close' ); ?>
	</footer><!-- End .entry-footer -->
	
	<?php do_action( 'asc_before_entry_close' ); ?>
</article><!-- End #not-found -->

<?php do_action( 'asc_after_entry' ); ?>