<?php ?>
//<script>
elgg.provide("elgg.pleio_main_template");

elgg.pleio_main_template.init = function(){
	
	//if($(".elgg-page").height() > $(window).height()){
	//	$("#pleio-main-template-sidebar-top").show();
	//}

	$(".elgg-menu-item-toggle-sidebar a").live("click", function(e){
		$("#pleio-main-template-sidebar").toggleClass("collapsed");
		elgg.action("pleio_main_template/toggle_sidebar");
		e.preventDefault();
	});

	$(".elgg-menu-item-personal-menu-add a").live("click", function(e){
		var split_pos = document.title.indexOf(": ");
		if(split_pos > 0){
			var title = document.title.substring(split_pos + 2);
			
			$(this).attr("href", $(this).attr("href") + "&title=" + encodeURIComponent(title)); 
		} else {
			alert(elgg.echo("pleio_main_template:personal_menu:unable"));
			e.preventDefault();
		}
	});

	$(".elgg-menu-item-mine .elgg-icon-delete-alt").live("click", function(e){
		var guid = $(this).parent().parent().attr("class").replace("elgg-menu-item-personal-", "");
		if(guid){
			elgg.action("pleio_main_template/remove_personal_menu_item", { 
				data: { 
						guid: guid 
					}, 
				success: function(data) {
						if(data.status == 0){
							$("li.elgg-menu-item-personal-" + guid).remove();
						} 
					}
				});
		}
		e.preventDefault();
	});		
}

elgg.register_hook_handler('init', 'system', elgg.pleio_main_template.init);