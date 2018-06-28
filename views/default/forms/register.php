<?php
$returnto = urlencode(urldecode($_GET["returnto"]));
?>

<?php
if (elgg_is_sticky_form('register')) {
    extract(elgg_get_sticky_values('register'));
    elgg_clear_sticky_form('register');
}
?>

<div class="input-field">
    <input class="validate" id="input-name" type="text" pattern=".{5,}" name="name" value="<?php echo $name; ?>" autofocus></input>
    <label for="input-name"><?php echo elgg_echo('name'); ?></label>
</div>
<div class="input-field">
    <input class="validate" id="input-email" type="email" name="email" value="<?php echo $email; ?>"></input>
    <label for="input-email"><?php echo elgg_echo('email'); ?></label>
</div>
<div class="input-field">
    <input class="validate" id="input-set-password" type="password" name="password" pattern=".{6,}" value="<?php echo $password; ?>"></input>
    <label for="input-set-password"><?php echo elgg_echo('password'); ?></label>
</div>
<div class="input-field">
    <input class="validate" id="input-password-verification" type="password" name="password2" pattern=".{6,}" value="<?php echo $password2; ?>"></input>
    <label for="input-password-verification"><?php echo elgg_echo('passwordagain'); ?></label>
</div>

<div class="register__captcha">
    <?php echo elgg_view('input/captcha', $vars); ?>
</div>

<div class="register__checks">
    <div class="register__check">
        <input type="checkbox" class="filled-in" id="checkbox-terms" name="terms" value="true"></input>
        <label for="checkbox-terms"><?php echo elgg_echo("pleio_main_template:i_agree_with"); ?> <a href="/terms" target="_blank"><?php echo elgg_echo("pleio_main_template:terms"); ?></a></label>
    </div>
</div>

<div class="register__button">
    <button class="button ___stretch ___active" type="submit"><?php echo elgg_echo('register'); ?></button>
</div>

<input type="hidden" name="returnto" value="<?php echo $returnto; ?>">