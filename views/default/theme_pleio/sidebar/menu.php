<?php 

if(elgg_is_logged_in() && get_input("internal_dashboard") != "yes"){
	$user = elgg_get_logged_in_user_entity();
	if($user){
		if($user->getPrivateSetting("theme_pleio_sidebar_collapsed")){
			$collapsed = "collapsed ";
		}
	}
	?>
	<div id='theme-pleio-sidebar' class='<?php echo $collapsed;?>'>
		<?php 
		// insert site-wide navigation
		echo elgg_view_menu('theme_pleio_sidebar', array("sort_by" => "register"));
		
		?>
		<?php /*
		<ul id="theme-pleio-sidebar-top" class="elgg-menu elgg-menu-theme-pleio-sidebar">
			<li class="elgg-menu-item-backtotop">
				<a href="#"><?php echo strtoupper(elgg_echo("theme_pleio:menu:sidebar:top")); ?></a>
			</li>
		</ul>*/?>
	</div>
<?php 
}