<?php 

$guid = get_input("guid");

if(!empty($guid)){
	$entity = get_entity($guid);
	if($entity && $entity->canEdit()){
		return $entity->delete();	
	} else {
		register_error(elgg_echo("InvalidParameterException:GUIDNotFound", array($guid)));
	}
} else {
	register_error(elgg_echo("pleio_main_template:personal_menu:missing_input"));
}