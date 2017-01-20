<?php

require_once(dirname(__FILE__) . "/../../vendor/autoload.php");
spl_autoload_register("pleio_autoloader");
function pleio_autoloader($class) {
    $filename = "classes/" . str_replace("\\", "/", $class) . ".php";
    if (file_exists(dirname(__FILE__) . "/" . $filename)) {
        include($filename);
    }
}

define("THEME_COLOR_1", "383838"); // antraciet
define("THEME_COLOR_2", "008BCD"); // blue
define("THEME_COLOR_3", "BDBDBD"); // border grey
define("THEME_COLOR_4", "77C0E2"); // light blue (top border selected menu items)
define("THEME_COLOR_5", "BABABA"); // just another grey

define("THEME_GRAPHICS_FOLDER", elgg_get_site_url() . "mod/pleio_main_template/_graphics/");
define("MULTI_DASHBOARD_MAX_TABS", 10); // overrule default of 7

function pleio_main_template_init(){
	elgg_extend_view("css/elgg", "pleio_main_template/css/site");
	elgg_extend_view("css/ie7", "pleio_main_template/css/ie7");
	elgg_extend_view("js/elgg", "pleio_main_template/js/site");
	
	elgg_register_plugin_hook_handler("register", "menu:pleio_main_template_sidebar", "pleio_main_template_sidebar_menu_setup");
	elgg_register_plugin_hook_handler("prepare", "menu:pleio_main_template_sidebar", "pleio_main_template_sidebar_menu_prepare");
	
	elgg_register_widget_type("index_pleio", "Pleio", "Pleio Index Widget", "index", false);

	elgg_register_plugin_hook_handler("index", "system", "pleio_main_template_page_handler");
	elgg_register_page_handler("login", "pleio_main_template_page_handler");
	elgg_register_page_handler("register", "pleio_main_template_page_handler");
	elgg_register_page_handler("about", "pleio_main_template_page_handler");
    elgg_register_page_handler("our-users", "pleio_main_template_page_handler");
    elgg_register_page_handler("help", "pleio_main_template_page_handler");
	elgg_register_page_handler("graphql", "pleio_main_template_graphql");

    if (!isset($_COOKIE['CSRF_TOKEN'])) {
        $token = md5(openssl_random_pseudo_bytes(32));
        $domain = ini_get("session.cookie_domain");
        setcookie("CSRF_TOKEN", $token, 0, "/", $domain);
    }
}

function pleio_main_template_page_handler() {
	if (!elgg_is_logged_in()) {
		include("pages/index.php");
		return true;
	} else {
		forward("dashboard");
	}
}

function pleio_main_template_graphql() {
	include("pages/graphql.php");
	return true;
}

