<?php 

$user = elgg_get_logged_in_user_entity();
$title = get_input("title");
$url = get_input("url");

if($user && !empty($title) && !empty($url)){
	$menu_item = new ElggObject();
	$menu_item->subtype = "personal_menu_item";
	$menu_item->title = $title;
	$menu_item->description = $url;
	$menu_item->access_id = ACCESS_PRIVATE;
	
	
	$menu_item->save();
} else {
	register_error("theme_pleio:personal_menu:missing_input");
}