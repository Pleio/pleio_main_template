<?php ?>
#pleio-main-template-sidebar {
	position: relative;
	height: 100%;
	margin-right: 10px;
	float: left;
	border-left: 1px solid #000;
	border-right: 1px solid #000;
	background: #<?php echo THEME_COLOR_1; ?> url(<?php echo THEME_GRAPHICS_FOLDER; ?>sidebar_background.png) repeat-y right;
	z-index: 1;
	min-width: 128px;
}

#pleio-main-template-sidebar ul{
	border-bottom: 1px solid #585858;
}

#pleio-main-template-sidebar-top {
	bottom: 0;
	position: absolute;
	margin-bottom: 4px;
	width: 100%;
	display: none;
}

.elgg-menu-pleio-main-template-sidebar li {
	padding: 4px 0px;
	border-top: 1px solid #585858;
	border-bottom: 1px solid #252525;
}

.elgg-menu-pleio-main-template-sidebar li:hover,
.elgg-menu-pleio-main-template-sidebar li.elgg-state-selected {
	background: #<?php echo THEME_COLOR_2; ?> url(<?php echo THEME_GRAPHICS_FOLDER; ?>sidebar_background.png) repeat-y right;
	border-top: 1px solid #<?php echo THEME_COLOR_4; ?>;
}

.elgg-menu-pleio-main-template-sidebar .place_holder {
	height: 16px;
}

.elgg-menu-pleio-main-template-sidebar .place_holder:hover {
	background: #<?php echo THEME_COLOR_1; ?>;
	border-top: 1px solid #585858;
}

.elgg-menu-pleio-main-template-sidebar li a {
	padding: 0px 5px 0px 24px;
	color: white;
	font-weight: bold;
	font-size: 12px;
	height: 16px;
	overflow: hidden;
	white-space: nowrap;
}

.elgg-menu-pleio-main-template-sidebar li a:hover {
	text-decoration: none;
}

.elgg-menu-pleio-main-template-sidebar .elgg-child-menu {
	display: none;
}

.elgg-menu-pleio-main-template-sidebar > .elgg-menu-item-tools > ul,
.elgg-menu-pleio-main-template-sidebar > .elgg-menu-item-mine > ul {
	position: absolute;
	left: 100%;
	top: -1px;
	padding: -20px;
	background: #<?php echo THEME_COLOR_1; ?> url(<?php echo THEME_GRAPHICS_FOLDER; ?>sidebar_background.png) repeat-y right;
}

.elgg-menu-pleio-main-template-sidebar > .elgg-menu-item-tools:hover > ul,
.elgg-menu-pleio-main-template-sidebar > .elgg-menu-item-mine:hover > ul {
	display: inline-block;
}

#pleio-main-template-sidebar.collapsed {
	min-width: 23px;
	width: 23px;
}

#pleio-main-template-sidebar.collapsed > ul > li > a {
	padding: 0 0 0 24px;
}

.elgg-menu-item-mine .elgg-child-menu a {
	padding-right: 23px;
}

.elgg-menu-item-mine .elgg-menu-item-personal-menu-add a {
	padding-right: 5px;
}

/* Menu Icons */

.elgg-menu-item-mine .elgg-icon-delete-alt {
	position: absolute;
    right: 3px;
    display: none;
}

.elgg-menu-item-mine .elgg-child-menu li:hover .elgg-icon-delete-alt {
    display: inline-block;
}

.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-toggle-sidebar > a {
	color: #666;
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -0px;
}
.collapsed .elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-toggle-sidebar > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -18px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-subsites > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -540px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-mine > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -1260px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-tools > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -1098px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-help > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -324px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-add > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -882px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-personal-menu-add > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -882px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-share > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -1026px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-learn > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -378px;	
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-groups > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -1494px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-settings > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -972px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-admin > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -990px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-dashboard > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -414px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-members > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -1458px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-backtotop > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -1422px;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-report-this > a {
	background: url(<?php echo elgg_get_site_url(); ?>mod/reportedcontent/graphics/icon_reportthis.gif) no-repeat 4px top;
}
.elgg-menu-pleio-main-template-sidebar li.elgg-menu-item-colofon > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -486px;
}

/* End Menu Icons */

/* Dashboard Tabs */
.pleio-main-template-dashboard > .elgg-body{
	margin: 0;
	padding: 0;
	
	background: transparent;
	
	border: none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;
}

