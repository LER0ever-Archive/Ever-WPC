<form method="get" id="searchForm" action="<?php bloginfo('url'); ?>/">
	<label class="hidden" for="s"><?php _e('Search for:'); ?></label>
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	<input type="image" src="<?php bloginfo('template_url'); ?>/images/search-button.png" id="searchsubmit" value="Search" />
</form>
