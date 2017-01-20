<?php 

$user = elgg_get_logged_in_user_entity();
if($user){
	$current = $user->getPrivateSetting("pleio_main_template_sidebar_collapsed");
	$user->setPrivateSetting("pleio_main_template_sidebar_collapsed", !$current);
}