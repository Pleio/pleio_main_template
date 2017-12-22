<div class="page-layout">
    <?php echo elgg_view("pleio_main_template/components/navigation"); ?>
    <main class="main">
        <article class="article">
            <div class="article__header">
                <div class="row">
                    <div class="col-lg-6">
                        <h1><?php echo elgg_echo("pleio_main_template:collaborating"); ?></h1>
                    </div>
                    <div class="col-lg-6 center-xs">
                        <img src="/mod/pleio_main_template/assets/images/publiek-large.svg">
                    </div>
                </div>
            </div>
            <div class="article__body">
                <section class="section">
                    <div class="container">
                        <p class="article__intro">
                            <a id="about"></a>
                            <?php echo elgg_echo("pleio_main_template:intro"); ?>
                        </p>
                    </div>
                </section>

                <div class="divider"></div>

                <section class="section">
                    <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3><?php echo elgg_echo('pleio_main_template:open_source'); ?></h3>
                            <p class="article__paragraph"><?php echo elgg_echo('pleio_main_template:open_source:desc'); ?></p>
                        </div>
                        <div class="col-sm-4">
                            <h3><?php echo elgg_echo('pleio_main_template:development'); ?></h3>
                            <p class="article__paragraph"><?php echo elgg_echo('pleio_main_template:development:desc'); ?></p>
                        </div>
                        <div class="col-sm-4">
                            <h3><?php echo elgg_echo('pleio_main_template:accessible'); ?></h3>
                            <p class="article__paragraph"><?php echo elgg_echo('pleio_main_template:accessible:desc'); ?></p>
                        </div>
                    </div>
                </section>

                <div class="divider"></div>

                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 middle-sm">
                                <img class="article__image ___padding" src="/mod/pleio_main_template/assets/images/lamp.svg">
                            </div>
                            <div class="col-sm-8">
                                <h2><?php echo elgg_echo('pleio_main_template:across_borders'); ?></h2>
                                <p><?php echo elgg_echo('pleio_main_template:across_borders:desc'); ?></p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="divider"></div>

                <a id="examples"></a>
                <section class="section">
                    <div class="row">
                        <div class="col-sm-6 col-lg-5 col-lg-offset-1 middle-sm">
                            <div class="container">
                                <h2><?php echo elgg_echo('pleio_main_template:examples_subsites'); ?></h2>
                                <p><?php echo elgg_echo('pleio_main_template:examples_subsites:desc'); ?></p>
                            </div>
                        </div>
                        <div class="col-sm-6"><img src="/mod/pleio_main_template/assets/images/campagne-relevant.png" class="article__image ___right ___shadow ___margin-top-bottom"></div>
                    </div>
                </section>

                <div class="divider"></div>

                <a id="organization"></a>
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 middle-sm">
                                <img class="article__image ___padding" src="/mod/pleio_main_template/assets/images/hergebruik.svg">
                            </div>
                            <div class="col-sm-7">
                                <h2><?php echo elgg_echo('pleio_main_template:organisation_pleio'); ?></h2>
                                <?php echo elgg_echo('pleio_main_template:organisation_pleio:desc'); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="divider"></div>

                <a id="support"></a>
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-7">
                                <h2><?php echo elgg_echo('pleio_main_template:help_support'); ?></h2>
                                <?php echo elgg_echo('pleio_main_template:help_support:desc'); ?>
                            </div>
                            <div class="col-sm-5 middle-sm">
                                <img class="article__image ___padding" src="/mod/pleio_main_template/assets/images/gebruiker.svg">
                            </div>
                        </div>
                    </div>
                </section>

                <div class="divider"></div>

                <a id="request"></a>
                <section class="section">
                    <div class="container">
                        <div class="article__request">
                            <h2><?php echo elgg_echo('pleio_main_template:request_subsite'); ?></h2>
                            <?php echo elgg_echo('pleio_main_template:request_subsite:desc'); ?>
                        </div>
                    </div>
                </section>

                <section class="section">
                <div class="article__header">
                    <div class="article__form ___center">
                        <p><?php echo elgg_echo('pleio_main_template:more_info'); ?></p>
                        <form method="POST" action="/action/request_info">
                            <?php echo elgg_view("input/securitytoken"); ?>
                            <div class="input-field">
                                <input type="text" id="name" name="name">
                                <label for="name"><?php echo elgg_echo('name'); ?></label>
                            </div>

                            <div class="input-field">
                                <input type="email" id="email" name="email">
                                <label for="email"><?php echo elgg_echo('email'); ?></label>
                            </div>

                            <p class="protection">Leave this empty: <input type="text" name="url" /></p>

                            <div class="login__buttons">
                                <button name="request" class="button" type="submit"><?php echo elgg_echo('pleio_main_template:request_more_info'); ?></button>
                            </div>

                            <p class="___smaller ___center"><?php echo elgg_echo('pleio_main_template:or_send_an_email'); ?>
                        </form>
                    </div>
                </div>
                </section>
            </div>
        </article>
    </main>
</div>