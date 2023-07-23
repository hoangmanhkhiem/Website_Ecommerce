
$("#add_button").click(function() {
$("#response").html("");
	$(".gocover").fadeIn('slow');
		
		$("#add_form").submit(function(go) {
		    
	        var postData = $('#add_form').serialize();
	        //var about = $("#about").val();
	        var formURL = $('#add_form').attr("action");
	        // var title = $("#title").val();
	        // var title = $("#title").val();
	        // var title = $("#title").val();
	        // var title = $("#title").val();
	        // var title = $("#title").val();
	        // var title = $("#title").val();

				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){ 
					
							$("#response").html(response);
							$(".gocover").fadeOut('slow');
						
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

