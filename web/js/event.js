function updateevenement(id) {
    ajax_getevent(id,
        function(json) {
            if (json.success){
				$('#event_name').text(json.event.name);
				$('#event_startdate').text(json.event.beginDate);
				$('#event_starttime').text(json.event.beginTime);
                $('#event_enddate').text(json.event.endDate);
                $('#event_endtime').text(json.event.endTime);
                $('#event_cityname').text(json.event.address.cityName);
				$('#event_roadnumber').text(json.event.address.streetNumber);
				$('#event_roadname').text(json.event.address.streetName);
				$('#event_citycode').text(json.event.address.cityCode);
				$('#event_description').text(json.event.description);
				
			}				
        },
        function(jqXHR, exception) {
            alert("Erreur de communication avec le serveur : " + exception);
        }
    );

}



	

