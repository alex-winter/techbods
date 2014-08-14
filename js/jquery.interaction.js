


$(document).on("click", ".nav-link", function(e){
	
	$(".nav-link").closest(".parent").removeClass('current');
	
	$(this).closest(".parent").addClass('current');
	
	generate_page( $(this).attr('data-href') );
});


$(document).on("click", "#save-dashboard", function(e) {
	
	boxlets_snapshot();
	
	$.ajax({
		url: "includes/functions/save_dashboard.php",
		type: "POST",
		data: { 'boxlets_array[]': boxlets_snapshot_array },
		success: function(result){
			
			$(".boxlet").removeClass('focus');
			$(".boxlet").each(function( index ){
				$(this).animate({'borderColor':'#009899 !important'}, 300)
					   .animate({'borderColor':'#dddddd !important'}, 300);
			});
		}
	});
});

$(document).on("click", ".expand-boxlet", function(e) {
	var elem = $(this).closest(".boxlet");
	boxlets_snapshot();
	elem.animate({
		top: '0',
		left: '0',
		width: '100%',
		height: '100%'
	}, 800, boxlet_animation);
});

$(document).on("click", ".boxlet", function(e) {
	boxlet_focus( $(this) );
});

$(document).on("click", ".full_screen", function(e) {
	maxWindow();
});