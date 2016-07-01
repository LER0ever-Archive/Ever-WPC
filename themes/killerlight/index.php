<?php get_header(); ?>

	<div id="content" class="narrowcolumn">
		<div id="contentWrapper1">
			<div id="contentWrapper2">
				<?php if (have_posts()) : ?>
			
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
								<?php the_content('Read the rest of this entry...'); ?>
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
					<p class="center">Sorry, but you are looking for something that isn't here.</p>
					<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
