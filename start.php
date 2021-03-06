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

	elgg_register_plugin_hook_handler("index", "system", "pleio_main_template_index_handler");
	elgg_register_page_handler("about", "pleio_main_template_index_handler");
    elgg_register_page_handler("our-users", "pleio_main_template_index_handler");
    elgg_register_page_handler("help", "pleio_main_template_index_handler");
	elgg_register_page_handler("graphql", "pleio_main_template_graphql");

	elgg_register_page_handler("login", "pleio_main_template_login_handler");
	elgg_register_page_handler("register", "pleio_main_template_register_handler");
	elgg_register_page_handler("forgotpassword", "pleio_main_template_forgotpassword_handler");
	elgg_register_page_handler("resetpassword", "pleio_main_template_resetpassword_handler");

	elgg_register_page_handler("jobs", "pleio_main_template_jobs_handler");

    elgg_unregister_plugin_hook_handler("email", "system", "html_email_handler_email_hook");
    elgg_register_plugin_hook_handler("email", "system", "pleio_main_template_email_handler");

	elgg_unregister_action("login");
	elgg_register_action("login", dirname(__FILE__) . "/actions/login.php", "public");

	elgg_unregister_action("logout");
	elgg_register_action("logout", dirname(__FILE__) . "/actions/logout.php", "public");

	elgg_unregister_action("register");
	elgg_register_action("register", dirname(__FILE__) . "/actions/register.php", "public");

	elgg_unregister_action("user/requestnewpassword");
	elgg_register_action("user/requestnewpassword", dirname(__FILE__) . "/actions/user/requestnewpassword.php", "public");

	elgg_unregister_action("user/passwordreset");
	elgg_register_action("user/passwordreset", dirname(__FILE__) . "/actions/user/passwordreset.php", "public");

	elgg_register_action("request_info", dirname(__FILE__) . "/actions/request_info.php", "public");

    if (!isset($_COOKIE['CSRF_TOKEN'])) {
        $token = md5(openssl_random_pseudo_bytes(32));
        $domain = ini_get("session.cookie_domain");
        setcookie("CSRF_TOKEN", $token, 0, "/", $domain);
    }
}

function pleio_main_template_index_handler($page) {
	include("pages/index.php");
	return true;
}

function pleio_main_template_register_handler($page) {
	switch ($page[0]) {
		case "complete":
			include("pages/register_complete.php");
			return true;
		default:
			include("pages/register.php");
			return true;
	}
}

function pleio_main_template_login_handler($page) {
	include("pages/login.php");
	return true;
}

function pleio_main_template_forgotpassword_handler($page) {
	switch ($page[0]) {
		case "complete":
			include("pages/forgotpassword_complete.php");
			return true;
		default:
			include("pages/forgotpassword.php");
			return true;		
	}
}

function pleio_main_template_resetpassword_handler($page) {
	switch ($page[0]) {
		case "complete":
			include("pages/resetpassword_complete.php");
			return true;
		default:
			include("pages/resetpassword.php");
			return true;		
	}
}

function pleio_main_template_jobs_handler($page) {
	include("pages/jobs.php");
	return true;
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
		$menu[] = new ElggMenuItem("subsites", elgg_echo("subsite_manager:menu:subsites"), "sites/");
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

function pleio_main_template_get_system_messages() {
	$messages = null;
	if (count_messages()) {
		// get messages - try for errors first
		$messages = system_messages(NULL, "error");
		if (count($messages["error"]) == 0) {
			// no errors so grab rest of messages
			$messages = system_messages(null, "");
		} else {
			// we have errors - clear out remaining messages
			system_messages(null, "");
		}
	}

	return $messages;
}

function pleio_main_template_is_valid_returnto($url) {
    $site_url = parse_url(elgg_get_site_url());
    $returnto_url = parse_url($url);

    if (!$site_url || !$returnto_url) {
        return false;
    }
    if ($site_url["scheme"] !== $returnto_url["scheme"]) {
        return false;
    }

    if ($site_url["host"] !== $returnto_url["host"]) {
        return false;
    }

    return true;
}

function pleio_main_template_email_handler($hook, $type, $return, $params) {
    global $CONFIG;
    $site = elgg_get_site_entity();

    $message_id = sprintf("<%s.%s@%s>", base_convert(microtime(), 10, 36), base_convert(bin2hex(openssl_random_pseudo_bytes(8)), 16, 36), $_SERVER["SERVER_NAME"]);

    $reply_to = "=?UTF-8?B?" . base64_encode($site->name) . "?= ";

    if ($site->email) {
        $reply_to .= "<" . $site->email . ">";
    } elseif (isset($CONFIG->email_from)) {
        $reply_to .= "<{$CONFIG->email_from[1]}>";
    } else {
        $reply_to .= "<noreply@" . get_site_domain($site->guid) . ">";
    }

    $headers = "Sender: {$params["from"]}\r\n"
        . "From: {$params["from"]}\r\n"
        . "Reply-To: {$reply_to}\r\n"
        . "Message-Id: {$message_id}\r\n"
        . "MIME-Version: 1.0\r\n"
        . "Content-Type: text/html; charset=UTF-8\r\n";

    // Sanitise subject by stripping line endings
    $subject = preg_replace("/(\r\n|\r|\n)/", " ", $params["subject"]);

    $body = $params["body"];
    $body = nl2br($body);

    $email_params = [
        "subject" => $subject,
        "body" => $body
    ];

    if (!is_array($params["params"])) {
        $params["params"] = [];
    }

	if (!isset($CONFIG->block_mail)) {
        return mail(
            $params["to"],
            $subject,
            elgg_view("emails/default", array_merge($email_params, $params["params"])),
            $headers
        );
	} else {
		return true;
	}
}

elgg_register_event_handler("init", "system", "pleio_main_template_init");
elgg_register_event_handler("pagesetup", "system", "pleio_main_template_pagesetup");

elgg_register_action("pleio_main_template/toggle_sidebar", dirname(__FILE__) . "/actions/toggle_sidebar.php");
elgg_register_action("pleio_main_template/add_personal_menu_item", dirname(__FILE__) . "/actions/add_personal_menu_item.php");
elgg_register_action("pleio_main_template/remove_personal_menu_item", dirname(__FILE__) . "/actions/remove_personal_menu_item.php");