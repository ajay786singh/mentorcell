<?php if( ot_get_option('wp_pagenavi') == 'on' && function_exists('wp_pagenavi') ) { ?>
	<div class="navi clearfix">
			<?php wp_pagenavi(); ?>
	</div><!--/.pagination-->
<?php } else { ?>
	<div class="navi clearfix">
			<ul class="pagination_default clearfix">
				<li class="newer lefter"><?php previous_posts_link(); ?></li>
				<li class="older righter"><?php next_posts_link(); ?></li>
			</ul>
	</div><!--/.pagination-->
<?php } ?>