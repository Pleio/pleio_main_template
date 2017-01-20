<?php 

if(elgg_is_logged_in() && get_input("internal_dashboard") != "yes"){
	$user = elgg_get_logged_in_user_entity();
	if($user){
		if($user->getPrivateSetting("pleio_main_template_sidebar_collapsed")){
			$collapsed = "collapsed ";
		}
	}
	?>
	<div id='pleio-main-template-sidebar' class='<?php echo $collapsed;?>'>
		<?php 
		// insert site-wide navigation
		echo elgg_view_menu('pleio_main_template_sidebar', array("sort_by" => "register"));
		
		?>
		<?php /*
		<ul id="pleio-main-template-sidebar-top" class="elgg-menu elgg-menu-pleio-main-template-sidebar">
			<li class="elgg-menu-item-backtotop">
				<a href="#"><?php echo strtoupper(elgg_echo("pleio_main_template:menu:sidebar:top")); ?></a>
			</li>
		</ul>*/?>
	</div>
<?php 
}