function updatelistevents(){
    ajax_listevents(
        function(json) {
			alert(JSON.stringify(json));
            if (json.success){
				var i;
				var events = json['eventsList'];
				for( i=0;i<events.length;i++){
					$('#eventtable').append('<tr><td>'+events[i]['name']+'</td></tr>');
				}
			}				
        },
        function(jqXHR, exception) {
            updateInfoConnect(false);
            alert("Erreur de communication avec le serveur : " + exception);
        }
    );

}



	

