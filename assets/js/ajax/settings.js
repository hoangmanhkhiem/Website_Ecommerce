
$("#about_update").click(function() {

	$(".gocover").fadeIn('slow');
		
		$("#about_form").submit(function(go) {
		    
	        var postData = $('#about_form').serializeArray();
	        //var about = $("#about").val();
	        var formURL = $('#about_form').attr("action");

				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){ 
						if (response == "Success") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>About Us Text Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else{
							$("#res").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+response+'</strong></div>');
							$(".gocover").fadeOut('slow');
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


$("#office_update").click(function() {

	$(".gocover").fadeIn('slow');
		
		$("#office_form").submit(function(go) {
		    
	        var postData = $('#office_form').serializeArray();
	        //var about = $("#about").val();
	        var formURL = $('#office_form').attr("action");

				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){ 
						if (response == "Success") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Office Section Text Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else{
							$("#res").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+response+'</strong></div>');
							$(".gocover").fadeOut('slow');
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


$("#footer_update").click(function() {

	$(".gocover").fadeIn('slow');
		
		$("#footer_form").submit(function(go) {
		    
	        var postData = $('#footer_form').serializeArray();
	        //var about = $("#about").val();
	        var formURL = $('#footer_form').attr("action");

				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){ 
						if (response == "Success") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Footer Text Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else{
							$("#res").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+response+'</strong></div>');
							$(".gocover").fadeOut('slow');
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


$("#contact_page_update").click(function() {

	$(".gocover").fadeIn('slow');
		
		$("#contact_page").submit(function(go) {
		    
	        var postData = $('#contact_page').serializeArray();
	        //var about = $("#about").val();
	        var formURL = $('#contact_page').attr("action");

				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){ 
						if (response == "Success") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Contact Page Content Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else{
							$("#res").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+response+'</strong></div>');
							$(".gocover").fadeOut('slow');
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

$("#about_page_update").click(function() {

	$(".gocover").fadeIn('slow');
		
		$("#about_page").submit(function(go) {
		    
	        var postData = $('#about_page').serializeArray();
	        //var about = $("#about").val();
	        var formURL = $('#about_page').attr("action");

				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){ 
						if (response == "Success") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>About Page Content Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else{
							$("#res").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+response+'</strong></div>');
							$(".gocover").fadeOut('slow');
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

$("#faq_page_update").click(function() {

	$(".gocover").fadeIn('slow');
		
		$("#faq_page").submit(function(go) {
		    
	        var postData = $('#faq_page').serializeArray();
	        //var about = $("#about").val();
	        var formURL = $('#faq_page').attr("action");

				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){ 
						if (response == "Success") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>FAQ Page Content Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else{
							$("#res").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+response+'</strong></div>');
							$(".gocover").fadeOut('slow');
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


$("#social_update").click(function() {

	$(".gocover").fadeIn('slow');
		
		$("#social_form").submit(function(go) {
		    
	        var postData = $('#social_form').serializeArray();
	        //var about = $("#about").val();
	        var formURL = $('#social_form').attr("action");

				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){ 
						if (response == "Success") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Social Links Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else{
							$("#res").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+response+'</strong></div>');
							$(".gocover").fadeOut('slow');
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


$("#scripts_update").click(function() {

	$(".gocover").fadeIn('slow');
		
		$("#scripts_form").submit(function(go) {
		    
	        var postData = $('#scripts_form').serializeArray();
	        //var about = $("#about").val();
	        var formURL = $('#scripts_form').attr("action");

				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){ 
						if (response == "f_comment") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Facebook Comment Script Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else if (response == "g_analytics") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Google Analytic Script Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else if (response == "meta_key") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Websites Meta Keywords Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else {
							$("#res").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+response+'</strong></div>');
							$(".gocover").fadeOut('slow');
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


$("#meta_update").click(function() {

	$(".gocover").fadeIn('slow');
		
		$("#meta_form").submit(function(go) {
		    
	        var postData = $('#meta_form').serializeArray();
	        //var about = $("#about").val();
	        var formURL = $('#meta_form').attr("action");

				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){ 
						if (response == "f_comment") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Facebook Comment Script Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else if (response == "g_analytics") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Google Analytic Script Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else if (response == "meta_key") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Websites Meta Keywords Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else {
							$("#res").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+response+'</strong></div>');
							$(".gocover").fadeOut('slow');
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


$("#website_update").click(function() {

	$(".gocover").fadeIn('slow');
		
		$("#website_form").submit(function(go) {
		    
	        var postData = $('#website_form').serializeArray();
	        //var about = $("#about").val();
	        var formURL = $('#website_form').attr("action");

				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){ 
						if (response == "Success") {
							$("#res").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Website Contents Updated.</strong></div>');
							$(".gocover").fadeOut('slow');
						}else{
							$("#res").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+response+'</strong></div>');
							$(".gocover").fadeOut('slow');
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


function UpdateImage() {
  $("#res").html("");
    $(".gocover").fadeIn('slow');
    $("#update_image").submit(function(go) {
    	
      var postData = new FormData(this);
      var formURL = $('#update_image').attr("action");

        $.ajax({
          	url: formURL,
          	contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			type: 'POST',
          	data: postData
        })
        .done(function(response) {
          setTimeout(function(){ 
          
              $("#res").html(response);
              $(".gocover").fadeOut('slow');
            
          }, 1000);
          
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      go.preventDefault();  //STOP default action
      go.unbind();

    });
}



function AwardImage() {
  $("#res").html("");
    $(".gocover").fadeIn('slow');
    $("#award_image").submit(function(go) {
    	
      var postData = new FormData(this);
      var formURL = $('#award_image').attr("action");

        $.ajax({
          	url: formURL,
          	contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			type: 'POST',
          	data: postData
        })
        .done(function(response) {
          setTimeout(function(){ 
          
              $("#res").html(response);
              $(".gocover").fadeOut('slow');
            
          }, 1000);
          
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      go.preventDefault();  //STOP default action
      go.unbind();

    });
}





function UpdateLogo() {
  $("#res").html("");
    $(".gocover").fadeIn('slow');
    $("#update_form").submit(function(go) {

      var postData = new FormData(this);
      var formURL = $('#update_form').attr("action");

        $.ajax({
          	url: formURL,
          	contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			type: 'POST',
          	data: postData
        })
        .done(function(response) {
          setTimeout(function(){ 
          
              $("#res").html(response);
              $(".gocover").fadeOut('slow');
            
          }, 1000);
          
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      go.preventDefault();  //STOP default action
      go.unbind();

    });
}




