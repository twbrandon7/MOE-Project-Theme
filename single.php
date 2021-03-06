<?php get_header(); ?>
<?php
    $current_url = home_url(add_query_arg(array(),$wp->request));
    $postObj = get_post(url_to_postid($current_url));
    $content = $postObj->post_content;
    $post_date = $postObj->post_date;
    $post_modified = $postObj->post_modified;
    $title = $postObj->post_title;
    $allow_comment = ($postObj->comment_status == "open")? true : false;
    $authorObj = get_user_by("ID", $postObj->post_author);
    $author = $authorObj->user_nicename;
    $author_url = get_author_posts_url( $postObj->post_author, $author );

    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );
?>

<div class="container container_background">
    <div class="section">
        <div class="row post_content">
            <div class="col s1"></div>
            <div class="col s10">
                <h3><?php echo $title;?></h3>
                <br/>
                <?php echo $content;?>
                <div class="post_title" style="margin-top:30px; margin-bottom:20px;">
                    <span class="post-meta">
                        本文由 <a href="<?php echo $author_url;?>"><?php echo $author;?></a> 發表
                        • <?php echo $post_date;?>
                    </span>
                </div>
            </div>
            <div class="col s1"></div>
        </div>
        
        <div>
            <?php //comments_template(); ?>
        </div>
    </div>

    <!-- <?php get_sidebar(); ?> -->
    <?php get_footer(); ?>
</div>
