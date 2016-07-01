					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div id="footer">
			<div id="footerWrapper1">
				<div id="footerWrapper2">
					<div class="prop"></div>
					<div id="footerContent">
						<ul>
							<li class="archives"><h2>Archives</h2>
								<ul>
								<?php wp_get_archives('type=monthly'); ?>
								</ul>
							</li>
							<?php wp_list_bookmarks(); ?>
						</ul>
						<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
						<p class="copyright">
							&copy; Copyright 2014 - 2016 L.E.R || Killerlight Theme for two years anniversary of L.E.R Space
							<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
						</p>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>
