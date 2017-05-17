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
				$('#myprofile_firstname').text(json.firstName);
				$('#myprofile_lastname').text(json.lastName);
                $('#myprofile_cp').text(json.address.cityCode);
                $('#myprofile_town').text(json.address.cityName);
                $('#myprofile_cellphone').text(json.cellphone);
				$('#myprofile_email').text(json.email);
				
			}				
        },
        function(jqXHR, exception) {
            updateInfoConnect(false);
            alert("Erreur de communication avec le serveur : " + exception);
        }
    );

}




	

