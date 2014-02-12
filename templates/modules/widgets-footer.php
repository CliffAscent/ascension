<?php if( is_active_sidebar( 'footer-full' ) ) : ?>
	<div id="footer-widgets-full" class="wrapper widget-area">
		<div class="row widgets full no-outter-gutters">
			<?php dynamic_sidebar( 'footer-full' ); ?>
		</div>
	</div><!-- End #footer-widgets-full -->
<?php endif; ?>

<?php do_action( 'asc_after_footer_widgets_full' ); ?>

<?php if( is_active_sidebar( 'footer-halfs' ) ) : ?>
	<div id="footer-widgets-halfs" class="wrapper widget-area">
		<div class="row widgets halfs no-outter-gutters at-medium">
			<?php dynamic_sidebar( 'footer-halfs' ); ?>
		</div>
	</div><!-- End #footer-widgets-halfs -->
<?php endif; ?>

<?php do_action( 'asc_after_footer_widgets_halfs' ); ?>

<?php if( is_active_sidebar( 'footer-thirds' ) ) : ?>
	<div id="footer-widgets-thirds" class="wrapper widget-area">	
		<div class="row widgets thirds no-outter-gutters at-large">
			<?php dynamic_sidebar( 'footer-thirds' ); ?>
		</div>
	</div><!-- End #footer-widgets-thirds -->
<?php endif; ?>

<?php do_action( 'asc_after_footer_widgets_thirds' ); ?>

<?php if( is_active_sidebar( 'footer-quarters' ) ) : ?>
	<div id="footer-widgets-quarters" class="wrapper widget-area">	
		<div class="row widgets quarters no-outter-gutters at-large">
			<?php dynamic_sidebar( 'footer-quarters' ); ?>
		</div>
	</div><!-- End #footer-widgets-quarters -->
<?php endif; ?>

<?php do_action( 'asc_after_footer_widgets' ); ?>