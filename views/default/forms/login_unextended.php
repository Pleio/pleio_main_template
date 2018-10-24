<?php
$returnto = $_GET["returnto"];
$returnto = str_replace("\"", "&quot;", $returnto);
$returnto = str_replace("<", "&lt;", $returnto);
$returnto = str_replace(">", "&gt;", $returnto);
?>
<div class="input-field">
    <input type="text" id="input-username" class="validate" required="" name="username" value="" placeholder="" autofocus>
    <label for="input-username"><?php echo elgg_echo('loginusername'); ?></label>
</div>
<div class="input-field">
    <input type="password" id="input-password" class="validate" required="" name="password" value="" placeholder="">
    <label for="input-password"><?php echo elgg_echo('password'); ?></label>
</div>
<div class="login__buttons">
    <div>
        <button name="login" class="button ___stretch ___active login__login" type="submit"><?php echo elgg_echo('login'); ?></button>
    </div>
    <div class="forgot-password">
        <a href="/register?returnto=<?php echo urlencode($returnto); ?>"><?php echo elgg_echo('register'); ?></a><br />
        <a href="/forgotpassword?returnto=<?php echo urlencode($returnto); ?>"><?php echo elgg_echo('user:password:lost'); ?></a>
    </div>
</div>
<input type="checkbox" name="persistent" class="filled-in" id="persistent" value="true" checked="checked">
<label for="persistent"><?php echo elgg_echo('user:persistent'); ?></label>
<input type="hidden" name="returnto" value="<?php echo $returnto; ?>">
