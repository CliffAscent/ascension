<?php
global $asc_theme_options;
$image    = get_header_image();
$title    = asc_get_header_title();
$desc     = asc_get_header_desc();
$socials  = asc_get_header_socials();
$main_nav = asc_get_nav_template();
?>
<div class="header-default <?php echo apply_filters( 'asc_header_class', '' ); ?>">
	<div class="contain">
		<?php do_action( 'asc_after_header_open' ); ?>
		
		<?php if ( $image ) : ?>
			<a class="header-image-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img class="header-image" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			</a>
			
			<?php do_action( 'asc_after_header_image' ); ?>
		<?php endif; ?>		
					
		<?php if ( $title || $desc ) : ?>
			<div class="header-info">
				<?php if ( $title ) : ?>
					<h1 class="site-title">
						<?php echo $title; ?>
					</h1>
				<?php endif; ?>	
				
				<?php if ( $desc ) : ?>
					<h2 class="site-description">
						<?php echo $desc; ?>
					</h2>
				<?php endif; ?>	
			</div>
			
			<?php do_action( 'asc_after_header_div' ); ?>
		<?php endif; ?>
		
		<?php do_action( 'asc_after_main_header' ); ?>
		
		<?php // Check if the main nav is active, because it may be disabled and displayed elsewhere. ?>
		<?php if ( ! defined( 'ASC_DISABLE_MAIN_NAV' ) && $asc_theme_options['asc_main_nav'] === 'true' ) : ?>
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
</div><!-- End .header-default -->