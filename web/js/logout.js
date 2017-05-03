function logout() {
    ajax_logout(
        function(data) {
            updateConnectedUser();
            navOpenHome();
        },
        function(jqXHR, exception) {
            updateConnectedUser();
            navOpenHome();
        }
    );
}