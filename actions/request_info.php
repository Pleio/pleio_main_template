<?php

$name = get_input("name");
$email = get_input("email");

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

    $subject = "Nieuwe aanvraag voor meer informatie van Pleio.nl";
    $message = "
        Naam: {$name}
        E-mail: {$email}
    ";

    system_message(elgg_echo("pleio_main_template:sent"));
    elgg_send_email($from, "support@pleio.org", $subject, $message);
    forward("/#request");
} else {
    register_error(elgg_echo("pleio_main_template:fill_all_fields"));
    forward("/#request");
}