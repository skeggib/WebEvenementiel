function updateinformation(){
    ajax_getuser(
        function(json) {
            if (json.success){
				$('#myprofile_username').text(json.username);
				if (json.civility==1){
					$('#myprofile_civility').text('Mr.');
				}
				else{
					$('#myprofile_civility').text('Mme.')
				}
				$('#myprofile_firstname').text(json.firstname);
				$('#myprofile_lastname').text(json.lastname);
				$('#myprofile_email').text(json.email);
				
			}				
        },
        function(jqXHR, exception) {
            updateInfoConnect(false);
            alert("Erreur de communication avec le serveur : " + exception);
        }
    );

}




	

