<?php
/**
 * Elgg one-column layout
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content'] Content string
 * @uses $vars['class']   Additional class to apply to layout
 */

$class = 'elgg-layout elgg-layout-one-column clearfix';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}

if(elgg_in_context("dashboard")){
	$class .= " theme-pleio-dashboard";
}

// navigation defaults to breadcrumbs
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));

?>
<div class="<?php echo $class; ?>">
	<?php echo elgg_view("theme_pleio/sidebar/menu", $vars); ?>
	<?php echo $nav; ?>
	<div class="elgg-body elgg-main">
	<?php
		if (isset($vars['title'])) {
			echo '<div class="elgg-head clearfix">';
			echo elgg_view_title($vars['title']);
			echo '</div>';
		}

		echo $vars['content'];
		
		// @deprecated 1.8
		if (isset($vars['area1'])) {
			echo $vars['area1'];
		}
	?>
	</div>
</div>
<script type="text/javascript">
	var height = $("#theme-pleio-sidebar").parent().outerHeight();
	$("#theme-pleio-sidebar").css("height", height + "px");
</script>