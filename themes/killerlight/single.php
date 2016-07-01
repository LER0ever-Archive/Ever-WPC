<?php get_header(); ?>

	<div id="content" class="widecolumn">
		<div id="contentWrapper1">
			<div id="contentWrapper2">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		
					<div class="post" id="post-<?php the_ID(); ?>">
						<div class="header page">
							<div class="headerWrapper1">
								<div class="headerWrapper2">
									<!--<ul class="prevNextNavigation">
										<li class="previous"><?php previous_post_link('%link') ?></li>
										<li class="next"><?php next_post_link('%link') ?></li>
									</ul>
									<div class="clear"></div>-->
									<h2><?php the_title(); ?></h2>
									<?php edit_post_link('Edit this entry','<p>','</p>'); ?>
								</div>
							</div>
						</div>
			
						<div class="entry noDate">
							<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
			
							<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						</div>
						<div class="postMetaData noDate single">
							<?php the_tags('<p class="tags">Tags: ', ', ', '</p>'); ?>
							<p class="categories">Filed under: <?php the_category(', ') ?></p>
							<p class="feed"><?php post_comments_feed_link('<abbr title="Really Simple Syndication">RSS</abbr> feed for comments on this post'); ?></p>
							<p class="trackback"><a href="<?php trackback_url(); ?> " rel="trackback">TrackBack <abbr title="Uniform Resource Identifier">URI</abbr></a></p>
							<!--<p class="alt">
								<small>
									This entry was posted
									<?php /* This is commented, because it requires a little adjusting sometimes.
										You'll need to download this plugin, and follow the instructions:
										http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
										/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
									on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
									and is filed under <?php the_category(', ') ?>.
									You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.
			
									<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
										// Both Comments and Pings are open ?>
										You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
			
									<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
										// Only Pings are Open ?>
										Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
			
									<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
										// Comments are open, Pings are not ?>
										You can skip to the end and leave a response. Pinging is currently not allowed.
			
									<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
										// Neither Comments, nor Pings are open ?>
										Both comments and pings are currently closed.
			
									<?php } ?>
			
								</small>
							</p>-->
						</div>
						<div class="clear"></div>
					</div>
				
					<?php comments_template(); ?>
				
					<?php endwhile; else: ?>
						<p>Sorry, no posts matched your criteria.</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
