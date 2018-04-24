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
    <!-- Page Header -->
    <header class="masthead" style="position: relative; background-image: url('<?php echo my_image_display(); ?>');">
        <div class="darker" style="width:100%; height:100%;">
            <div class="site-heading post-heading">
                <div class="header_block post_header">
                    <div class="post_header_title"><?php echo $title;?></div>
                    <!--<span class="subheading"><?php bloginfo( 'description' ); ?></span>-->
                </div>
            </div>
        </div>
        <div class="site-heading post-heading">
			<div class="header_block post_header">
                <div class="post_header_title"><?php echo $title;?></div>
                <!--<span class="subheading"><?php bloginfo( 'description' ); ?></span>-->
			</div>
        </div>
    </header>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Main Content -->
            <div class="row post_content">
                <div class="col-lg-8 col-md-10 mx-auto">
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
        </div>
    </div>
</div>
<?php get_footer(); ?>
