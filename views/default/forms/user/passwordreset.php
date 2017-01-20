<div class="input-field ___white">
    <input class="validate" id="password" type="password" name="password" pattern=".{6,}" autofocus></input>
    <label for="password"><?php echo elgg_echo("password"); ?></label>
</div>

<div class="input-field ___white">
    <input class="validate" id="password2" type="password" name="password2" pattern=".{6,}"></input>
    <label for="password2"><?php echo elgg_echo('passwordagain'); ?></label>
</div>

<div class="register__button">
    <button class="button ___stretch ___outline ___active" type="submit"><?php echo elgg_echo("pleio_main_template:change_password"); ?></button>
</div>

<?php echo elgg_view('input/hidden', array('name' => 'u', 'value' => get_input("u"))); ?>
<?php echo elgg_view('input/hidden', array('name' => 'c', 'value' => get_input("c"))); ?>