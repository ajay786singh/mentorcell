<?php
/**
 * @package WordPress
 */
// Do not delete these lines
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die (__('Please do not load this page directly. Thanks!','highthemes'));

    if ( post_password_required() ) { ?>
        <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','highthemes');?></p>
    <?php
        return;
    }
?>
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
    <div class="commnet-title">
        <h4 id="comments"><i class="fa fa-comments-o"></i><?php comments_number(__('No Comments','highthemes'), __('One Comment','highthemes'), '% '.__('Comments','highthemes') );?></h4>
    </div><!-- .fancy-title  -->
    <div class="navigation">
        <div class="alignleft"><?php previous_comments_link(__(' < Older Comments','highthemes')) ?></div>
        <div class="alignright"><?php next_comments_link(__(' < Newer Comments','highthemes')) ?></div>
    </div><!-- .navigation  -->
    <ul class="showcomments">
        <?php wp_list_comments(array('avatar_size' => 64, 'callback' => 'custom_comment')); ?>
    </ul><!-- .comment-list  -->
    <?php else : // this is displayed if there are no comments so far ?>

        <?php if ( comments_open() ) : ?>
        <!-- If comments are open, but there are no comments. -->
        <?php else : // comments are closed ?>
        <!-- If comments are closed. -->

    <?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
    <div id="respond" class="clearfix comment-respond">
            <h3>
                <?php comment_form_title( __('Leave a comment','highthemes'), __('Leave a reply','highthemes')  ); ?>
                <span class="cancel-comment-reply">
                    <small><?php cancel_comment_reply_link(__('| Cancel reply','highthemes')); ?></small>
                </span>
            </h3>     

<form action="<?php echo esc_url(get_option('siteurl')); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
    <p>
        <?php _e('You must be','highthemes');?> 
        <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('logged in','highthemes');?></a> <?php _e('to post a comment.','highthemes');?>
    </p>
    <br>
<?php else : ?>
    <?php if ( is_user_logged_in() ) : ?>
        <p><?php _e('Logged in as','highthemes'); ?> <a href="<?php echo esc_url(get_option('siteurl') . '/wp-admin/profile.php') ?>"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account','highthemes');?>"><?php _e('Log out','highthemes'); ?> &raquo;</a></p>
    <?php endif; ?>   

<?php if ( is_user_logged_in() ) : ?>

<?php else : ?>

    <div class="comment-from-control">
        <input type="text" placeholder="<?php esc_attr_e('Name','highthemes') ?> <?php if ($req) echo "*"; ?>" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
    </div>
    <div class="comment-from-control">
        <input type="text" placeholder="<?php esc_attr_e('Mail','highthemes') ?> <?php if ($req) echo "*"; ?>" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />            
    </div>
    <div class="comment-from-control">
        <input type="text" placeholder="<?php esc_attr_e('Website','highthemes') ?>" name="url" id="url" value="<?php echo esc_url($comment_author_url); ?>" tabindex="3" />
    </div>

<?php endif; ?>
    <div class="comment-from-control">
        <textarea name="comment" rows="8" cols="40" placeholder="<?php esc_textarea('Your Message','highthemes') ?> <?php if ($req) echo "*"; ?>" required="" tabindex="4"></textarea>
    </div>
    <div class="comment-notes fll">
    <?php _e('Your email address will not be published. Required fields are marked. <span class="required">*</span>','highthemes'); ?> 
    </div>
    <div class="comment-from-control">
        <input name="submit" type="submit" class="send-message button" value="<?php esc_attr_e('Submit','highthemes');?>" tabindex="5">
    </div>    
    
<?php comment_id_fields(); ?>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div><!-- #respond  -->

<?php endif; // if you delete this the sky will fall on your head ?>