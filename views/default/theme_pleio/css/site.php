<?php ?>
#theme-pleio-sidebar {
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

#theme-pleio-sidebar ul{
	border-bottom: 1px solid #585858;
}

#theme-pleio-sidebar-top {
	bottom: 0;
	position: absolute;
	margin-bottom: 4px;
	width: 100%;
	display: none;
}

.elgg-menu-theme-pleio-sidebar li {
	padding: 4px 0px;
	border-top: 1px solid #585858;
	border-bottom: 1px solid #252525;
}

.elgg-menu-theme-pleio-sidebar li:hover,
.elgg-menu-theme-pleio-sidebar li.elgg-state-selected {
	background: #<?php echo THEME_COLOR_2; ?> url(<?php echo THEME_GRAPHICS_FOLDER; ?>sidebar_background.png) repeat-y right;
	border-top: 1px solid #<?php echo THEME_COLOR_4; ?>;
}

.elgg-menu-theme-pleio-sidebar .place_holder {
	height: 16px;
}

.elgg-menu-theme-pleio-sidebar .place_holder:hover {
	background: #<?php echo THEME_COLOR_1; ?>;
	border-top: 1px solid #585858;
}

.elgg-menu-theme-pleio-sidebar li a {
	padding: 0px 5px 0px 24px;
	color: white;
	font-weight: bold;
	font-size: 12px;
	height: 16px;
	overflow: hidden;
	white-space: nowrap;
}

.elgg-menu-theme-pleio-sidebar li a:hover {
	text-decoration: none;
}

.elgg-menu-theme-pleio-sidebar .elgg-child-menu {
	display: none;
}

.elgg-menu-theme-pleio-sidebar > .elgg-menu-item-tools > ul,
.elgg-menu-theme-pleio-sidebar > .elgg-menu-item-mine > ul {
	position: absolute;
	left: 100%;
	top: -1px;
	padding: -20px;
	background: #<?php echo THEME_COLOR_1; ?> url(<?php echo THEME_GRAPHICS_FOLDER; ?>sidebar_background.png) repeat-y right;
}

.elgg-menu-theme-pleio-sidebar > .elgg-menu-item-tools:hover > ul,
.elgg-menu-theme-pleio-sidebar > .elgg-menu-item-mine:hover > ul {
	display: inline-block;
}

#theme-pleio-sidebar.collapsed {
	min-width: 23px;
	width: 23px;
}

#theme-pleio-sidebar.collapsed > ul > li > a {
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

.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-toggle-sidebar > a {
	color: #666;
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -0px;
}
.collapsed .elgg-menu-theme-pleio-sidebar li.elgg-menu-item-toggle-sidebar > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -18px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-subsites > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -540px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-mine > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -1260px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-tools > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -1098px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-help > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -324px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-add > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -882px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-personal-menu-add > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -882px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-share > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -1026px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-learn > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -378px;	
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-groups > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -1494px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-settings > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -972px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-admin > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -990px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-dashboard > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -414px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-members > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -1458px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-backtotop > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -1422px;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-report-this > a {
	background: url(<?php echo elgg_get_site_url(); ?>mod/reportedcontent/graphics/icon_reportthis.gif) no-repeat 4px top;
}
.elgg-menu-theme-pleio-sidebar li.elgg-menu-item-colofon > a {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 4px -486px;
}

/* End Menu Icons */

/* Dashboard Tabs */
.theme-pleio-dashboard > .elgg-body{
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

.theme-pleio-dashboard > .elgg-body .elgg-widget-add-control {
	margin: 0px;
}

.theme-pleio-dashboard > .elgg-body .elgg-widgets {
	margin-top: 10px;
}

.theme-pleio-dashboard > .elgg-body #widget-manager-multi-dashboard-tabs {
	top: 0px;
	background: #383838;
}

.theme-pleio-dashboard > .elgg-body #widgets-add-panel {
	padding: 2px 6px;
}

.theme-pleio-dashboard > .elgg-body #widget-manager-multi-dashboard-tabs li {
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;
	
	border-width: 0 1px 0;
	margin-left: 0px;
}

.theme-pleio-dashboard > #theme-pleio-sidebar {
	margin-right: 0px;
}

.theme-pleio-header-logged-out-spacer {
	height: 10px;
}

.theme-pleio-header-logged-out {
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

.theme-pleio-header-account {
	position: absolute;
	top:20px;
	right:0;
}

.theme-pleio-header-register {
	color: #666;
	font-weight: bold;
	font-size: 14px;
	padding: 3px 6px;
}

.theme-pleio-header-register:hover {
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

.theme-pleio-header-subtitle {
	background: url("<?php echo elgg_get_site_url(); ?>mod/theme_pleio/_graphics/elgg_sidebar_button_bg.png") repeat-x scroll 0 0 #CCCCCC;
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

.theme-pleio-header-subtitle-actions > a {
	width: 50%;
	text-align: center;
	display: inline-block;
	float: left;
	height: 50px;
    font-size: 24px;
    line-height: 50px;
    
    color: white;
}

.theme-pleio-header-subtitle-actions > a:hover {
	text-decoration: none;
}

.theme-pleio-header-subtitle-actions .odd {
	background: #<?php echo THEME_COLOR_2;?>;
}

.theme-pleio-header-subtitle-actions .even {
	background: #<?php echo THEME_COLOR_4;?>;
}

.theme-pleio-header-subtitle-actions > div {
 	background: url("/mod/theme_pleio/_graphics/spacer.png") top center no-repeat transparent;
 	position: absolute;
 	left: 50%;
 	
 	width: 50px;
 	height: 50px;
 	
 	margin-left: -25px;
}
 
#index-pleio-widget-buttons a {
 	background: url("/mod/theme_pleio/_graphics/index-pleio-widget.png") top center no-repeat transparent;
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