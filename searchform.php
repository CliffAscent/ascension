<?php
/**
 * Search Form Template
 *
 * Template to display the search form.
 */
?>

<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="s" class="screen-reader-text">
		<?php _ex( 'Search', 'assistive text', 'ascension' ); ?>
	</label>
	<input type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search', 'search field placeholder', 'ascension' ); ?>" />
	<button type="submit" id="searchsubmit"><span class="icon <?php echo apply_filters( 'asc_search_submit_icon', 'dashicon-search' ); ?>"></span></button>
</form>
