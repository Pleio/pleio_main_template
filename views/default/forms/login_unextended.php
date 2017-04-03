<?php
$returnto = urlencode(urldecode($_GET["returnto"]));
?>
<div class="input-field ___white">
    <input type="text" id="input-username" name="username" value="" placeholder="" autofocus>
    <label for="input-username"><?php echo elgg_echo('loginusername'); ?></label>
</div>
<div class="input-field ___white">
    <input type="password" id="input-password" name="password" value="" placeholder="">
    <label for="input-password"><?php echo elgg_echo('password'); ?></label>
</div>
<div class="login__buttons">
    <div>
        <button name="login" class="button ___stretch ___outline ___active login__login" type="submit">Inloggen</button>
    </div>
    <div class="forgot-password">
        <a href="/register?returnto=<?php echo $returnto; ?>"><?php echo elgg_echo('register'); ?></a><br />
        <a href="/forgotpassword?returnto=<?php echo $returnto; ?>"><?php echo elgg_echo('user:password:lost'); ?></a>
    </div>
</div>
<input type="checkbox" name="persistent" class="filled-in" id="persistent" value="true">
<label for="persistent"><?php echo elgg_echo('user:persistent'); ?></label>
<input type="hidden" name="returnto" value="<?php echo $returnto; ?>">
