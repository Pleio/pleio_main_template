<?php

$url = get_input("url");
$name = get_input("name");
$email = get_input("email");
$information_type = get_input("information_type");

if ($information_type == "jobs") {
    $subject = "Interesse voor vacatures van Pleio.nl";
    $forward_url = "/jobs#request";
} else {
    $subject = "Nieuwe aanvraag voor meer informatie van Pleio.nl";
    $forward_url = "/#request";
}

if ($url) {
    register_error(elgg_echo("pleio_main_template:fill_all_fields"));
    forward($forward_url);
}

if ($name && $email) {
    // From
    $site = elgg_get_site_entity();
    // If there's an email address, use it - but only if its not from a user.
    if (!($from instanceof ElggUser) && $from->email) {
        $from = $from->email;
    } else if ($site && $site->email) {
        // Use email address of current site if we cannot use sender's email
        $from = $site->email;
    } else {
        // If all else fails, use the domain of the site.
        $from = 'noreply@' . get_site_domain($CONFIG->site_guid);
    }

    $message = "
        Naam: {$name}
        E-mail: {$email}
    ";

    system_message(elgg_echo("pleio_main_template:sent"));
    elgg_send_email($from, "support@pleio.nl", $subject, $message);

    forward($forward_url);
} else {
    register_error(elgg_echo("pleio_main_template:fill_all_fields"));
    forward($forward_url);
}