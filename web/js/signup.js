/**
 *  Tests the parameters
 */
function showInvalidInputSignUp(parameterName) {
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
		case 'firstName':
			$('#signup_firstname').addClass('inputError');
			break;
		case 'lastName':
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
		case 'cityCode':
			$('#signup_citycode').addClass('inputError');
			break;
		case 'cityName':
			$('#signup_cityname').addClass('inputError');
			break;
	}
}

/**
 * Signup from the signup page, executes the AJAX request and calls ajax_signin and navOpenSignUpSuccess 
 */
function signup() {
    ajax_signup(
        $('#signup_login').val(),		$('#signup_email').val(),		$('#signup_password').val(),
        $('#signup_firstname').val(),	$('#signup_lastname').val(),	$('#signup_civility').val(),
        $('#signup_birthday').val(),	$('#signup_cellphone').val(),	$('#signup_citycode').val(),
        $('#signup_cityname').val(),
        function(json) {
            $('input').removeClass('inputError');

            if (!json.success) {
                switch (json.errorCode) {
                    case ERROR_MISSING_PARAM:
                        showInvalidInputSignUp(json.parameterName);
                        break;
                    case ERROR_INVALID_PARAM:
                        showInvalidInputSignUp(json.parameterName);
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