function pleio_main_template_sidebar_menu_setup($hook, $type, $return, $params){
	global $CONFIG;
	if($user = elgg_get_logged_in_user_entity()){
		$site_menu = $CONFIG->menus["site"];
		
		$menu = array();
		
		$menu[] = new ElggMenuItem("toggle_sidebar",elgg_echo("pleio_main_template:menu:sidebar:toggle"),"");
		$menu[] = new ElggMenuItem("dashboard", elgg_echo("dashboard"), "dashboard");
		$menu[] = new ElggMenuItem("groups", elgg_echo("groups"), "groups/all");
		$menu[] = new ElggMenuItem("subsites", elgg_echo("subsite_manager:menu:subsites"), "subsites");
// 		$menu[] = new ElggMenuItem("subsites-request", elgg_echo("subsite_manager:menu:subsites:request"), "deelsite-aanvragen");
		$menu[] = new ElggMenuItem("members", elgg_echo("members"), "members");
		
		$menu[] = ElggMenuItem::factory(array(
			"name" => "empty_1",
			"item_class" => "place_holder",
			"text" => "",
			"href" => false
		));
		
		$tools = new ElggMenuItem("tools", elgg_echo("pleio_main_template:menu:tools"), "#");
		
		foreach($site_menu as $default_menu_item){
			if(!in_array($default_menu_item->getName(), array("dashboard","groups","subsites","members"))){
				$tools->addChild($default_menu_item);
			}
		}
		
		$tools->sortChildren(array("ElggMenuBuilder", "compareByText"));
		$menu[] = $tools;
		
		$menu[] = new ElggMenuItem("add", elgg_echo("add"), "add");
		$menu[] = ElggMenuItem::factory(array(
				"name" => "share",
				"text" => elgg_echo("pleio_main_template:menu:share"),
				"href" => "https://bestandendelen.pleio.nl/simplesamlphp/module.php/core/as_login.php?AuthId=pleio-sp&ReturnTo=https://bestandendelen.pleio.nl/filesender/index.php?s=upload",
				"target" => "_blank"
			));
		
		$menu[] = ElggMenuItem::factory(array(
				"name" => "learn",
				"text" => elgg_echo("pleio_main_template:menu:learn"),
				"href" => "https://leren.pleio.nl/simplesaml/module.php/core/as_login.php?AuthId=pleio-sp&ReturnTo=https://leren.pleio.nl/auth/saml/index.php",
				"target" => "_blank"
			));
		
		$mine = new ElggMenuItem("mine", elgg_echo("pleio_main_template:personal_menu:title"), "#");
		
		$personal_menu_items = elgg_get_entities(array("type" => "object", "subtype" => "personal_menu_item", "owner_guid" => elgg_get_logged_in_user_guid(), "limit" => false));
		if(!empty($personal_menu_items)){
			foreach($personal_menu_items as $personal_menu_item){
				$mine->addChild(new ElggMenuItem("personal_" . $personal_menu_item->getGUID(), $personal_menu_item->title . elgg_view_icon("delete-alt"), $personal_menu_item->description));
			}
			$mine->addChild( ElggMenuItem::factory(array(
				"name" => "empty",
				"item_class" => "place_holder",
				"text" => "",
				"href" => false
				)));
		}
		$mine->addChild(new ElggMenuItem("personal_menu_add", elgg_echo("pleio_main_template:personal_menu:add"), elgg_add_action_tokens_to_url(elgg_get_site_url() . "action/pleio_main_template/add_personal_menu_item?url=" . urlencode(current_page_url()))));
		
		$menu[] = $mine;
		
		$menu[] = ElggMenuItem::factory(array(
			"name" => "empty_2",
			"item_class" => "place_holder",
			"text" => "",
			"href" => false
		));;
		
		$menu[] = new ElggMenuItem("settings", elgg_echo("settings"), "settings/user/" . $user->username);
		$menu[] = ElggMenuItem::factory(array(
							"name" => "help",
							"link_class" => "elgg-lightbox",
							"text" => elgg_echo("help"),
							"href" => "/user_support/help_center"
		));
		
		$href = "javascript:elgg.forward('reportedcontent/add')";
		$href .= "+'?address='+encodeURIComponent(location.href)";
		$href .= "+'&title='+encodeURIComponent(document.title));";
		
		$menu[] = ElggMenuItem::factory(array(
					"name" => "report_this",
					"href" => $href,
					"title" => elgg_echo("reportedcontent:this:tooltip"),
					"text" => elgg_echo("reportedcontent:this")
		));
		
		$menu[] = ElggMenuItem::factory(array(
			"name" => "colofon",
			"text" => elgg_echo("pleio_main_template:menu:colofon"),
			"href" => "colofon"
		));
		
		if(elgg_is_admin_logged_in()){
			$menu[] = ElggMenuItem::factory(array(
					"name" => "empty_3",
					"item_class" => "place_holder",
					"text" => "",
					"href" => false
			));
			
			$menu[] = ElggMenuItem::factory(array(
				"name" => "admin",
				"text" => elgg_echo("admin"),
				"href" => "admin",
				"target" => "_blank"
			));
		}
		
		return $menu;
	}
}

function pleio_main_template_pagesetup(){
	$item = new ElggMenuItem("discussion", elgg_echo("discussion"), "discussion/all");
	elgg_register_menu_item("site", $item);
	
	elgg_unregister_menu_item("footer", "report_this");
}

elgg_register_event_handler("init", "system", "pleio_main_template_init");
elgg_register_event_handler("pagesetup", "system", "pleio_main_template_pagesetup");

elgg_register_action("pleio_main_template/toggle_sidebar", dirname(__FILE__) . "/actions/toggle_sidebar.php");
elgg_register_action("pleio_main_template/add_personal_menu_item", dirname(__FILE__) . "/actions/add_personal_menu_item.php");
elgg_register_action("pleio_main_template/remove_personal_menu_item", dirname(__FILE__) . "/actions/remove_personal_menu_item.php");