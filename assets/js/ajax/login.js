function getBaseUrl() {
	var re = new RegExp(/^.*\//);
	return re.exec(window.location.href);
}

$("#admin_btn").click(function() {
	$("#res").fadeIn('slow');
	$("#admin_form").submit(function(go) {
	    
        var postData = $('#admin_form').serializeArray();
        var formURL = $('#admin_form').attr("action");

			$.ajax({
				url: formURL,
				type: 'POST',
				data: postData
			})
			.done(function(data) {
				setTimeout(function(){ 
					if (data == "Success") {
						$("#res").html('<div class="alert alert-success fade in" role="alert"><strong>Success......</strong></div>');
						window.location.href = getBaseUrl()+"dashboard.php";
					}else{
						$("#res").html('<div class="alert alert-danger fade in" role="alert"><strong>Wrong Username or Password !</strong></div>');
					}
				}, 1000);
				
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

		go.preventDefault();	//STOP default action
		go.unbind();


	});


});

