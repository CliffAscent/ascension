<?php if( is_active_sidebar( 'content-bottom-full' ) ) : ?>
	<div id="content-bottom-widgets-full" class="wrapper widget-area">
		<div class="row widgets full">
			<?php dynamic_sidebar( 'content-bottom-full' ); ?>
		</div>
	</div><!-- End #content-bottom-widgets-full -->
<?php endif; ?>

<?php do_action( 'asc_after_content_bottom_widgets_full' ); ?>

<?php if( is_active_sidebar( 'content-bottom-halfs' ) ) : ?>
	<div id="content-bottom-widgets-halfs" class="wrapper widget-area">
		<div class="row widgets halfs at-medium">
			<?php dynamic_sidebar( 'content-bottom-halfs' ); ?>
		</div>
	</div><!-- End #content-bottom-widgets-halfs -->
<?php endif; ?>

<?php do_action( 'asc_after_content_bottom_widgets_halfs' ); ?>

<?php if( is_active_sidebar( 'content-bottom-thirds' ) ) : ?>
	<div id="content-bottom-widgets-thirds" class="wrapper widget-area">	
		<div class="row widgets thirds at-large">
			<?php dynamic_sidebar( 'content-bottom-thirds' ); ?>
		</div>
	</div><!-- End #content-bottom-widgets-thirds -->
<?php endif; ?>

<?php do_action( 'asc_after_content_bottom_widgets_thirds' ); ?>

<?php if( is_active_sidebar( 'content-bottom-quarters' ) ) : ?>
	<div id="content-bottom-widgets-quarters" class="wrapper widget-area">	
		<div class="row widgets quarters at-large">
			<?php dynamic_sidebar( 'content-bottom-quarters' ); ?>
		</div>
	</div><!-- End #content-bottom-widgets-quarters -->
<?php endif; ?>

<?php do_action( 'asc_after_content_bottom_widgets' ); ?>