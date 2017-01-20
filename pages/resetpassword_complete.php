<?php

if (elgg_is_logged_in()) {
    forward();
}

$title = elgg_echo("user:password:lost");
$messages = pleio_main_template_get_system_messages();

$content = elgg_view("pleio_main_template/resetpassword_complete", ["messages" => $messages]);
echo elgg_view_page($title, $content, "new");