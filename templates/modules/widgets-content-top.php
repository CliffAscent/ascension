<?php if( is_active_sidebar( 'content-top-full' ) ) : ?>
	<div id="content-top-widgets-full" class="wrapper widget-area">
		<div class="row widgets full">
			<?php dynamic_sidebar( 'content-top-full' ); ?>
		</div>
	</div><!-- End #content-top-widgets-full -->
<?php endif; ?>

<?php do_action( 'asc_after_content_top_widgets_full' ); ?>

<?php if( is_active_sidebar( 'content-top-halfs' ) ) : ?>
	<div id="content-top-widgets-halfs" class="wrapper widget-area">
		<div class="row widgets halfs at-medium">
			<?php dynamic_sidebar( 'content-top-halfs' ); ?>
		</div>
	</div><!-- End #content-top-widgets-halfs -->
<?php endif; ?>

<?php do_action( 'asc_after_content_top_widgets_halfs' ); ?>

<?php if( is_active_sidebar( 'content-top-thirds' ) ) : ?>
	<div id="content-top-widgets-thirds" class="wrapper widget-area">	
		<div class="row widgets thirds at-large">
			<?php dynamic_sidebar( 'content-top-thirds' ); ?>
		</div>
	</div><!-- End #content-top-widgets-thirds -->
<?php endif; ?>

<?php do_action( 'asc_after_content_top_widgets_thirds' ); ?>

<?php if( is_active_sidebar( 'content-top-quarters' ) ) : ?>
	<div id="content-top-widgets-quarters" class="wrapper widget-area">	
		<div class="row widgets quarters at-large">
			<?php dynamic_sidebar( 'content-top-quarters' ); ?>
		</div>
	</div><!-- End #content-top-widgets-quarters -->
<?php endif; ?>

<?php do_action( 'asc_after_content_top_widgets' ); ?>