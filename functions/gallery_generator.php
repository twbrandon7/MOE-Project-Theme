<?php
require_once get_template_directory() . '/vendor/autoload.php';
use Jenssegers\Blade\Blade;

$blade = new Blade(get_template_directory().'/views', get_template_directory() .'/cache');

function display_gallery($ids, $titles=[], $common_title=null, $common_subtitle=null){
    global $blade;
    $title = null;
    if($common_title != null && $common_subtitle != null){
      $title = [
        "common_title"=> $common_title,
        "common_subtitle"=> $common_subtitle,
      ];
    }
    echo $blade->make('gallery', [
      'ids'=>$ids,
      'title'=>$title,
      'titles' => $titles,
	  ]);
}


function get_gallery_for_post($ids, $titles=[], $subtitles=[]){
  global $blade;
  $title = null;
  if($common_title != null && $common_subtitle != null){
    $title = [
      "common_title"=> $common_title,
      "common_subtitle"=> $common_subtitle,
    ];
  }
  return $blade->make('gallery_post', [
    'ids'=>$ids,
    'titles' => $titles,
    'subtitles' => $subtitles,
    'aligns' => ['center-align', 'left-align', 'right-align'],
  ]);
}

function get_gallery_from_category($show_title=true){
  global $blade;
  $arr = get_attached_media("image");

  $ids = [];
  $titles = [];
  $subtitles = [];

  foreach($arr as $key => $image){
    array_push($ids, $image->ID);
    array_push($titles, $image->post_title);
    array_push($subtitles, $image->post_excerpt);
  }

  return $blade->make('gallery_post', [
    'ids'=>$ids,
    'titles' => $titles,
    'subtitles' => $subtitles,
    'aligns' => ['center-align', 'left-align', 'right-align'],
    'show_title' => $show_title,
  ]);
}
?>