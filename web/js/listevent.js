function updatelistevents(){
    ajax_listevents(
        function(json) {
            if (json.success){
				var i;
				var events = json['eventsList'];
				for( i=0;i<events.length;i++){
					$('#eventtable').append('<tr><td><a href="" onclick="evenementouvert('+events[i]['id']+')">'+events[i]['name']+'</a></td></tr>');
				}
			}				
        },
        function(jqXHR, exception) {
            updateInfoConnect(false);
            alert("Erreur de communication avec le serveur : " + exception);
        }
    );

}

function evenementouvert(id){
	navOpenEvenement();
	updateevenement(id);

}





	

