function showMissingInput(parameterName) {
	switch (parameterName) {
		case 'name':
			$('#createevent_name').addClass('inputError');
			break;
		case 'startdate':
			$('#createevent_startdate').addClass('inputError');
			break;
		case 'enddate':
			$('#createevent_enddate').addClass('inputError');
			break;
		case 'starttime':
			$('#createevent_starttime').addClass('inputError');
			break;
		case 'endtime':
			$('#createevent_endtime').addClass('inputError');
			break;
		case 'streetnumber':
			$('#createevent_roadnumber').addClass('inputError');
			break;
		case 'streetname':
			$('#createevent_roadname').addClass('inputError');
			break;
		case 'citycode':
			$('#createevent_citycode').addClass('inputError');
			break;
		case 'cityname':
			$('#createevent_cityname').addClass('inputError');
			break;
		case 'description':
			$('#createevent_description').addClass('inputError');
			break;
	}
}

function createevent() {
    ajax_createevent(
        $('#createevent_name').val(),		$('#createevent_startdate').val(),		$('#createevent_enddate').val(),
        $('#createevent_starttime').val(),	$('#createevent_endtime').val(),	$('#createevent_roadnumber').val(),
        $('#createevent_roadname').val(),	$('#createevent_citycode').val(),	$('#createevent_cityname').val(),
        $('#createevent_description').val(),
        function(json) {
            $('input').removeClass('inputError');

            if (!json.success) {
                switch (json.errorCode) {
                    case 1:
                        showMissingInput(json.parameterName);
                        break;
                    case 2:
                        showMissingInput(json.parameterName);
                        break;
                }
            }

            else {
            	navOpenMyProfile();
			}
        },
        function (jqXHR, exception) {
            alert("Server error");
        }
    );
}