/**
 * Signin from the signin page, executes the AJAX request and calls updateConnectedUser
 */
function signinFromPage() {
    ajax_signin($('#signin_login').val(), $('#signin_password').val(),
        function(data) {
            var json = JSON.parse(data);
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
 * Updates the page parts based on the connexion state
 */
function updateConnectedUser() {
    ajax_getuser(
        function(data) {
            var json = JSON.parse(data);
            if (json.success) {
                $('#login .login_helper').html(
                    '<a onclick="navOpenMyProfile()"><span>' + json.username + '</span></a>' +
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
        },
        function(jqXHR, exception) {
            $('#login .login_helper').html(
                '<a id="nav_signin" onclick="navOpenSignIn()"><span>Connexion</span></a>\
                <br>\
                <a id="nav_signup" onclick="navOpenSignUp()"><span>Inscription</span></a>'
            );

            $('header nav ul #nav_createevent').hide();
            $('header nav ul #nav_myevents').hide();
            $('header nav ul #nav_myprofile').hide();
        }
    );
}