<?php
switch ( $layout ) {   
    case 'without-sidebar':
        $grid_9_class       = '';
        $grid_8_class       = '';
        $grid_4_class       = '';
        $grid_3_class       = 'omega';  
        $page_content_class = '';      
        break;  

    case 'both-sidebar':
        $grid_9_class       = 'grid_9 alpha';
        $grid_8_class       = 'grid_8 omega righter';
        $grid_4_class       = 'alpha';
        $grid_3_class       = 'omega';
        $page_content_class = '';      
        break;

    case 'both-sidebar-right':
        $grid_9_class       = 'grid_9 alpha';
        $grid_8_class       = 'grid_8 alpha';
        $grid_4_class       = 'omega';
        $grid_3_class       = 'omega';   
        $page_content_class = '';      
        break;

    case 'both-sidebar-left':
        $grid_9_class       = 'grid_9 omega righter';
        $grid_8_class       = 'grid_8 omega fr ';
        $grid_4_class       = 'alpha';
        $grid_3_class       = 'alpha';  
        $page_content_class = 'left_sidebar';      
        break;

    case 'sidebar-left':
        $grid_9_class       = 'grid_9 omega righter';
        $grid_8_class       = ' ';
        $grid_4_class       = '';
        $grid_3_class       = 'alpha';  
        $page_content_class = 'left_sidebar';      
        break; 

    case 'sidebar-right':
        $grid_9_class       = 'grid_9 alpha';
        $grid_8_class       = '';
        $grid_4_class       = '';
        $grid_3_class       = 'omega';  
        $page_content_class = '';      
        break;  

    default:
        $grid_9_class       = 'grid_9 alpha';
        $grid_8_class       = 'grid_8 omega righter';
        $grid_4_class       = 'alpha';
        $grid_3_class       = 'omega';  
        $page_content_class = '';      
        break;
        
}