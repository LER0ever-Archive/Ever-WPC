<?php get_header(); ?>

	<div id="content" class="narrowcolumn">
		<div id="contentWrapper1">
			<div id="contentWrapper2">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="header page">
						<div class="headerWrapper1">
							<div class="headerWrapper2">
								<h2><?php the_title(); ?></h2>
								<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
							</div>
						</div>
					</div>
					<div class="entry noDate">
						<?php the_content('Read the rest of this page...'); ?>
		
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<div class="clear"></div>
					</div>
				</div>
				<?php endwhile; endif; ?>
				
				<?php comments_template(); ?>
			</div>
		</div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>