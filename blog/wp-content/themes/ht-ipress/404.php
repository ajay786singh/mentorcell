<?php get_header(); ?>
<div class="page-content errorpage">
  <div class="row clearfix">
    <div class="grid_6">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/images/404.jpg') ?>" alt="">
    </div>
    <div class="grid_6">
      <h2 class="mts mb"> <?php _e("PAGE NOT FOUND", "highthemes");?> <small> <?php _e("The page you are looking for might have been removed, had its name changed.", "highthemes");?></small></h2>
      <a href="<?php echo esc_url( home_url() ) ?>" class="tbutton medium"><span><i class="fa fa-arrow-left"></i> <?php _e("Back To Homepage", "highthemes");?></span></a>
    </div>
  </div><!-- /row -->
</div><!-- /end errorpage -->
<?php get_footer();?>