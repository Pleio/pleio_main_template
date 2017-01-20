<?php

if (elgg_is_logged_in()) {
    forward();
}

$user_guid = get_input('u');
$code = get_input('c');

$user = get_entity($user_guid);

// don't check code here to avoid automated attacks
if (!$user instanceof ElggUser) {
    register_error(elgg_echo('user:passwordreset:unknown_user'));
    forward();
}

$title = elgg_echo("user:password:lost");
$messages = pleio_main_template_get_system_messages();

$content = elgg_view("pleio_main_template/resetpassword", ["messages" => $messages]);
echo elgg_view_page($title, $content, "new");