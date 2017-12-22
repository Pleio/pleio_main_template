<navigation class="navigation">
    <div class="navigation__top">
        <div class="mobile-navigation__bar">
            <div class="mobile-navigation__hamburger"></div>
            <a class="navigation__logo" title="Terug naar de homepage" href="/">
                <?php echo elgg_view("pleio_main_template/components/logo", ["white_logo" => true]); ?>
            </a>
            <div class="mobile-navigation__spacer"></div>
        </div>
        <ul class="navigation__menu">
            <li class="navigation__item">
                <a class="navigation__link" href="#about">Uitgangspunten</a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="#examples">Voorbeelden</a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="#organization">Organisatie</a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="#about">Help</a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="#request">Deelsite aanvragen</a>
            </li>
        </ul>
    </div>
    <div class="navigation__bottom">
        <div class="navigation__account">
            <a href="/login">
                <div class="button ___stretch ___outline">Inloggen</div>
            </a>
            <a href="/register">
                <div class="button ___stretch ___white">Registreren</div>
            </a>
        </div>
        <div class="navigation__languages">
            <a class="navigation__language ___is-active" href="#">NL</a>
            <!-- react-text: 38 -->&nbsp;/&nbsp;
            <!-- /react-text -->
            <a class="navigation__language " href="#">EN</a>
        </div>
    </div>
</navigation>