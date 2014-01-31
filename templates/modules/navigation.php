<nav class="horizontal-menu" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu', 'container' => false, 'walker' => new Asc_walker_Nav_Menu, 'fallback_cb' => 'asc_default_menu' ) ); ?>
</nav>