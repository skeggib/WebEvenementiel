/**
 * Signin from the signin page, executes the AJAX request and calls updateConnectedUser
 */
function signinFromPage() {
    ajax_signin($('#signin_login').val(), $('#signin_password').val(),
        function(json) {
            if (json.success) {
                updateConnectedUser();
                navOpenMyProfile();
            }
            else {
                $('#signin_login').addClass('inputError');
                $('#signin_password').addClass('inputError');
            }
        },
        function(jqXHR, exception) {
            $('#signin_login').addClass('inputError');
            $('#signin_password').addClass('inputError');
        });
}

/**
 * Updates the page based on the connexion state
 */
function updateConnectedUser() {
    ajax_getuser(
        function(json) {
            if (json.success)
                updateHeaderConnectedUser(true, json.user.username);
            else
                updateHeaderConnectedUser(false);
        },
        function(jqXHR, exception) {
            updateHeaderConnectedUser(false);
            alert("Erreur de communication avec le serveur : " + exception);
        }
    );
}

/**
 * Updates the header based on the connexion state
 * @param connected
 */
function updateHeaderConnectedUser(connected, username) {
    if (connected) {
        $('#login .login_helper').html(
            '<a onclick="navOpenMyProfile()"><span>' + username + '</span></a>' +
            '<br>' +
            '<a onclick="logout()"><span>Se déconnecter</span></a>');

        $('header nav ul li').show();
    }

    else {
        $('#login .login_helper').html(
            '<a id="nav_signin" onclick="navOpenSignIn()"><span>Connexion</span></a>\
            <br>\
            <a id="nav_signup" onclick="navOpenSignUp()"><span>Inscription</span></a>'
        );

        $('header nav ul #nav_createevent').hide();
        $('header nav ul #nav_myevents').hide();
        $('header nav ul #nav_myprofile').hide();
    }
}