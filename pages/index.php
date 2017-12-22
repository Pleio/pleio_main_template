<?php
$site = elgg_get_site_entity();
elgg_set_page_owner_guid($site->guid);

$content = elgg_view("pleio_main_template/index");
echo elgg_view_page("", $content, "new");
