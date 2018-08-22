<?php
require_once get_template_directory() . '/functions/gallery_generator.php';

function mt_gallery( $atts ) {
    $a = shortcode_atts( array(
        'images' => '',
        'titles' => '',
        'subtitles' => '',
    ), $atts );

    return get_gallery_for_post( $ids=explode(",", $a['images']), $titles=explode(",", $a['titles']), $subtitles=explode(",", $a['subtitles']) );
}

function mt_cat_gallery( $atts ) {
    $a = shortcode_atts( array(
        'title' => 'true',
    ), $atts );

    $title = true;
    if($a['title'] != 'true'){
        $title = false;
    }

    return get_gallery_from_category($title);
}

add_shortcode( 'mt-gallery', 'mt_gallery' );
add_shortcode( 'mt-cat-gallery', 'mt_cat_gallery' );

?>