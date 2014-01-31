<?php
/**
 * Aside Content Template
 *
 * Displays the post content for the aside post format.
 */
?>

<?php do_action( 'asc_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'asc_after_entry_open' ); ?>

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
		
		<div class="entry-details">
			<?php asc_entry_aside_details( $post->ID );; ?>
		</div>
		
		<?php asc_edit_entry(); ?>
		
		<?php do_action( 'asc_before_entry_footer_close' ); ?>
	</footer><!-- End .entry-footer -->
	
	<?php do_action( 'asc_before_entry_close' ); ?>
</article><!-- End #post-<?php the_ID(); ?> -->

<?php do_action( 'asc_after_entry' ); ?>