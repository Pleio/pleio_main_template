<?php
/**
 * Elgg page header
 * In the default theme, the header lives between the topbar and main content area.
 */

// link back to main site.
// echo elgg_view('page/elements/header_logo', $vars);

// drop-down login
if(!elgg_is_logged_in()){
 	echo elgg_view('page/elements/header_logged_out');
}
