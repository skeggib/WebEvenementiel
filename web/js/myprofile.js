function updateinformation(){
    ajax_getuser(
        function(json) {
            if (json.success){
				$('#myprofile_username').text(json.user.username);

				if (json.user.civility == 1)
					$('#myprofile_civility').text('Mr.');
				else
					$('#myprofile_civility').text('Mme.')

				$('#myprofile_firstname').text(json.user.firstName);
				$('#myprofile_lastname').text(json.user.lastName);
                $('#myprofile_cp').text(json.user.address.cityCode);
                $('#myprofile_town').text(json.user.address.cityName);
                $('#myprofile_cellphone').text(json.user.cellphone);
				$('#myprofile_email').text(json.user.email);
				
			}				
        },
        function(jqXHR, exception) {
            updateInfoConnect(false);
            alert("Erreur de communication avec le serveur : " + exception);
        }
    );

}




	

