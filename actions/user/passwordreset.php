<?php
/**
 * Action to reset a password and send success email.
 *
 * @package Elgg
 * @subpackage Core
 */

$user_guid = get_input('u');
$code = get_input('c');

$password = get_input('password');
$password2 = get_input('password2');

$user = get_entity($user_guid);
if (!$user instanceof ElggUser) {
    register_error(elgg_echo('user:password:fail'));
    forward(REFERER);
}

if ($password !== $password2) {
    register_error(elgg_echo('RegistrationException:PasswordMismatch'));
    forward(REFERER);
}

try {
    validate_password($password);
} catch (RegistrationException $msg) {
    register_error($msg);
    forward(REFERER);
}

$saved_code = $user->getPrivateSetting('passwd_conf_code');
if (!$saved_code || $saved_code !== $code) {
    register_error(elgg_echo('user:password:fail'));
    forward(REFERER);
}

if (force_user_password_reset($user_guid, $password)) {
    remove_private_setting($user_guid, 'passwd_conf_code');

    reset_login_failure_count($user_guid);
    notify_user($user->guid, $CONFIG->site->guid, elgg_echo('pleio_main_template:passwordreset:subject'), elgg_echo('pleio_main_template:passwordreset:email', [$user->name]), array(), 'email');

    forward('/resetpassword/complete');
} else {
    register_error(elgg_echo('user:password:fail'));
    forward(REFERER);   
}