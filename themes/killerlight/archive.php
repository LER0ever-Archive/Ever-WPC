<?php get_header(); ?>

	<div id="content" class="narrowcolumn">
		<div id="contentWrapper1">
			<div id="contentWrapper2">
				<?php if (have_posts()) : ?>
				
					<div class="header archive">
						<div class="headerWrapper1">
							<div class="headerWrapper2">
								<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
								<?php /* If this is a category archive */ if (is_category()) { ?>
									<h2 class="pageTitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
								<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
									<h2 class="pageTitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
								<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
									<h2 class="pageTitle">Archive for <?php the_time('F jS, Y'); ?></h2>
								<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
									<h2 class="pageTitle">Archive for <?php the_time('F, Y'); ?></h2>
								<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
									<h2 class="pageTitle">Archive for <?php the_time('Y'); ?></h2>
								<?php /* If this is an author archive */ } elseif (is_author()) { ?>
									<h2 class="pageTitle">Author Archive</h2>
								<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
									<h2 class="pageTitle">Blog Archives</h2>
								<?php } ?>
								
								<ul class="prevNextNavigation">
									<li class="previous"><?php next_posts_link('Older Entries') ?></li>
									<li class="next"><?php previous_posts_link('Newer Entries') ?></li>
								</ul>
								<div class="clear"></div>
							</div>
						</div>
					</div>
		
					<?php while (have_posts()) : the_post(); ?>
						<div class="post" id="post-<?php the_ID(); ?>">
							<p class="postDate">
								<small class="day"><?php the_time('j') ?></small>
								<small class="month"><?php the_time('M') ?></small>
								<small class="year"><? // php the_time('Y') ?></small>
							</p>
							<div class="postHeader">
								<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<small class="postAuthor">Author: <?php the_author() ?> <?php edit_post_link('Edit'); ?></small>
							</div>						
							<div class="entry">
								<?php the_content('Read the rest of this entry &raquo;'); ?>
							</div>
							<div class="postMetaData">
								<?php the_tags('<p class="tags">Tags: ', ', ', '</p>'); ?>
								<p class="comments"><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></p>
								<p class="categories">Filed under: <?php the_category(', ') ?></p>
							</div>
							<div class="clear"></div>
						</div>
			
					<?php endwhile; ?>
			
					<ul class="prevNextNavigation">
						<li class="previous"><?php next_posts_link('Older Entries') ?></li>
						<li class="next"><?php previous_posts_link('Newer Entries') ?></li>
					</ul>
					<div class="clear"></div>
			
				<?php else : ?>
			
					<h2 class="center">Not Found</h2>
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
