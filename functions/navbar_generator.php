<?php

require get_template_directory() . '/vendor/autoload.php';
use eftec\bladeone\BladeOne;
define("BLADEONE_MODE",2);

$blade = new BladeOne(get_template_directory().'/views', get_template_directory() .'/cache');

function displayNavBar(){
	global $blade;
	$menu_items = getWPMenu();
	$links = [];
	if($menu_items){
		foreach ( $menu_items as $key=>$menu ){
			$parent_id = $menu->menu_item_parent;
			if($parent_id == 0){
				$link = new stdClass();
				$link->id = $menu->ID;
				$link->url = $menu->url;
				$link->title = $menu->title;
				array_push($links, $link);
			}
		}
	}
	echo $blade->run('nav_bar', [
		'links'=>$links
	]);
}

function displaySideBar(){
	global $blade;
	$menu_items = getWPMenu();
	$links_map = [];
	if($menu_items){
		foreach ( $menu_items as $key=>$menu ){
			$parent_id = $menu->menu_item_parent;
			if($parent_id != 0){
				$link = new stdClass();
				$link->id = $menu->ID;
				$link->url = $menu->url;
				$link->title = $menu->title;
				if( isset( $links_map["id_".$parent_id] ) ){
					array_push($links_map["id_".$parent_id], $link);
				}else{
					$links_map["id_".$parent_id] = [$link];
				}
			}
		}
	}
	foreach($links_map as $key => $value){
		echo $blade->run('side_bar', [
			'links'=>$value, 
			'id'=>str_replace("id_", "", $key),
		]);
		echo "\n";
	}
}

function getNavItem(DOMDocument $dom, $id, $link, $text){
    $li = $dom->createElement('li');
    $li->setAttribute('class', "nav-item");
	$li->setAttribute('id', "li_".$id);
	$li->setAttribute('style', "position: relative;");
	$li->setIdAttribute('id', true);

    $a = $dom->createElement('a', htmlspecialchars($text));
    $a->setAttribute('class', "nav-link");
    $a->setAttribute('href', $link);
    
    $li->appendChild($a);
    return $li;
}

function getDropdownItem(DOMDocument $dom, $id){
    $ul = $dom->createElement('ul');
    $ul->setAttribute('class', "dropdown-menu");
    $ul->setAttribute('id', "ul_".$id);
    $ul->setIdAttribute('id', true);
    return $ul;
}

function getWPMenu(){
	$menus = wp_get_nav_menus();
	foreach ( $menus as $menu_maybe ) {
		if ( $menu_items = wp_get_nav_menu_items( $menu_maybe->term_id, array( 'update_post_term_cache' => false ) ) ) {
			$menu = $menu_maybe;
			break;
		}
	}
	
	if ( $menu && ! is_wp_error($menu) && !isset($menu_items) ){
		$menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'update_post_term_cache' => false ) );
	}

	return $menu_items;
}

function custom_nav(){
	$menu_items = getWPMenu();
	//print_r($menu_items);

	$dom = new DOMDocument('1.0', "utf-8");

	$master_div = $dom->createElement('div');
	$master_div->setAttribute("class", "collapse navbar-collapse");
	$master_div->setAttribute("id", "navbarResponsive");

	$master_ul = $dom->createElement('ul');
	$master_ul->setAttribute("class", "navbar-nav ml-auto");
	
	$master_div->appendChild($master_ul);

	$dom->appendChild($master_div);

	if($menu_items){
		foreach ( $menu_items as $key=>$menu ){
			$parent_id = $menu->menu_item_parent;
			if($parent_id == 0){
				$master_ul->appendChild(getNavItem($dom, $menu->ID, $menu->url, $menu->title));
			}else{
				$parent_li = $dom->getElementById("li_".$parent_id);
				if($parent_li != null){
					$parent_ul = $parent_li->getElementsByTagName("ul")[0];
					if($parent_ul == null){
						$parent_ul = getDropdownItem($dom, $parent_id);
						$parent_li->appendChild($parent_ul);
						$link = $parent_li->getElementsByTagName("a")[0];
	
						$caret_right = $dom->createElement("i");
						$caret_right->setAttribute("class", "fa fa-caret-right");
						$caret_right->setAttribute("style", "margin-left:5px;");
						$caret_right->setAttribute("aria-hidden", "true");
	
						$link->appendChild($caret_right);
					}
					$parent_ul->appendChild(getNavItem($dom, $menu->ID, $menu->url, $menu->title));
				}
			}
		}
	}
	

	echo $dom->saveHTML();
}
?>