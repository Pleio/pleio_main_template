<?php 
?>
<div class="pleio-main-template-header-logged-out-spacer"></div>
<?php
	echo elgg_view('page/elements/header_logo');
	echo elgg_view('language_selector/default');
?>
<div class="pleio-main-template-header-account">
	<?php echo elgg_view('output/url', array("href" => "register", "text" => elgg_echo("register"), "class" => "pleio-main-template-header-register")); ?>
	<?php echo elgg_view('core/account/login_dropdown'); ?>
</div>

<div class="pleio-main-template-header-logged-out"></div>
<?php 
/*
if(elgg_in_context("main")){
	?>
	<div class="pleio-main-template-header-subtitle">
		<?php echo elgg_echo("H&eacute;t samenwerkingsplatform voor de publieke zaak");?>
	</div>
	<div class="pleio-main-template-header-subtitle-actions clearfix">
		
		<a href='/register' class="odd">
			<?php echo elgg_echo("1. Maak een account aan op Pleio");?>
		</a>
		<a href="#" class="even">
			<?php echo elgg_echo("2. Ga aan de slag met Pleio");?>
		</a>
		<div></div>
	</div>
	<?php 
}
*/