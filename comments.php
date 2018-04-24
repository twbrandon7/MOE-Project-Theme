<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;

function show_content(WP_Comment $comment, $is_sub){
    $authorObj = get_user_by("email", $comment->comment_author_email);
    $author = $authorObj->user_nicename;

    $max_depth = get_option('thread_comments_depth');
    //add max_depth to the array and give it the value from above and set the depth to 1
    $default = array(
        'add_below'  => 'comment',
        'respond_id' => 'respond',
        'reply_text' => __('Reply'),
        'login_text' => __('Log in to Reply'),
        'depth'      => 1,
        'before'     => '',
        'after'      => '',
        'max_depth'  => $max_depth
        );
    $reply_link = get_comment_reply_link( $default, $comments[0]->comment_ID, get_the_ID() );
    
    if($is_sub){
        echo '<div class="row" style="margin-left:20px; margin-top:20px;">' . "\n";
    }else{
        echo '<hr/><div class="row" style="margin-top:30px;">' . "\n";
    }
    echo "\t\t" . '<div class="col-lg-2">' . "\n";
    if($is_sub){
        echo "\t\t\t" . get_avatar( $comment->comment_author_email, 50 ) . "\n";
    }else{
        echo "\t\t\t" . get_avatar( $comment->comment_author_email, 74 ) . "\n";
    }
    echo "\t\t\t" . '<span style="font-size:14px;">';
    echo "\n\t\t\t".'</span>' . "\n";
    echo "\t\t".'</div>'."\n";
    echo "\t\t".'<div class="col-lg-10">'."\n";
    echo "\t\t\t".'<div class="post_title">'."\n";
    echo "\t\t\t\t".'<span class="post-meta">'."\n";
    echo '                由 <a href="'.$author.'">'.$comment->comment_author.'</a> 發表'."\n";
    echo '                • ' . $comment->comment_date;
    if(wp_get_current_user()->user_email == $comment->comment_author_email && $comment->user_id != 0){
        echo '  ( <a href="'.get_edit_comment_link($comment->comment_ID).'">編輯</a> )' . "\n";
    }
    echo "&nbsp; | &nbsp;" . $reply_link."\n";
    echo '            </span>'."\n";
    echo '        </div>'."\n";
    echo '        <div>'."\n";
    echo '            ' . $comment->comment_content."\n";
    echo '        </div>'."\n";
    echo '    </div>'."\n";
    echo '</div>'."\n";
    echo comment_reply_link( array ( 'reply_text' => 'Reply' ) );
}
?>

<div id="comments" class="comments-area">
    <div class="comments-title">
        <?php
            printf( _nx( '%1$s 則留言', '%1$s 則留言', get_comments_number(), 'comments title', 'twentythirteen' ),
            number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
        ?>
    </div>
</div>
 
<div id="comments" class="comments-area">
    <?php
        foreach($comments as $comment){
            show_content($comment, false);
            $subs = $comment->get_children();
            foreach($subs as $sub){
                show_content($sub, true);
            }
        }
    ?>
    <hr/>
    <?php if ( have_comments() ) : ?>
 
    <?php endif; // have_comments() ?>
 
    <?php
        $fields =  array(
              'author' =>
                '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<br/><input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' /></p>',
            
              'email' =>
                '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<br/><input class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' /></p>',
            
              'url' =>
                '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
                '<br/><input class="form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                '" size="30" /></p>',
            );
        
        $c_args = array(
            "title_reply_before" => '<div class="comments-title"><b>',
            "title_reply_after" => "</b></div>",
            "logged_in_as" => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            "comment_field" => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br/><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
            "class_submit" => "btn btn-default",
            "fields" => $fields,
        );
        comment_form($c_args);
    ?>
 
</div><!-- #comments -->