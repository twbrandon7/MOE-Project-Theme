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
?>

<div class="container">
    <div class="row post_content">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h2><?php echo $title;?></h2>
            <br/>
            <?php echo $content;?>
            <div class="post_title" style="margin-top:30px; margin-bottom:20px;">
                <span class="post-meta">
                    本文由 <a href="<?php echo $author_url;?>"><?php echo $author;?></a> 發表
                    • <?php echo $post_date;?>
                </span>
            </div>
        </div>
    </div>
    
    <div>
        <?php //comments_template(); ?>
    </div>
</div>
<!-- <div class="col-lg-3 sidebar">
    <?php get_sidebar(); ?>
</div> -->
<?php get_footer(); ?>
