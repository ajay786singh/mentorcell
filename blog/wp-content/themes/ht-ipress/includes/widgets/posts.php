<?php
/**
 * Highthemes Posts Widgets
 */

class ht_posts extends WP_Widget {
	public function __construct() {
			$widget_ops = array('classname' => 'ht_posts',
							'description' => __( 'Display Posts With Thumbnails','highthemes') );
			parent::__construct(
				'ht_posts', 
				'Highthemes - ' . __('Display Posts','highthemes'), 
				 $widget_ops // Args
			);
	}
		
	public function widget($args, $instance) {

		extract( $args );

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Random Posts','highthemes') : $instance['title'], $instance, $this->id_base);
		$posts_thumbnail = $instance['posts_thumbnail'];

		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title;

		$posts = new WP_Query( array(
			'post_type'           => array( 'post' ),
			'showposts'           => $instance['posts_num'],
			'cat'                 => $instance['posts_cat_id'],
			'ignore_sticky_posts' => true,
			'orderby'             => $instance['posts_orderby'],
			'order'               => 'desc',
			'date_query' => array(
				array(
					'after' => $instance['posts_time'],
				),
			),
		) );

	if( 'small' == $posts_thumbnail ) {
		echo '<ul class="small_posts">';
	}
	while ( $posts->have_posts() ): $posts->the_post(); 
	if( ! has_post_thumbnail() ) continue;
	    $category  = get_the_category();   

	    if( 'full' == $posts_thumbnail ) {
	?>
		<div class="relative hover-shadow full-thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumb_pof_1'); ?></a>
			<div class="r_content">
			<?php
            if( $category[0] ){
                $cat_name       = $category[0]->cat_name;
                $cat_id         = $category[0]->term_id;

                echo '<a class="cat '. ht_category_color( $cat_id ) .'" href="'.get_category_link( $cat_id ).'" title="'.__('View all posts under ', 'highthemes'). $cat_name .'">'. $cat_name .'</a>';
            } 
            ?>			
				<div class="r_title"><a href="<?php the_permalink(); ?>"><?php echo ht_excerpt(40, '...');?></a></div>
			</div>
		</div><!-- relative -->				
	<?php 
	} else {
	?>
		<li class="clearfix">
			<a class="s_thumb hover-shadow" href="<?php the_permalink();?>"><?php the_post_thumbnail(array(80, 80) ); ?></a>
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<div class="meta mb"> <?php echo ht_time_ago();?>    /    <a href="<?php the_permalink();?>"><?php comments_number( __('No Comments', 'highthemes'),  __('1 Comment', 'highthemes'),  __('% Comments', 'highthemes') ); ?></a> </div>
		</li>
	<?php 
	}
	endwhile; 
	if( 'small' == $posts_thumbnail ) {
		echo '</ul>';
	}	
		echo $after_widget;
	}

	public function update($new, $old) {
		$instance                    = $old;
		$instance['title']           = strip_tags($new['title']);
		$instance['posts_num']       = strip_tags($new['posts_num']);
		$instance['posts_cat_id']    = strip_tags($new['posts_cat_id']);
		$instance['posts_orderby']   = strip_tags($new['posts_orderby']);
		$instance['posts_time']      = strip_tags($new['posts_time']);
		$instance['posts_thumbnail'] = strip_tags($new['posts_thumbnail']);
		
		return $instance;
	}

	public function form($instance) {
		// Default widget settings
		$defaults = array(
			'title' 			=> '',
			'posts_num' 		=> '4',
			'posts_cat_id' 		=> '0',
			'posts_orderby' 	=> 'date',
			'posts_time' 		=> '0',
			'posts_thumbnail'   => 'full',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
?>
		<div class="ht-options-posts">
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title :', 'highthemes'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" />
		</p>
		
		<p>
			<label style="width: 55%; display: inline-block;" for="<?php echo esc_attr($this->get_field_id("posts_num")); ?>"><?php _e('Items to show', 'highthemes'); ?></label>
			<input style="width:20%;" id="<?php echo esc_attr($this->get_field_id("posts_num")); ?>" name="<?php echo esc_attr($this->get_field_name("posts_num")); ?>" type="text" value="<?php echo esc_attr(absint($instance["posts_num"])); ?>" size='3' />
		</p>
		<p>
			<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr($this->get_field_id("posts_cat_id")); ?>"><?php _e('Category:', 'highthemes'); ?></label>
			<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("posts_cat_id"), 'selected' => $instance["posts_cat_id"], 'show_option_all' => 'All', 'show_count' => true ) ); ?>		
		</p>
		<p style="padding-top: 0.3em;">
			<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr($this->get_field_id("posts_thumbnail")); ?>"><?php _e('Thumbnail Size:', 'highthemes'); ?></label>
			<select style="width: 100%;" id="<?php echo esc_attr($this->get_field_id("posts_thumbnail")); ?>" name="<?php echo esc_attr($this->get_field_name("posts_thumbnail")); ?>">
			  <option value="full"<?php selected( $instance["posts_thumbnail"], "full" ); ?>><?php _e('Full', 'highthemes'); ?></option>
			  <option value="small"<?php selected( $instance["posts_thumbnail"], "small" ); ?>><?php _e('Small', 'highthemes'); ?></option>
			</select>	
		</p>		
		<p style="padding-top: 0.3em;">
			<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr($this->get_field_id("posts_orderby")); ?>"><?php _e('Order by:', 'highthemes'); ?></label>
			<select style="width: 100%;" id="<?php echo esc_attr($this->get_field_id("posts_orderby")); ?>" name="<?php echo esc_attr($this->get_field_name("posts_orderby")); ?>">
			  <option value="date"<?php selected( $instance["posts_orderby"], "date" ); ?>><?php _e('Most recent', 'highthemes'); ?></option>
			  <option value="comment_count"<?php selected( $instance["posts_orderby"], "comment_count" ); ?>><?php _e('Most commented', 'highthemes'); ?></option>
			  <option value="rand"<?php selected( $instance["posts_orderby"], "rand" ); ?>><?php _e('Random', 'highthemes'); ?></option>
			</select>	
		</p>
		<p style="padding-top: 0.3em;">
			<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr($this->get_field_id("posts_time")); ?>"><?php _e('Posts from:', 'highthemes'); ?></label>
			<select style="width: 100%;" id="<?php echo esc_attr($this->get_field_id("posts_time")); ?>" name="<?php echo esc_attr($this->get_field_name("posts_time")); ?>">
			  <option value="0"<?php selected( $instance["posts_time"], "0" ); ?>><?php _e('All time', 'highthemes'); ?></option>
			  <option value="1 year ago"<?php selected( $instance["posts_time"], "1 year ago" ); ?>><?php _e('This year', 'highthemes'); ?></option>
			  <option value="1 month ago"<?php selected( $instance["posts_time"], "1 month ago" ); ?>><?php _e('This month', 'highthemes'); ?></option>
			  <option value="1 week ago"<?php selected( $instance["posts_time"], "1 week ago" ); ?>><?php _e('This week', 'highthemes'); ?></option>
			  <option value="1 day ago"<?php selected( $instance["posts_time"], "1 day ago" ); ?>><?php _e('Past 24 hours', 'highthemes'); ?></option>
			</select>	
		</p>
	</div>
<?php

}

}
