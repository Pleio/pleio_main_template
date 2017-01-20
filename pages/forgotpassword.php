<?php

if (elgg_is_logged_in()) {
    forward("/dashboard");
}

$title = elgg_echo("user:password:lost");
$messages = pleio_main_template_get_system_messages();

$content = elgg_view("pleio_main_template/forgotpassword", ["messages" => $messages]);
echo elgg_view_page($title, $content, "new");