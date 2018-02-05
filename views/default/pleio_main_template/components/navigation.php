<navigation class="navigation">
    <div class="navigation__top">
        <div class="mobile-navigation__bar">
            <div class="mobile-navigation__hamburger" data-open-nav></div>
            <a class="navigation__logo" title="Terug naar de homepage" href="/">
                <?php echo elgg_view("pleio_main_template/components/logo", ["white_logo" => true]); ?>
            </a>
            <div class="mobile-navigation__spacer"></div>
        </div>
        <ul class="navigation__menu">
            <li class="navigation__item">
                <a class="navigation__link" href="/#about" data-nav-link><?php echo elgg_echo('pleio_main_template:principles'); ?></a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="/#examples" data-nav-link><?php echo elgg_echo('pleio_main_template:examples'); ?></a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="/#organization" data-nav-link><?php echo elgg_echo('pleio_main_template:organisation'); ?></a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="/#support" data-nav-link><?php echo elgg_echo('pleio_main_template:help'); ?></a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="/#request" data-nav-link><?php echo elgg_echo('pleio_main_template:request_a_subsite'); ?></a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="/jobs" data-nav-link><?php echo elgg_echo('pleio_main_template:jobs'); ?></a>
            </li>
        </ul>
    </div>
    <div class="navigation__bottom">
        <div class="navigation__account">
            <a href="/login">
                <div class="button ___stretch ___outline"><?php echo elgg_echo('login'); ?></div>
            </a>
            <a href="/register">
                <div class="button ___stretch ___white"><?php echo elgg_echo('register'); ?></div>
            </a>
        </div>

        <?php $current_lang = get_current_language(); ?>
        <div class="navigation__languages">
            <a class="navigation__language <?php echo ($current_lang === "nl") ? "___is-active" : ""; ?>" href="javascript:setLanguage('nl');">NL</a>
            &nbsp;/&nbsp;
            <a class="navigation__language  <?php echo ($current_lang === "en") ? "___is-active" : ""; ?>" href="javascript:setLanguage('en');">EN</a>
        </div>

		<script type="text/javascript">
			function setLanguage(lang_id){
				setCookie("client_language", lang_id, 30);
				location.reload();
			}
			function setCookie(c_name,value,expiredays){
				var exdate = new Date();
				exdate.setDate(exdate.getDate() + expiredays);
				document.cookie = c_name + "=" + escape(value) + ";Path=/" + ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString());
			}
		</script>
    </div>
</navigation>