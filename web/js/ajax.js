$.ajaxSetup({cache: false});

/**
 * Creates a profile by sending an AJAX request
 *
 * @param      {string}    login            The login
 * @param      {string}    email            The email
 * @param      {string}    password         The password
 * @param      {string}    firstname        The firstname
 * @param      {string}    lastname         The lastname
 * @param      {int}   	   civility         The civility (1 for man and 2 fir woman)
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

	$.ajax({
		url: 'main.php',
		type: 'POST',
		data: {
			cmd: 'signup',
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
		dataType: 'html',
		error: function (jqXHR, exception) {
			errorCallback(jqXHR, exception);
        },
        success: function(data) {
			successCallback(data);
        }
	});
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

    $.ajax({
        url: 'main.php',
        type: 'POST',
        data: {
            cmd: 'signin',
            login: login,
            password: password
        },

        datatype: 'html',
        error: function(jqXHR, exception) {
            errorCallback(jqXHR, exception);
        },
        success: function(data) {
            successCallback(data);
        }
    });
}

/**
 * Gets the connected user informations by an AJAX request
 *
 * @param successCallback
 * @param errorCallback
 */
function ajax_getuser(successCallback, errorCallback) {
	$.ajax({
		url: 'main.php',
		type: 'POST',
		data: {
			cmd: 'getuser'
		},
		datatype: 'html',
        error: function(jqXHR, exception) {
            errorCallback(jqXHR, exception);
        },
        success: function(data) {
            successCallback(data);
        }
	});
}

/**
 * Disconnect the user by an AJAX request
 *
 * @param successCallback
 * @param errorCallback
 */
function ajax_logout(successCallback, errorCallback) {
    $.ajax({
        url: 'main.php',
        type: 'POST',
        data: {
            cmd: 'logout'
        },
        datatype: 'html',
        error: function(jqXHR, exception) {
            errorCallback(jqXHR, exception);
        },
        success: function(data) {
            successCallback(data);
        }
    });
}