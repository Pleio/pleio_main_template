<?php 

$user = elgg_get_logged_in_user_entity();
if($user){
	$current = $user->getPrivateSetting("theme_pleio_sidebar_collapsed");
	$user->setPrivateSetting("theme_pleio_sidebar_collapsed", !$current);
}