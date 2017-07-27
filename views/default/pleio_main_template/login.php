<div class="account-overlay ___is-visible">
    <div class="account">
        <div class="account__top-bar">
            <div class="row">
                <div class="col-xs-6">
                    <a class="navigation__logo" title="Terug naar de homepage" href="/">
                        <?php echo elgg_view("pleio_main_template/components/logo"); ?>
                    </a>
                </div>
                <div class="col-xs-6 end-xs">
                    <a href="/">
                        <div class="account__close" data-close-overlay="data-close-overlay"></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="account__slider">
            <div class="account__content-container">
                <div class="account__content">
                    <?php echo elgg_view("pleio_main_template/messages", ["messages" => $vars["messages"]]); ?>
                    <?php echo elgg_view_form("login_unextended", ["class" => "login", "action" => "action/login"]); ?>
                </div>
            </div>
        </div>
    </div>
</div>