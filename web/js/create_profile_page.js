function showMissingInput(parameterName) {
	switch (parameterName) {
		case 'login':
			$('#pseudo').addClass('inputError');
			break;
		case 'email':
			$('#mail').addClass('inputError');
			break;
		case 'password':
			$('#mdp').addClass('inputError');
			break;
		case 'firstname':
			$('#prenom').addClass('inputError');
			break;
		case 'lastname':
			$('#nom').addClass('inputError');
			break;
		case 'civility':
			$('#civilite').addClass('inputError');
			break;
		case 'birthday':
			$('#naissance').addClass('inputError');
			break;
		case 'cellphone':
			$('#tel').addClass('inputError');
			break;
		case 'citycode':
			$('#adresse').addClass('inputError');
			break;
		case 'cityname':
			$('#ville').addClass('inputError');
			break;
	}
}

$(document).ready(function() {
	$('#createProfileButton').click(function() {
		createProfile(
			$('#pseudo').val(),		$('#mail').val(),	$('#mdp').val(),
			$('#prenom').val(),		$('#nom').val(),	$('#civilite').val(),
			$('#naissance').val(),	$('#tel').val(),	$('#adresse').val(),
			$('#ville').val(),
			function() {
				$('input').removeClass('inputError');
	        	var json = JSON.parse(data);

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
			},
			function (jqXHR, exception) {
	            alert("Server error");
	        }
		);
	});
});