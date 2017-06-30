<?php
class ht_recent_comments extends WP_Widget {

	public function __construct() {
			$widget_ops = array('classname' => 'ht_recent_comments',
							'description' => __( 'Shows recent comments.','highthemes') );
			parent::__construct(
				'ht_recent_comments', 
				'Highthemes - ' . __('Recent Comments','highthemes'), 
				 $widget_ops // Args
			);
	}


	function widget($args, $instance) {  
		extract( $args );
		$title     = $instance['title'];
		$postcount = $instance['postcount'];
		$title     = apply_filters('widget_title', empty($instance['title']) ? __('Recent Comments','highthemes') : $instance['title'], $instance, $this->id_base);

		echo $before_widget;

		if ( $title ) echo $before_title . $title . $after_title;
        ?>	
		<ul class="recent_comments small_posts">
			<?php
            $comment_posts = get_option('comment_posts');
            if (empty($comment_posts) || $comment_posts < 1) $comment_posts = $postcount;
            
            global $wpdb;
             
            $sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
            comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved,
            comment_type,comment_author_url,
            SUBSTRING(comment_content,1,50) AS com_excerpt
            FROM $wpdb->comments
            LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
            $wpdb->posts.ID)
            WHERE comment_approved = '1' AND comment_type = '' AND
            post_password = ''
            ORDER BY comment_date_gmt DESC LIMIT ".$comment_posts;
            
            $comments = $wpdb->get_results($sql);
            
            foreach ($comments as $comment) {
            
            
            ?>
							<li class="clearfix">
								<a class="s_thumb hover-shadow" href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>"><?php echo get_avatar( $comment, '80' ); ?></a>
								<h5><a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title="on <?php echo $comment->post_title; ?>"><?php echo strip_tags($comment->comment_author); ?> </a>:</h5>
								<p><?php echo strip_tags($comment->com_excerpt); ?>...</p>
							</li>
            <?php 
            }
	echo '</ul>';
	echo $after_widget;
   }


   function form($instance) {   
   
   		$defaults = array('title' => 'Recent Comments','postcount' => '4');
		$instance = wp_parse_args((array) $instance, $defaults);    
   
       $title = esc_attr($instance['title']);
	   $postcount = esc_attr($instance['postcount']);

       ?>
       	<p>
	   	   	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:','highthemes'); ?></label>
			<input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>"  value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
       	</p>
       
       	<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'postcount' )); ?>"><?php _e('Number of comments', 'highthemes') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo esc_attr($instance['postcount']); ?>" />
		</p>
      <?php
   }

} 
?>