<?php

/**
 * Remove Front-End Editor
 */
if(function_exists('vc_disable_frontend')){
  vc_disable_frontend();

}

/**
 * Remove the vc teaser content box
 */
add_action( 'admin_head', 'remove_vc_teaser_box' );
function remove_vc_teaser_box() {
  remove_meta_box('vc_teaser','page','side');
  remove_meta_box('vc_teaser','post','side');
  remove_meta_box('vc_teaser','portfolio','side');

}
 /**
 * Change the name of FAQ Shortcode
 */
vc_map_update('vc_toggle', 'name', __("Toggle", "highthemes") );

/**
 * Remove some elements
 */
vc_remove_element("vc_message");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_basic_grid");
vc_remove_element("vc_carousel");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_media_grid");
vc_remove_element("vc_masonry_grid");
vc_remove_element("vc_masonry_media_grid");
vc_remove_element("vc_icon");
vc_remove_element("vc_media_grid");




/**
 * Get the categories
 */
  $categories = array();
  $categories_obj = get_categories('hide_empty=0');
  foreach ($categories_obj as $highcat) {
      $categories[$highcat->cat_name] = $highcat->cat_ID;
  }

/* ht_featured_category
---------------------------------------------------------- */
vc_map( array(
		"name"                    => __("Featured Category", "highthemes"),
		"base"                    => "ht_featured_category",
		"icon"                    => 'ht-logo',
		"show_settings_on_create" => true,
		"description"             => __("Display a featured category.","highthemes"),
		"category"                => __('Blocks', 'highthemes'),
		"params"                  => array(
			array(
				"type"        => "dropdown",
				"heading"     => __("Category", "highthemes"),
				"description" => __("Select the category.","highthemes"),
				"param_name"  => "cat_id",
				"value"       => $categories,
			),
			array(
				"type"        => "checkbox",
				"heading"     => __("Link to Category Page?", "highthemes"),
				"param_name"  => "cat_link",
				"value"       => Array(__("Yes", "highthemes") => 'yes'),
			),
			array(
				"type"        => "textfield",
				"heading"     => __("Posts Number", "highthemes"),
				"param_name"  => "post_number",
				"description" => __("Enter the number of posts", "highthemes"),
			),
			array(
				"type"       => "dropdown",
				"heading"    => __("Column", "highthemes"),
				"param_name" => "column",
				"value"      => array(
				                __("1 Column", "highthemes")   => '1',
				                __("2 Column", "highthemes")   => '2',
				              ),
				"description" => __("Set number of columns here.", "highThemes")
			), 			
			array(
				"type"        => "textfield",
				"heading"     => __("Extra class name", "highthemes"),
				"param_name"  => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your custom css codes.", "highthemes")
			)               
	),
) );

/* ht_featured_cat_carousel
---------------------------------------------------------- */
vc_map( array(
		"name"                    => __("Featured Cat With Carousel", "highthemes"),
		"base"                    => "ht_featured_cat_carousel",
		"icon"                    => 'ht-logo',
		"show_settings_on_create" => true,
		"description"             => __("Display a featured category with carousel.","highthemes"),
		"category"                => __('Blocks', 'highthemes'),
		"params"                  => array(
			array(
				"type"        => "dropdown",
				"heading"     => __("Category", "highthemes"),
				"description" => __("Select the category.","highthemes"),
				"param_name"  => "cat_id",
				"value"       => $categories,
			),
			array(
				"type"        => "checkbox",
				"heading"     => __("Link to Category Page?", "highthemes"),
				"param_name"  => "cat_link",
				"value"       => Array(__("Yes", "highthemes") => 'yes'),
			),
			array(
				"type"        => "textfield",
				"heading"     => __("Posts Number", "highthemes"),
				"param_name"  => "post_number",
				"description" => __("Enter the number of posts", "highthemes"),
			),
			array(
				"type"       => "dropdown",
				"heading"    => __("Column", "highthemes"),
				"param_name" => "cols",
				"value"      => array(
				                __("2 Column", "highthemes")   => '2c',
				                __("3 Column", "highthemes")   => '3c',
				              ),
				"description" => __("Set number of columns here.", "highThemes")
			),
			array(
				"type"        => "checkbox",
				"heading"     => __("Show Details?", "highthemes"),
				"param_name"  => "show_details",
				"value"       => Array(__("Yes", "highthemes") => 'yes'),
				"description" => __("Check this box if you would like to show details.", "highthemes")
			),  			 			
			array(
				"type"        => "textfield",
				"heading"     => __("Extra class name", "highthemes"),
				"param_name"  => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your custom css codes.", "highthemes")
			)               
	),
) );

/* ht_post_of_day
---------------------------------------------------------- */
vc_map( array(
		"name"                    => __("Post Of The Day", "highthemes"),
		"base"                    => "ht_post_of_day",
		"icon"                    => 'ht-logo',
		"show_settings_on_create" => true,
		"description"             => __("Display a post as Post Of The Day.","highthemes"),
		"category"                => __('Blocks', 'highthemes'),
		"params"                  => array(
			array(
				"type"        => "textfield",
				"heading"     => __("Title", "highthemes"),
				"param_name"  => "title",
				"description" => __("Enter a new title", "highthemes"),
			),	
			array(
				"type"        => "checkbox",
				"heading"     => __("Vertical?", "highthemes"),
				"param_name"  => "vertical",
				"value"       => Array(__("Yes", "highthemes") => 'yes'),
				"description" => __("Check this box if you would like to show vertically.", "highthemes")
			),  			 			
			array(
				"type"        => "textfield",
				"heading"     => __("Extra class name", "highthemes"),
				"param_name"  => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your custom css codes.", "highthemes")
			)               
	),
) );

