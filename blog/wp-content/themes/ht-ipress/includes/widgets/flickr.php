<?php

/**
 * Highthemes Flickr
 */

class ht_flickr extends WP_Widget {

	public function __construct() {
		global  $theme_name;
		$widget_ops = array('classname' => 'ht_flickr_widget',
							'description' => __( 'Pulls in images from your Flickr account.','highthemes') );
		parent::__construct(
			'ht_flickr', 
			'Highthemes - ' . __('Flickr','highthemes'), 
			 $widget_ops // Args
		);
	}	
		

	// display the widget in the theme
	function widget( $args, $instance ) {
		global $ht_options;
		extract( $args );

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Photos on Flickr ','highthemes') : $instance['title'], $instance, $this->id_base);
		$number = (int) $instance['number'];
		$id = $instance['id'];
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title;
		

?>
<div class="flickr">
	<div class="wrap">
		<div class="fix"></div>
			<script type="text/javascript"
			src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>
		<div class="fix"></div>
	</div>
</div>
<?php
		echo $after_widget;
		
		//end
	}
	
	// update the widget when new options have been entered
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['number'] = (int) strip_tags($new_instance['number']);
		$instance['id'] = strip_tags($new_instance['id']);
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}
	
	// print the widget option form on the widget management screen
	function form( $instance ) {

	// combine provided fields with defaults
	$instance = wp_parse_args( (array) $instance, array( 'id' => '', 'number'=>6 , 'title'=>'Flickr') );
	$id = strip_tags($instance['id']);
	$number = strip_tags($instance['number']);
	$title = strip_tags($instance['title']);

	
	
	// print the form fields
?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>">
	<?php _e('Title ','highthemes'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo
		esc_attr($title); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('id'); ?>">
	<?php _e('Flickr ID ','highthemes'); ?>(idgettr.com):</label>
	<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo
		esc_attr($id); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('number'); ?>">
	<?php _e('Number:','highthemes'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo
		esc_attr($number); ?>" /></p>        
    

	<?php
	}
	}

