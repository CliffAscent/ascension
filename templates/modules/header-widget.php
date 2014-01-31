<?php
global $asc_theme_options;
$socials  = asc_get_header_socials();
$main_nav = asc_get_nav_template();
?>
<div class="header-widget <?php echo apply_filters( 'asc_header_class', '' ); ?>">
	<div class="contain">
		<?php do_action( 'asc_after_header_open' ); ?>
		
		<?php if( ! is_active_sidebar( 'header' ) ) : ?>
			<div class="header-info">
				<h1 class="site-title">
					<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
						<?php _e( 'Add a custom header widget.', 'ascension' ); ?>
					</a>
				</h1>
				<h2 class="site-description">
					<?php _e( 'The "Widget" header layout was selected in the theme options.', 'ascension' ); ?>
				</h2>
			</div>
		
			<?php do_action( 'asc_after_header_div' ); ?>
			
			<?php do_action( 'asc_after_main_header' ); ?>
		<?php else : ?>
			<?php dynamic_sidebar( 'header' ); ?>
		<?php endif; ?>
		
		<?php do_action( 'asc_after_main_header' ); ?>
		
		<?php // Check if the main nav is active, because it may be disabled and displayed elsewhere. ?>
		<?php if ( ! defined( 'ASC_DISABLE_MAIN_NAV' ) && $asc_theme_options['asc_main_nav'] === 'Enabled' ) : ?>
			<div id="navigation" class="<?php echo apply_filters( 'asc_main_nav_class', '' ); ?>">
				<?php do_action( 'asc_after_main_nav_open' ); ?>
				
				<?php get_template_part( 'templates/modules/navigation', $main_nav ); ?>
				
				<?php do_action( 'asc_before_main_nav_close' ); ?>
			</div><!-- End #navigation -->

			<?php do_action( 'asc_after_main_nav' ); ?>
		<?php endif; ?>
		
		<?php if ( $socials ) : ?>
			<div class="social-icons">
				<?php echo $socials; ?>
			</div>
		
			<?php do_action( 'asc_after_header_socials' ); ?>
		<?php endif; ?>
		
		<?php do_action( 'asc_before_header_close' ); ?>
	</div>
</div><!-- End .header-widget -->