/* ht_fancy_title
---------------------------------------------------------- */
vc_map( array(
		"name"                    => __("Fancy Title", "highthemes"),
		"base"                    => "ht_fancy_title",
		"icon"                    => 'ht-logo',
		"show_settings_on_create" => true,
		"description"             => __("Fancy title.","highthemes"),
		"params"                  => array(
			array(
				"type"        => "textfield",
				"heading"     => __("Title", "highthemes"),
				"param_name"  => "title",
				"description" => __("Enter a new title", "highthemes"),
			),	  
			array(
				"type"       => "dropdown",
				"heading"    => __("Color", "highthemes"),
				"param_name" => "color",
				"value"      => array(
									__("Default", "highthemes")   => 'color9',
									__("Emerald", "highthemes")   => 'color1',
									__("Yellow", "highthemes")    => 'color2',
									__("Pink", "highthemes")      => 'color3',
									__("Green", "highthemes")     => 'color4',
									__("Blue", "highthemes")      => 'color5',
									__("Dark Blue", "highthemes") => 'color6',
									__("Red", "highthemes")       => 'color7',
									__("Asphalt", "highthemes")   => 'color8',
				              ),
				"description" => __("Select color.", "highThemes")
			),				          
	),
) );

/* ht_notification
---------------------------------------------------------- */
vc_map( array(
		"name"                    => __("Notification Box", "highthemes"),
		"base"                    => "ht_notification",
		"icon"                    => 'ht-logo',
		"show_settings_on_create" => true,
		"description"             => __("Notification Box.","highthemes"),
		"params"                  => array(
			array(
				"type"        => "textfield",
				"heading"     => __("Title", "highthemes"),
				"param_name"  => "title",
				"description" => __("Enter a title for notification box", "highthemes"),
			),
			array(
				"type"       => "dropdown",
				"heading"    => __("Type", "highthemes"),
				"param_name" => "type",
				"value"      => array(
									__("Success", "highthemes")     => 'success',
									__("Information", "highthemes") => 'info',
									__("Error", "highthemes")       => 'error',
									__("Warning", "highthemes")     => 'warning',
				              ),
				"description" => __("Select type of notification box.", "highThemes")
			),				            
	),
) );

/* ht_quote
---------------------------------------------------------- */
vc_map( array(
		"name"                    => __("BlockQuote", "highthemes"),
		"base"                    => "ht_quote",
		"icon"                    => 'ht-logo',
		"show_settings_on_create" => true,
		"description"             => __("BlockQuote.","highthemes"),
		"params"                  => array(
			array(
				"type"        => "textfield",
				"heading"     => __("Content", "highthemes"),
				"param_name"  => "content",
				"description" => __("Enter content of blockquote", "highthemes"),
			),
			array(
				"type"       => "dropdown",
				"heading"    => __("Type", "highthemes"),
				"param_name" => "align",
				"value"      => array(
									__("Default", "highthemes") => 'default',
									__("Left", "highthemes")    => 'left',
									__("Right", "highthemes")   => 'right',
				              ),
				"description" => __("Select align of blockquote.", "highThemes")
			),							            
	),
) );

/* ht_button
---------------------------------------------------------- */
vc_map( array(
		"name"                    => __("Simple Button", "highthemes"),
		"base"                    => "ht_button",
		"icon"                    => 'ht-logo',
		"show_settings_on_create" => true,
		"description"             => __("Simple Button.","highthemes"),
		"params"                  => array(
			array(
				"type"        => "textfield",
				"heading"     => __("Title", "highthemes"),
				"param_name"  => "title",
				"description" => __("Enter a new title", "highthemes"),
			),
			array(
				"type"        => "textfield",
				"heading"     => __("Link", "highthemes"),
				"param_name"  => "link",
				"description" => __("Enter full url", "highthemes"),
			),
			array(
				"type"       => "dropdown",
				"heading"    => __("Target", "highthemes"),
				"param_name" => "target",
				"value"      => array(
									__("Self", "highthemes")  => '_self',
									__("Blank", "highthemes") => '_blank',
				              ),
				"description" => __("Select target.", "highThemes")
			),	
			array(
				"type"       => "dropdown",
				"heading"    => __("Size", "highthemes"),
				"param_name" => "size",
				"value"      => array(
									__("Small", "highthemes")    => 'small',
									__("Medium", "highthemes")   => 'medium',
									__("Large", "highthemes")    => 'large',
				              ),
				"description" => __("Select size.", "highThemes")
			),											  
			array(
				"type"       => "dropdown",
				"heading"    => __("Color", "highthemes"),
				"param_name" => "color",
				"value"      => array(
									__("Default", "highthemes")   => 'colordefault',
									__("Emerald", "highthemes")   => 'color1',
									__("Yellow", "highthemes")    => 'color2',
									__("Pink", "highthemes")      => 'color3',
									__("Green", "highthemes")     => 'color4',
									__("Blue", "highthemes")      => 'color5',
									__("Dark Blue", "highthemes") => 'color6',
									__("Red", "highthemes")       => 'color7',
									__("Asphalt", "highthemes")   => 'color8',
				              ),
				"description" => __("Select color.", "highThemes")
			),				          
	),
) );

?>
