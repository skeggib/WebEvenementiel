function logout() {
    ajax_logout(
        function(json) {
            updateConnectedUser();
            navOpenHome();
        },
        function(jqXHR, exception) {
            updateConnectedUser();
            navOpenHome();
        }
    );
}