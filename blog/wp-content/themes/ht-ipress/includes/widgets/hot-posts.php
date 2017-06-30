<?php
/**
 * Highthemes Hot Posts
 */
	class ht_hot_posts extends WP_Widget {
		public function __construct() {
				$widget_ops = array('classname' => 'ht_hot_posts',
								'description' => __( 'Display Most Rated Posts Based on WP Review Plugin, You need to install wp review plugin first.','highthemes') );
				parent::__construct(
					'ht_hot_posts', 
					'Highthemes - ' . __('Hot Posts','highthemes'), 
					 $widget_ops // Args
				);
		}
			
		public function widget($args, $instance) {

			extract( $args );

			$title = apply_filters('widget_title', empty($instance['title']) ? __('Hot Posts','highthemes') : $instance['title'], $instance, $this->id_base);
			$review_type = $instance['review_type'];

			echo $before_widget;
			if ( $title ) echo $before_title . $title . $after_title;

			echo  "\n".'<div class="small_slider_hots owl-carousel owl-theme">' . "\n\t";
	        $args = array(
				'post_type'           => 'post',
				'showposts'           => $instance['posts_num'],
				'orderby'             => 'meta_value_num', 
				'meta_key'            => 'wp_review_total',
				'order'               => 'desc', 
				'ignore_sticky_posts' => 1, 
	        );
	        $args['meta_query'] = array('relation' => 'AND');
	        if ( $review_type != 'any') {
	            $args['meta_query'][] = array(
	                'key' => 'wp_review_type',
	                'compare' => '=',
	                'value' => $review_type
	            );
	        } else {
	            $args['meta_query'][] = array(
	                'key' => 'wp_review_type',
	                'compare' => '!=',
	                'value' => ''
	            );
	        }

			$posts = new WP_Query( $args);
	        $post_count = $posts->post_count;


			$i = 0;
			while ( $posts->have_posts() ): $posts->the_post(); 
		    	$category  = get_the_category(); 

		    	if( 0 == $i || $i % 4 == 0) { // start the wrapper for first and every 4th items
		    		echo '<div class="item clearfix">' . "\n\t".
		    				'<ul class="small_posts">' . "\n\t";
		    	}

		    ?>
				<li class="clearfix">
					<a class="s_thumb hover-shadow" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(80, 80)); ?><span><?php echo $i + 1;?></span></a>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
					<div class="meta mb"> 
					<?php
		            if( $category[0] ){
		                $cat_name       = $category[0]->cat_name;
		                $cat_id         = $category[0]->term_id;

		                echo '<a class="cat '. ht_category_color( $cat_id ) .'" href="'.get_category_link( $cat_id ).'" title="'.__('View all posts under ', 'highthemes'). $cat_name .'">'. $cat_name .'</a>';
		            } 
		            $wp_review_show_total = get_post_meta( get_the_ID(), 'wp_review_total', true );
					if( ! empty( $wp_review_show_total ) ) {
			 		?>
			 		<?php if( function_exists('wp_review_show_total') ) { ?>
					<div class="post_rating">
					<?php wp_review_show_total(true, 'review-total-only') ; ?>
					</div> 
					<?php 				
						}
				 	}
				 	?>
					</div>
				</li>
			<?php  
		    	if( 4 == $i + 1 || ($i + 1) % 4 == 0 || $post_count == $i + 1) { 
		    		echo '</ul>
							</div>';
		    	}

			$i++;
			endwhile;
		 	?>


		<?php

		wp_reset_postdata();
			echo  '</div>';
			echo $after_widget;
		}

		public function update($new, $old) {
			$instance                  = $old;
			$instance['title']         = strip_tags($new['title']);
			$instance['posts_num']     = strip_tags($new['posts_num']);
			$instance['review_type']     = strip_tags($new['review_type']);
			
			return $instance;
		}

		public function form($instance) {
			// Default widget settings
			$defaults = array(
				'title' 			=> '',
				'posts_num' 		=> '4',
				'review_type'	    =>'any'
			);
			$instance = wp_parse_args( (array) $instance, $defaults );
			extract($instance);

	?>
			<div class="ht-options-posts">
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title :', 'highthemes'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" />
			</p>
			
			<p>
				<label  for="<?php echo esc_attr($this->get_field_id("posts_num")); ?>"><?php _e('Items to show', 'highthemes'); ?></label>
				<input style="margin-left: 12px;" id="<?php echo esc_attr($this->get_field_id("posts_num")); ?>" name="<?php echo esc_attr($this->get_field_name("posts_num")); ?>" type="text" value="<?php echo absint($instance["posts_num"]); ?>" size='3' />
			</p>

	        <p class="wp_review_tab_review_type">
				<label for="<?php echo esc_attr($this->get_field_id('review_type')); ?>"><?php _e('Review type:', 'highthemes'); ?></label> 
				<select id="<?php echo esc_attr($this->get_field_id('review_type')); ?>" name="<?php echo esc_attr($this->get_field_name('review_type')); ?>" style="margin-left: 12px;">
					<option value="any" <?php selected($review_type, 'any', true); ?>><?php _e('Any', 'highthemes'); ?></option>
					<option value="star" <?php selected($review_type, 'star', true); ?>><?php _e('Star', 'highthemes'); ?></option>
					<option value="point" <?php selected($review_type, 'point', true); ?>><?php _e('Point', 'highthemes'); ?></option>
					<option value="percentage" <?php selected($review_type, 'percentage', true); ?>><?php _e('Percentage', 'highthemes'); ?></option>
				</select>       
			</p>		

		</div>
	<?php

		}

	}

