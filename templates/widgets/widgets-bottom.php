<?php if( is_active_sidebar( 'bottom-full' ) ) : ?>
	<div id="bottom-widgets-full" class="wrapper widget-area">
		<div class="row widgets full">
			<?php dynamic_sidebar( 'bottom-full' ); ?>
		</div>
	</div><!-- End #bottom-widgets-full -->
<?php endif; ?>

<?php do_action( 'asc_after_bottom_widgets_full' ); ?>

<?php if( is_active_sidebar( 'bottom-halfs' ) ) : ?>
	<div id="bottom-widgets-halfs" class="wrapper widget-area">
		<div class="row widgets halfs at-medium">
			<?php dynamic_sidebar( 'bottom-halfs' ); ?>
		</div>
	</div><!-- End #bottom-widgets-halfs -->
<?php endif; ?>

<?php do_action( 'asc_after_bottom_widgets_halfs' ); ?>

<?php if( is_active_sidebar( 'bottom-thirds' ) ) : ?>
	<div id="bottom-widgets-thirds" class="wrapper widget-area">	
		<div class="row widgets thirds at-large">
			<?php dynamic_sidebar( 'bottom-thirds' ); ?>
		</div>
	</div><!-- End #bottom-widgets-thirds -->
<?php endif; ?>

<?php do_action( 'asc_after_bottom_widgets_thirds' ); ?>

<?php if( is_active_sidebar( 'bottom-quarters' ) ) : ?>
	<div id="bottom-widgets-quarters" class="wrapper widget-area">	
		<div class="row widgets quarters at-large">
			<?php dynamic_sidebar( 'bottom-quarters' ); ?>
		</div>
	</div><!-- End #bottom-widgets-quarters -->
<?php endif; ?>

<?php do_action( 'asc_after_bottom_widgets' ); ?>