function LoadEventsList(){
    ajax_listevents(
        function(json) {
            if (json.success){

                $('#eventtable').append(
                	'<tr>' +
					'<th>Nom</th>' +
                    '<th>Date de début</th>' +
                    '<th>Heure de début</th>' +
                    '<th>Date de fin</th>' +
                    '<th>Heure de fin</th>' +
                    '<th>Adresse</th>' +
					'</tr>');

				var events = json.eventsList;
				for(var i = 0; i < events.length; i++) {

					var event = events[i];

                    var fullAddress =
                        event.address.streetNumber + " " +
                        event.address.streetName + ", " +
                        event.address.cityCode + " " +
                        event.address.cityName;

					$('#eventtable').append(
						'<tr>' +
						'<td class="event" onclick="OpenEvent(' + event.id + ')">' + event.name + '</td>' +
						'<td>' + event.beginDate + '</td>' +
                        '<td>' + event.beginTime + '</td>' +
                        '<td>' + event.endDate + '</td>' +
                        '<td>' + event.endTime + '</td>' +
                        '<td><a href="https://www.google.fr/maps/place/' + encodeURIComponent(fullAddress) + '" target="_blank">' +
							fullAddress +
                        '</a></td>' +
						'</tr>');
				}
			}				
        },
        function(jqXHR, exception) {
            updateInfoConnect(false);
            alert("Erreur de communication avec le serveur : " + exception);
        }
    );

}

function OpenEvent(id){
	navOpenEvenement();
	updateevenement(id);
}





	

