<?php
/**
 * Archive Content Template
 *
 * Displays the content for a post in an archive view.
 */

global $asc_theme_options;
$title   = asc_get_entry_title();
$details = asc_get_entry_details( $id );
$image   = has_post_thumbnail();
?>

<?php do_action( 'asc_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'asc_after_entry_open' ); ?>
				
	<header class="entry-header <?php echo apply_filters( 'asc_entry_header_class', '' ); ?>">
		<?php do_action( 'asc_after_entry_header_open' ); ?>

		<?php if ( $image ) : ?>
			<div class="entry-image archive-entry-image <?php echo apply_filters( 'asc_entry_image_class', '' ); ?>">
				<?php do_action( 'asc_after_entry_image_open' ); ?>
				
				<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'the-entry-image entry-thumbnail ' . apply_filters( 'asc_archive_image_class', '' ) ) ); ?>
				
				<?php do_action( 'asc_before_entry_image_close' ); ?>
			</div><!-- End .entry-image -->
		
			<?php do_action( 'asc_after_entry_image' ); ?>
		<?php endif; ?>
		
		<?php if ( $title ) : ?>
			<h1 class="entry-title">
				<?php echo $title; ?>
			</h1>
		<?php endif; ?>
		
		<?php if ( $details ) : ?>
			<div class="entry-details">
				<?php echo $details; ?>
			</div>
		<?php endif; ?>
		
		<?php do_action( 'asc_before_entry_header_close' ); ?>
	</header><!-- End .entry-header -->
	
	<?php do_action( 'asc_after_entry_header' ); ?>

	<div class="entry-content <?php echo apply_filters( 'asc_entry_content_class', '' ); ?>">
		<div class="contain">
			<?php do_action( 'asc_after_entry_content_open' ); ?>
			
			<?php the_content( $asc_theme_options['asc_custom_read_more'] ); ?>
				
			<?php do_action( 'asc_before_entry_content_close' ); ?>
		</div>
	</div><!-- End .entry-content -->
	
	<?php do_action( 'asc_after_entry_content' ); ?>

	<footer class="entry-footer <?php echo apply_filters( 'asc_entry_footer_class', '' ); ?>">
		<?php do_action( 'asc_after_entry_footer_open' ); ?>
		
		<?php asc_entry_tags(); ?>
		
		<?php asc_edit_entry(); ?>
		
		<?php do_action( 'asc_before_entry_footer_close' ); ?>
	</footer><!-- End .entry-footer -->
	
	<?php do_action( 'asc_before_entry_close' ); ?>
</article><!-- End #post-<?php the_ID(); ?> -->

<?php do_action( 'asc_after_entry' ); ?>