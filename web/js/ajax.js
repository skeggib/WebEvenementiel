$.ajaxSetup({cache: false});

function ajax_request(cmd, data, successCallback, errorCallback) {
	fulldata = Object.create(data);
    fulldata.cmd = cmd;

    $.ajax({
        url: 'main.php',
        type: 'POST',
        data: fulldata,
        dataType: 'html',
        error: function (jqXHR, exception) {
            if (errorCallback != 'undefined')
                errorCallback(jqXHR, exception);
        },
        success: function(data) {
            try {
            	var json = JSON.parse(data);
                if (successCallback != 'undefined')
                    successCallback(json);
			}
			catch (e) {
            	$('body').html(e.message + '<br><br>' + e.stack + '<br><br>' + data);
			}
        }
    });
}

/**
 * Creates a profile by sending an AJAX request
 *
 * @param      {string}    login            The login
 * @param      {string}    email            The email
 * @param      {string}    password         The password
 * @param      {string}    firstname        The firstname
 * @param      {string}    lastname         The lastname
 * @param      {int}   	   civility         The civility (1 for man and 2 for woman)
 * @param      {string}    birthday         The birthday
 * @param      {string}    cellphone        The cellphone
 * @param      {string}    cityCode         The city code
 * @param      {string}    cityName         The city name
 * @param      {Function}  successCallback  The success callback
 * @param      {Function}  errorCallback    The error callback
 */
function ajax_signup(
	login,
	email,
	password,
	firstname,
	lastname,
	civility,
	birthday,
	cellphone,
	cityCode,
	cityName,
	successCallback,
	errorCallback) {

	ajax_request(
		'signup',
		{
            login: login,
            email: email,
            password: password,
            firstname: firstname,
            lastname: lastname,
            civility: civility,
            birthday: birthday,
            cellphone: cellphone,
            citycode: cityCode,
            cityname: cityName
		},
		successCallback,
		errorCallback
	);
}

/**
 * Connects a user by sending an AJAX request
 *
 * @param login
 * @param password
 * @param successCallback
 * @param errorCallback
 */
function ajax_signin(login, password, successCallback, errorCallback) {

    ajax_request(
        'signin',
        {
            login: login,
            password: password
        },
        successCallback,
        errorCallback
    );
}

/**
 * Gets the connected user informations by an AJAX request
 *
 * @param successCallback
 * @param errorCallback
 */
function ajax_getuser(successCallback, errorCallback) {

    ajax_request(
        'getuser',
        { },
        successCallback,
        errorCallback
    );
}

/**
 * Disconnect the user by an AJAX request
 *
 * @param successCallback
 * @param errorCallback
 */
function ajax_logout(successCallback, errorCallback) {

    ajax_request(
        'logout',
        { },
        successCallback,
        errorCallback
    );
}