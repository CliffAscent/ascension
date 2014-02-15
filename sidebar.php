<?php
/**
 * Sidebars
 *
 * Check the sidebar settings and displays the proper sidebars.
 */

$sidebar_layout = asc_get_sidebar_layout();

switch ( $sidebar_layout ) {
	case 'right': ?>
		<?php do_action( 'asc_before_right_sidebar' ); ?>
		
		<div class="sidebar widgets right-sidebar <?php echo apply_filters( 'asc_right_sidebars_right', 'md-12 lg-4' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if( ! is_active_sidebar( 'right-sidebar' ) ) : ?>
				<aside class="widget"><a href="<?php echo admin_url( 'widgets.php' ); ?>">Add some sidebar widgets!</a></aside>
			<?php endif; ?>
			<?php dynamic_sidebar( 'right-sidebar' ) ?>
			<?php do_action( 'after_sidebar' ); ?>
		</div>
		
		<?php do_action( 'asc_after_right_sidebar' ); ?>
		
		<?php break;

	case 'left': ?>
		<?php do_action( 'asc_before_left_sidebar' ); ?>
		
		<div class="sidebar widgets left-sidebar <?php echo apply_filters( 'asc_left_sidebars_left', 'md-12 lg-4 lg-pull-8' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if( ! is_active_sidebar( 'left-sidebar' ) ) : ?>
				<aside class="widget"><a href="<?php echo admin_url( 'widgets.php' ); ?>">Add some sidebar widgets!</a></aside>
			<?php endif; ?>
			<?php dynamic_sidebar( 'left-sidebar' ) ?>
			<?php do_action( 'after_sidebar' ); ?>
		</div>
		
		<?php do_action( 'asc_after_left_sidebar' ); ?>
		
		<?php break;

	case 'left-right': ?>
		<?php do_action( 'asc_before_left_sidebar' ); ?>
		
		<div class="sidebar widgets left-sidebar <?php echo apply_filters( 'asc_left_right_sidebars_left', 'sm-12 md-6 lg-3 lg-pull-6' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if( ! is_active_sidebar( 'left-sidebar' ) ) : ?>
				<aside class="widget"><a href="<?php echo admin_url( 'widgets.php' ); ?>">Add some sidebar widgets!</a></aside>
			<?php endif; ?>
			<?php dynamic_sidebar( 'left-sidebar' ) ?>
			<?php do_action( 'after_sidebar' ); ?>
		</div>
		
		<?php do_action( 'asc_after_left_sidebar' ); ?>
		<?php do_action( 'asc_before_right_sidebar' ); ?>
		
		<div class="sidebar widgets right-sidebar <?php echo apply_filters( 'asc_left_right_sidebars_right', 'sm-12 md-6 lg-3' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if( ! is_active_sidebar( 'right-sidebar' ) ) : ?>
				<aside class="widget"><a href="<?php echo admin_url( 'widgets.php' ); ?>">Add some sidebar widgets!</a></aside>
			<?php endif; ?>
			<?php dynamic_sidebar( 'right-sidebar' ) ?>
			<?php do_action( 'after_sidebar' ); ?>
		</div>
		
		<?php do_action( 'asc_after_right_sidebar' ); ?>
		
		<?php break;

	case 'double-right': ?>
		<?php do_action( 'asc_before_left_sidebar' ); ?>
		
		<div class="sidebar widgets left-sidebar <?php echo apply_filters( 'asc_right_right_sidebars_left', 'sm-12 md-6 lg-3' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if( ! is_active_sidebar( 'left-sidebar' ) ) : ?>
				<aside class="widget"><a href="<?php echo admin_url( 'widgets.php' ); ?>">Add some sidebar widgets!</a></aside>
			<?php endif; ?>
			<?php dynamic_sidebar( 'left-sidebar' ) ?>
			<?php do_action( 'after_sidebar' ); ?>
		</div>
		
		<?php do_action( 'asc_after_left_sidebar' ); ?>
		<?php do_action( 'asc_before_right_sidebar' ); ?>
		
		<div class="sidebar widgets right-sidebar <?php echo apply_filters( 'asc_right_right_sidebars_right', 'sm-12 md-6 lg-3' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if( ! is_active_sidebar( 'right-sidebar' ) ) : ?>
				<aside class="widget"><a href="<?php echo admin_url( 'widgets.php' ); ?>">Add some sidebar widgets!</a></aside>
			<?php endif; ?>
			<?php dynamic_sidebar( 'right-sidebar' ) ?>
			<?php do_action( 'after_sidebar' ); ?>
		</div>
		
		<?php do_action( 'asc_after_right_sidebar' ); ?>
		
		
		<?php break;

	case 'double-left': ?>
		<?php do_action( 'asc_before_left_sidebar' ); ?>
		
		<div class="sidebar widgets left-sidebar <?php echo apply_filters( 'asc_left_left_sidebars_left', 'sm-12 md-6 lg-3 lg-pull-6' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if( ! is_active_sidebar( 'left-sidebar' ) ) : ?>
				<aside class="widget"><a href="<?php echo admin_url( 'widgets.php' ); ?>">Add some sidebar widgets!</a></aside>
			<?php endif; ?>
			<?php dynamic_sidebar( 'left-sidebar' ) ?>
			<?php do_action( 'after_sidebar' ); ?>
		</div>
		
		<?php do_action( 'asc_after_left_sidebar' ); ?>
		<?php do_action( 'asc_before_right_sidebar' ); ?>

		<div class="sidebar widgets right-sidebar <?php echo apply_filters( 'asc_left_left_sidebars_right', 'sm-12 md-6 lg-3 lg-pull-6' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if( ! is_active_sidebar( 'right-sidebar' ) ) : ?>
				<aside class="widget"><a href="<?php echo admin_url( 'widgets.php' ); ?>">Add some sidebar widgets!</a></aside>
			<?php endif; ?>
			<?php dynamic_sidebar( 'right-sidebar' ) ?>
			<?php do_action( 'after_sidebar' ); ?>
		</div>
		
		<?php do_action( 'asc_after_right_sidebar' ); ?>
		
		<?php break;

	case 'none':
		// Do nothing
		break;

	default:
		// Do nothing
		break;
}
?>