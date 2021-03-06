/**
 *  Tests the parameters
 */
function showInvalidInputCreateEvent(parameterName) {
	switch (parameterName) {
		case 'name':
			$('#createevent_name').addClass('inputError');
			break;
		case 'beginDate':
			$('#createevent_startdate').addClass('inputError');
			break;
		case 'endDate':
			$('#createevent_enddate').addClass('inputError');
			break;
		case 'beginTime':
			$('#createevent_starttime').addClass('inputError');
			break;
		case 'endTime':
			$('#createevent_endtime').addClass('inputError');
			break;
		case 'streetNumber':
			$('#createevent_roadnumber').addClass('inputError');
			break;
		case 'streetName':
			$('#createevent_roadname').addClass('inputError');
			break;
		case 'cityCode':
			$('#createevent_citycode').addClass('inputError');
			break;
		case 'cityName':
			$('#createevent_cityname').addClass('inputError');
			break;
		case 'description':
			$('#createevent_description').addClass('inputError');
			break;
	}
}

/**
 * Recover the informations from the createevent page, executes the AJAX request and calls navOpenMyEvents
 */
function createevent() {
    ajax_createevent(
        $('#createevent_name').val(),		$('#createevent_startdate').val(),	$('#createevent_enddate').val(),
        $('#createevent_starttime').val(),	$('#createevent_endtime').val(),	$('#createevent_roadnumber').val(),
        $('#createevent_roadname').val(),	$('#createevent_citycode').val(),	$('#createevent_cityname').val(),
        $('#createevent_description').val(),
        function(json) {
            $('input').removeClass('inputError');

            if (!json.success) {
                switch (json.errorCode) {
                    case ERROR_MISSING_PARAM:
                        showInvalidInputCreateEvent(json.parameterName);
                        break;
                    case ERROR_INVALID_PARAM:
                        showInvalidInputCreateEvent(json.parameterName);
                        break;
                }
            }

            else {
				navOpenMyEvents();
			}
        },
        function (jqXHR, exception) {
            alert("Server error");
        }
    );
}