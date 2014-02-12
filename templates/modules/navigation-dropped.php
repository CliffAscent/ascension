<div class="drop at-medium">
	<div class="drop-control">
		<h2 class="drop-title"><?php _e( 'Navigation', 'ascension-starter' ) ?></h2>
	</div>
	<nav class="drop-content" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu horizontal', 'container' => false, 'walker' => new Asc_walker_Nav_Menu, 'fallback_cb' => 'asc_default_menu' ) ); ?>
	</nav>
</div>