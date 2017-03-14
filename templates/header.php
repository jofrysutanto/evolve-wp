<header>
	<nav>
		<?php
		if (has_nav_menu('primary_navigation')) :
			wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'primarynav'));
		endif;
		?>
	</nav>
</header>