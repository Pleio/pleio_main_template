<?php
/**
 * Page Layout
 *
 * Contains CSS for the page shell and page layout
 *
 * Default layout: 990px wide, centered. Used in default page shell
 *
 * @package Elgg.Core
 * @subpackage UI
 */

?>

/* ***************************************
	PAGE LAYOUT
*************************************** */
/***** DEFAULT LAYOUT ******/
<?php // the width is on the page rather than topbar to handle small viewports ?>
.elgg-page-default {
	min-width: 998px;
}
.elgg-page-default .elgg-page-header > .elgg-inner {
	min-width: 990px;
	max-width: 80%;
	margin: 0 auto;
}
.elgg-page-default .elgg-page-body > .elgg-inner {
	min-width: 990px;
	max-width: 80%;
	margin: 0 auto;
	position: relative;
}
.elgg-page-default .elgg-page-footer > .elgg-inner {
	min-width: 990px;
	max-width: 80%;
	margin: 0px auto 0px;
	padding: 5px;
}

/***** TOPBAR ******/
.elgg-page-topbar {
	background: #333333 url(<?php echo elgg_get_site_url(); ?>_graphics/toptoolbar_background.gif) repeat-x top left;
	border-bottom: 1px solid #000000;
	position: relative;
	height: 24px;
	z-index: 9000;
}
.elgg-page-topbar > .elgg-inner {
	margin: 0 auto;
	position: relative;
	min-width: 990px;
	max-width: 80%;
}

/***** PAGE MESSAGES ******/
.elgg-page-messages {
	min-width:990px;
	max-width:80%;
	margin:0 auto;
	position: relative;
}

/***** PAGE HEADER ******/
.elgg-page-header {
	position: relative;
}
.elgg-page-header > .elgg-inner {
	position: relative;
}

/***** PAGE BODY LAYOUT ******/
.elgg-layout {
	min-height: 400px;
}
.elgg-layout-one-sidebar {
	/*background: transparent url(<?php echo elgg_get_site_url(); ?>_graphics/sidebar_background.gif) repeat-y right top;*/
}
.elgg-layout-two-sidebar {
	/*background: transparent url(<?php echo elgg_get_site_url(); ?>_graphics/two_sidebar_background.gif) repeat-y right top;*/
}
.elgg-sidebar {
	position: relative;
	margin: 10px 0 0 10px;
	float: right;
	width: 210px;
	background: white;
	
	border: 1px solid #<?php echo THEME_COLOR_3; ?>;
	
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	
	-webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
	box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
	
}
.elgg-sidebar-alt {
	position: relative;
	float: left;
	width: 160px;
	margin: 0 10px 0 0;
	background: #<?php echo THEME_COLOR_1; ?>;
}

.elgg-sidebar > .elgg-owner-block > .elgg-head {
	padding: 0 10px 10px;
}

.elgg-main {
	position: relative;
	min-height: 500px;
	padding: 10px;
	background: white;
	margin: 10px 0;
	
	border: 1px solid #<?php echo THEME_COLOR_3; ?>;
	
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	
	-webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
	box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
}
.elgg-main > .elgg-head {
	background: transparent url(<?php echo THEME_GRAPHICS_FOLDER; ?>header_gradient.png) repeat-x bottom;
	border-bottom: 1px solid #CCCCCC;
	margin: -10px -10px 10px -10px;
	padding: 4px 10px;
}

/***** PAGE FOOTER ******/
.elgg-page-footer {
	position: relative;
}
.elgg-page-footer {
	color: #999;
}
.elgg-page-footer a:hover {
	color: #666;
}