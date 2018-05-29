<?php
/**
 * Elgg logout action
 *
 * @package Elgg
 * @subpackage Core
 */

// Log out
$result = logout();

// Set the system_message as appropriate
if ($result) {
    system_message(elgg_echo('logoutok'));


    if (isset($_SERVER['HTTP_REFERER'])) {
        $site_url = parse_url(elgg_get_site_url());
        $referer_url = parse_url($_SERVER['HTTP_REFERER']);

        if ($site_url && $referer_url && $referer_url['host'] !== $site_url['host']) {
            forward($_SERVER['HTTP_REFERER']);
        }
    }
}

forward();