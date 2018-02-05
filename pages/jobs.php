<?php
$site = elgg_get_site_entity();
elgg_set_page_owner_guid($site->guid);

$content = elgg_view("pleio_main_template/jobs");
echo elgg_view_page(elgg_echo("pleio_main_template:jobs"), $content, "new");
