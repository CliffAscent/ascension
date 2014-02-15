<?php if( is_active_sidebar( 'main-slider' ) ) : ?>
	<div id="main-slider-area" class="wrapper widget-area">
			<div class="row widgets full">
					<?php dynamic_sidebar( 'main-slider' ); ?>
			</div>
	</div><!-- End #main-slider-area -->
<?php endif; ?>

<?php do_action( 'asc_after_slider' ); ?>

<?php if( is_active_sidebar( 'top-full' ) ) : ?>
	<div id="top-widgets-full" class="wrapper widget-area">
		<div class="row widgets full">
			<?php dynamic_sidebar( 'top-full' ); ?>
		</div>
	</div><!-- End #top-widgets-full -->
<?php endif; ?>

<?php do_action( 'asc_after_top_widgets_full' ); ?>

<?php if( is_active_sidebar( 'top-halfs' ) ) : ?>
	<div id="top-widgets-halfs" class="wrapper widget-area">
		<div class="row widgets halfs at-medium">
			<?php dynamic_sidebar( 'top-halfs' ); ?>
		</div>
	</div><!-- End #top-widgets-halfs -->
<?php endif; ?>

<?php do_action( 'asc_after_top_widgets_halfs' ); ?>

<?php if( is_active_sidebar( 'top-thirds' ) ) : ?>
	<div id="top-widgets-thirds" class="wrapper widget-area">	
		<div class="row widgets thirds at-large">
			<?php dynamic_sidebar( 'top-thirds' ); ?>
		</div>
	</div><!-- End #top-widgets-thirds -->
<?php endif; ?>

<?php do_action( 'asc_after_top_widgets_thirds' ); ?>

<?php if( is_active_sidebar( 'top-quarters' ) ) : ?>
	<div id="top-widgets-quarters" class="wrapper widget-area">	
		<div class="row widgets quarters at-large">
			<?php dynamic_sidebar( 'top-quarters' ); ?>
		</div>
	</div><!-- End #top-widgets-quarters -->
<?php endif; ?>

<?php do_action( 'asc_after_top_widgets' ); ?>