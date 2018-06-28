<?php
/**
 * Elgg login action
 *
 * @package Elgg.Core
 * @subpackage User.Authentication
 */

// set forward url
$returnto = urldecode(get_input("returnto"));
if ($returnto && pleio_main_template_is_valid_returnto($returnto)) {
    $forward_url = $returnto;
} elseif (!empty($_SESSION['last_forward_from'])) {
    $forward_url = $_SESSION['last_forward_from'];
} elseif (get_input('returntoreferer')) {
    $forward_url = REFERER;
} else {
    // forward to main index page
    $forward_url = '/dashboard';
}

$username = get_input('username');
$password = get_input('password', null, false);
$persistent = (bool) get_input("persistent");
$result = false;

if (empty($username) || empty($password)) {
    register_error(elgg_echo('login:empty'));
    forward();
}

// check if logging in with email address
if (strpos($username, '@') !== false && ($users = get_user_by_email($username))) {
    $username = $users[0]->username;
}

$result = elgg_authenticate($username, $password);
if ($result !== true) {
    register_error($result);
    forward(REFERER);
}

$user = get_user_by_username($username);
if (!$user) {
    register_error(elgg_echo('login:baduser'));
    forward(REFERER);
}

try {
    login($user, $persistent);
    // re-register at least the core language file for users with language other than site default
    register_translations(dirname(dirname(__FILE__)) . "/languages/");
} catch (LoginException $e) {
    register_error($e->getMessage());
    forward(REFERER);
}

// elgg_echo() caches the language and does not provide a way to change the language.
// @todo we need to use the config object to store this so that the current language
// can be changed. Refs #4171
if ($user->language) {
    $message = elgg_echo('loginok', array(), $user->language);
} else {
    $message = elgg_echo('loginok');
}

if (isset($_SESSION['last_forward_from'])) {
    unset($_SESSION['last_forward_from']);
}

system_message($message);

if (!$forward_url) {
    $forward_url = '/';
}
if ($forward_url === REFERER) {
    $forward_url = $_SERVER['HTTP_REFERER'];
}

$forward_url = elgg_normalize_url($forward_url);

header("Location: $forward_url");
exit();