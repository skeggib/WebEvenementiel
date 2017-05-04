function showMissingInput(parameterName) {
	switch (parameterName) {
		case 'login':
			$('#signup_login').addClass('inputError');
			break;
		case 'email':
			$('#signup_email').addClass('inputError');
			break;
		case 'password':
			$('#signup_password').addClass('inputError');
			break;
		case 'firstname':
			$('#signup_firstname').addClass('inputError');
			break;
		case 'lastname':
			$('#signup_lastname').addClass('inputError');
			break;
		case 'civility':
			$('#signup_civility').addClass('inputError');
			break;
		case 'birthday':
			$('#signup_birthday').addClass('inputError');
			break;
		case 'cellphone':
			$('#signup_cellphone').addClass('inputError');
			break;
		case 'citycode':
			$('#signup_citycode').addClass('inputError');
			break;
		case 'cityname':
			$('#signup_cityname').addClass('inputError');
			break;
	}
}

function signup() {
    ajax_signup(
        $('#signup_login').val(),		$('#signup_email').val(),		$('#signup_password').val(),
        $('#signup_firstname').val(),	$('#signup_lastname').val(),	$('#signup_civility').val(),
        $('#signup_birthdate').val(),	$('#signup_cellphone').val(),	$('#signup_citycode').val(),
        $('#signup_cityname').val(),
        function(data) {
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

            else {
            	ajax_signin($('#signup_login').val(), $('#signup_password').val());
            	navOpenSignUpSuccess();
			}
        },
        function (jqXHR, exception) {
            alert("Server error");
        }
    );
}