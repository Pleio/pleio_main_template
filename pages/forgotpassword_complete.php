<?php

if (elgg_is_logged_in()) {
    forward("/dashboard");
}

$title = elgg_echo("register");
$messages = pleio_main_template_get_system_messages();

$content = elgg_view("pleio_main_template/forgotpassword_complete", ["messages" => $messages]);
echo elgg_view_page($title, $content, "new");