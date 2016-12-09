// Dès que la page est entièrement chargée
$(function($) {

	// On bind une fonction personnalisé lors du click sur le lien "voir tout les concerts"
	$('#link_view_events a').on('click', function(evt) {
		console.log("Link On Click");
		
		// On stop la propagation de l'événement pour rester sur la page
		evt.preventDefault();

		var url = $('#link_view_events a').attr('href');
		console.log("Ajax : " + url);
		$.ajax({
			type : 'GET',
			url : url,
			success : function(data) {
				console.log("Ajax Success Response :");
				console.log(data);
				var events = $(data).find('div.event-item');

				// Suppression des anciens events
				$('div.event-item').remove();

				// Insertion des events avant le block lien
				$('#link_view_events a').before(events);

				
				// Suppression du block lien
			      
			    	$('#link_view_events a').remove();
		
			    
							},
			error : function(xhr, type, error) {
				console.log("Ajax Error Response : " + error);
			}
		});
	});

});
