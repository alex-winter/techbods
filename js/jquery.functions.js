
var boxlet_animation = 'easeOutElastic';
var boxlets_snapshot_array = [];
var boxlet_zindex = 0;


$(document).ready( function() {
	generate_sidenav();
	generate_page('Dashboard');
});

function loading(target) {
	$(target).html('<i class="fa fa-spinner fa-spin"></i>');
}

function generate_page(page) {
	var data = '';
	
	switch(page){
		case 'Dashboard':
			data = "page=" + 'Dashboard';
			generate_boxlets();
		break;
	}
	$.ajax({
		url: "includes/functions/generate_page_heading.php",
		type: "POST",
		data: data,
		beforeSend: function(){
			loading("[data-js-generate='page_heading']");
		},
		success: function(result){
			$('[data-js-generate="page_heading"]').html(result);
			$(".navbar-brand").html(page);
		}
	});
}


function boxlets_boundary(elem) {
	
	if( elem.position().top < 0 ){
		elem.animate({
			top: "0"
		}, 1000, boxlet_animation);
	}
	
	if( elem.position().left < 0 ){
		elem.animate({
			left: "0"
		}, 1000, boxlet_animation);
	}
}


function rebind_boxlets() {
	$(".boxlet").each( function(){
		$(this).draggable({
			appendTo: 'body',
			start: function(event, ui){
				isDraggingMedia = true;
				$(this).toggleClass('focus');
				boxlet_focus( $(this) );
			},
			stop: function(event, ui){
				isDraggingMedia = false;
				boxlets_boundary( $(this) );
			}
		}).resizable({
			handles: 'n, e, s, w, ne, se, sw, nw',
			start: function(event, ui){
				boxlet_focus( $(this) );
			},
			stop: function(event, ui){
				boxlets_boundary( $(this) );
			}
		});
	});
}

function generate_sidenav() {
	$.ajax({
		url: "includes/functions/generate_sidenav.php",
		success: function(result){
			$("[data-js-generate='side_nav']").html(result);
		}
	});
}

function generate_boxlets() {
	$.ajax({
		url: "/techs_remastered/includes/functions/generate_boxlets.php",
		success: function(result) {
			
			$("[data-js-generate='page_content']").html(result);
			
			rebind_boxlets();
		}
	});
}

function generate_job_list() {
	var filter_array = [];
	
	$(".filter-jobs[data-fliter-column='priority']").each(function( index ) {

		var me = $(this);
		
		if( me.is(':checked') ) {
			newFliter = {};
				newFliter.column = me.attr('data-fliter-column');
				newFliter.condition = me.attr('data-filter-condition');
			
			filter_array.push(JSON.stringify(newFliter));
		}
	});
	
	$(".filter-jobs[data-fliter-column='completed_by']").each(function( index ){

		var me = $(this);
		
		if(me.is(':checked')){
			
			newFliter = {};
				newFliter.column = me.attr('data-fliter-column');
				newFliter.condition = me.attr('data-filter-condition');
			
			filter_array.push(JSON.stringify(newFliter));
		}
	});
	
	var filter = { 'filter_array[]': filter_array };
	
	$.ajax({
		url: "includes/functions/generate_job_list.php",
		type: "POST",
		data: filter,
		beforeSend: function(){
			loading("[data-js-generate='job_list']");
		},
		success: function(result){
			
			$("[data-js-generate='job_list']").html(result);
		}
	});
}

function boxlets_snapshot() {
	boxlets_snapshot_array = [];
	
	$(".boxlet").each( function( index ){
		
		var me = $(this);
		
		newBoxlet = {};
			newBoxlet.id = me.attr('data-boxlet-id');
			newBoxlet.width = Math.round( me.width() );
			newBoxlet.height = Math.round( me.height() );
			newBoxlet.top = Math.round( me.position().top );
			newBoxlet.left = Math.round( me.position().left );
			
		boxlets_snapshot_array.push(JSON.stringify(newBoxlet));
	});
	
	//returned via global array 
}

function boxlet_focus(elem) {
	$(".boxlet").removeClass('focus');
	elem.addClass('focus').css({
		"z-index": boxlet_zindex+1
	});
	boxlet_zindex++;
}

function maxWindow() {
	alert('full screen API needed');
}



