<?php get_header(); ?>


<div class="container container_background">
    <div class="section no-pad-bot" id="index-banner" style="margin-top:1px;">
        <div class="row">
            <div class="col s12 m4 l2"></div>
            <div class="col s12 m4 l8">
                <?php
                    display_gallery( json_decode( esc_attr( get_option('index_gallery_image_ids') ) ) );
                ?>
            </div>
            <div class="col s12 m4 l2"></div>
        </div>   
    </div>

    <div class="section">
        <div class="row">
            <?php
            if (have_posts()) :
                $args = array( 'posts_per_page' => 3 );
                $lastposts = get_posts( /*$args*/ );
                foreach ( $lastposts as $post ) :
                    setup_postdata( $post );
                    $author = $post->user_nicename;
                    $author_url = get_author_posts_url( $post->post_author, $author );
            ?>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                        <img src="<?php echo get_post_thumb_url($post);?>">
                        <span class="card-title"><?php the_title();?></span>
                        </div>
                        <div class="card-content">
                            <p>
                            <?php
                                echo wp_trim_words( get_the_content(), 100, "......");
                            ?>
                            </p>
                        </div>
                        <div class="card-action">
                        <a href="<?php echo get_permalink();?>">閱讀完整文章</a>
                        </div>
                    </div>
                </div>
            <?php
                endforeach; 
                wp_reset_postdata();
            else:
            ?>
                <div class="col s12 m4">
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                        <img src="<?php echo get_post_thumb_url($post);?>">
                        <span class="card-title">目前還沒有文章</span>
                        </div>
                        <div class="card-content">
                            <p>
                                到網站四處逛逛吧~
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>

    <!-- <?php get_sidebar(); ?> -->
    <?php get_footer(); ?>
</div>
