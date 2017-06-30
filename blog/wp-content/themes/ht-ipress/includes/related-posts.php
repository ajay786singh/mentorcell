<?php $related = ht_related_posts(); ?>
<?php if ( $related->have_posts() ): ?>

    <div class="related_posts mbf clearfix">
        <div class="title">
            <h4><?php _e('Related Posts', 'highthemes');?></h4>
        </div>

        <div class="carousel_related">
      		<?php while ( $related->have_posts() ) : $related->the_post(); ?>
				<?php if ( has_post_thumbnail() ): 
					  $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'related_thumbnail' );
				?>
		            <div class="item hover-shadow">
		            <a href="<?php the_permalink();?>">
			            <img class="toptip" src="<?php echo $image_url[0];?>" alt="<?php the_title_attribute()?>" title="<?php the_title();?>">
		            </a>
		            </div>
	            <?php endif;?>
			<?php endwhile; ?>

        </div>
    </div><!-- /related -->

<?php endif; ?>
<?php wp_reset_query(); ?>

