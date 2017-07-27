<div class="input-field">
    <input class="validate" id="username" type="text" name="username" autofocus></input>
    <label for="username"><?php echo elgg_echo("loginusername"); ?></label>
</div>

<div class="register__captcha">
    <?php echo elgg_view('input/captcha', $vars); ?>
</div>

<div class="register__button">
    <button class="button ___stretch ___active" type="submit"><?php echo elgg_echo("request"); ?></button>
</div>
