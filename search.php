<?php get_header(); ?>
    <div class="container">

        <div class="row">
            <div class="col-lg-9">
                <!-- Main Content -->
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <h4 class="search-title"> 
                            <?php echo $wp_query->found_posts; ?>
                            <?php _e( '則對於' ); ?> "<?php the_search_query(); ?>" 的搜尋結果: 
                        </h4>
                        <hr/>
                        <?php if ( have_posts() ) { ?>
                            <?php 
                                while ( have_posts() ) { 
                                    the_post(); 
                                    $author = $post->user_nicename;
                                    $author_url = get_author_posts_url( $post->post_author, $author );
                            ?>
                                <div class="post-preview">
                                    <a href="<?php the_permalink();?>">
                                        <h2 class="post-title">
                                            <?php the_title(); ?>
                                        </h2>
                                    </a>
                                    <p>
                                        <?php
                                            $more_text = '......<br/>(<a href="'.get_permalink().'">閱讀完整文章</a>)';
                                            echo wp_trim_words( get_the_content(), 100, $more_text);
                                        ?>
                                    </p>
                                    <span style="font-size:14px;">分類 : <?php the_category(', '); ?></span>
                                    <br/>
                                    <?php if(has_tag()):?>
                                        <span style="font-size:14px;">標籤 : <?php the_tags('', ', ', ''); ?></span>
                                    <?php endif;?>
                                    <p class="post-meta">
                                        Posted by <a href="<?php echo $author_url;?>"><?php the_author();?></a>
                                        on <?php the_time('Y/m/d H:i:s');?>
                                    </p>
                                </div>  
                                <hr/>
                            <?php } ?>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
