<?php
if ( ! function_exists( 'tfuse_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own tfuse_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function tfuse_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
       <a name="comment-<?php comment_ID() ?>"></a>
        <div id="li-comment-<?php comment_ID() ?>" class="comment-container comment-body clearfix">
            <p><?php _e( 'Pingback:', 'tfuse' ); ?> <?php comment_author_link(); ?>
                <span class="comment-date"><?php comment_date() ?></span>
                <?php comment_text() ?>
        </div><?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <a name="comment-<?php comment_ID() ?>"></a>

            <div id="li-comment-<?php comment_ID() ?>" class="comment-body clearfix">

                <div class="comment-avatar">
                    <div class="avatar"><?php echo get_avatar( $comment, 68); ?></div>
                </div>

                <div class="comment-text">

                    <div class="comment-author">
                         <span class="link-author"><?php comment_author_link() ?></span>
                        <span class="comment-date"><?php comment_date() ?></span> | 
                        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
                    </div>

                    <div class="comment-entry">
                         <?php echo get_comment_text() ?>               
                    </div>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <p class='unapproved'><?php _e('Your comment is awaiting moderation.', 'tfuse'); ?></p>
                        <br />
                    <?php endif; ?>
                </div>
                <div class="clear"></div>
                <!-- /.comment-head -->
                <div id="comment-<?php comment_ID(); ?>"></div>
                
            </div><!-- /.comment-container -->
    <?php
            break;
        endswitch;
}
endif; // ends check for tfuse_comment()
