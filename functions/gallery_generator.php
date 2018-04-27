<?php
require get_template_directory() . '/vendor/autoload.php';
use Jenssegers\Blade\Blade;

$blade = new Blade(get_template_directory().'/views', get_template_directory() .'/cache');

function display_gallery($ids){
    global $blade;
    echo $blade->make('gallery', [
		'ids'=>$ids
	]);
}
?>