.pleio-main-template-dashboard > .elgg-body .elgg-widget-add-control {
	margin: 0px;
}

.pleio-main-template-dashboard > .elgg-body .elgg-widgets {
	margin-top: 10px;
}

.pleio-main-template-dashboard > .elgg-body #widget-manager-multi-dashboard-tabs {
	top: 0px;
	background: #383838;
}

.pleio-main-template-dashboard > .elgg-body #widgets-add-panel {
	padding: 2px 6px;
}

.pleio-main-template-dashboard > .elgg-body #widget-manager-multi-dashboard-tabs li {
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;
	
	border-width: 0 1px 0;
	margin-left: 0px;
}

.pleio-main-template-dashboard > #pleio-main-template-sidebar {
	margin-right: 0px;
}

.pleio-main-template-header-logged-out-spacer {
	height: 10px;
}

.pleio-main-template-header-logged-out {
	height: 10px;
	margin: 10px 0 0 0;
	background: #<?php echo THEME_COLOR_2;?>;
	
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	
	-webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
	box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
}

.pleio-main-template-header-account {
	position: absolute;
	top:20px;
	right:0;
}

.pleio-main-template-header-register {
	color: #666;
	font-weight: bold;
	font-size: 14px;
	padding: 3px 6px;
}

.pleio-main-template-header-register:hover {
	text-decoration: none;
	color: #666;
}

#login-dropdown > .elgg-button-dropdown {
	color: #666;
	background: none;
	border: none;
	
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;
}

#login-dropdown > .elgg-button-dropdown:after {
	content: none;
}

.pleio-main-template-header-subtitle {
	background: url("<?php echo elgg_get_site_url(); ?>mod/pleio_main_template/_graphics/elgg_sidebar_button_bg.png") repeat-x scroll 0 0 #CCCCCC;
    border: 1px solid #999999;
    border-radius: 5px 5px 5px 5px;
    color: #333333;
    text-align: center;
    text-shadow: 0 1px 0 white;
    
    margin: 10px 0;
    height: 32px;
    font-size: 24px;
    line-height: 31px;
    font-weight: bold;
}

.pleio-main-template-header-subtitle-actions > a {
	width: 50%;
	text-align: center;
	display: inline-block;
	float: left;
	height: 50px;
    font-size: 24px;
    line-height: 50px;
    
    color: white;
}

.pleio-main-template-header-subtitle-actions > a:hover {
	text-decoration: none;
}

.pleio-main-template-header-subtitle-actions .odd {
	background: #<?php echo THEME_COLOR_2;?>;
}

.pleio-main-template-header-subtitle-actions .even {
	background: #<?php echo THEME_COLOR_4;?>;
}

.pleio-main-template-header-subtitle-actions > div {
 	background: url("/mod/pleio_main_template/_graphics/spacer.png") top center no-repeat transparent;
 	position: absolute;
 	left: 50%;
 	
 	width: 50px;
 	height: 50px;
 	
 	margin-left: -25px;
}
 
#index-pleio-widget-buttons a {
 	background: url("/mod/pleio_main_template/_graphics/index-pleio-widget.png") top center no-repeat transparent;
 	width: 200px;
 	height: 50px;
 	display: inline-block;
 	margin: 0 0 0 10px;
}
 
#index-pleio-widget-buttons .index-pleio-widget-button1 {
 	background-position: 0 0;
}
#index-pleio-widget-buttons .index-pleio-widget-button1:hover {
 	background-position: 0 -50px;
}
#index-pleio-widget-buttons .index-pleio-widget-button1:active {
 	background-position: 0 -100px;
}
 
#index-pleio-widget-buttons .index-pleio-widget-button2 {
 	background-position: -200px 0;
}
#index-pleio-widget-buttons .index-pleio-widget-button2:hover {
 	background-position: -200px -50px;
}
#index-pleio-widget-buttons .index-pleio-widget-button2:active {
 	background-position: -200px -100px;
}
 
#index-pleio-widget-buttons .index-pleio-widget-button3 {
 	background-position: -400px 0;
}
#index-pleio-widget-buttons .index-pleio-widget-button3:hover {
 	background-position: -400px -50px;
}
#index-pleio-widget-buttons .index-pleio-widget-button3:active {
 	background-position: -400px -100px;
}
 
 /* fixes topbar position */
 .elgg-page-topbar > .elgg-inner {
 	width: 80%;
 }