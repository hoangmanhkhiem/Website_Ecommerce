
$("#add_button").click(function() {
	$("#response").html("");
	$(".gocover").fadeIn('slow');
		
		$("#add_form").submit(function(go) {
		    
	        var postData = $('#add_form').serializeArray();
	        var formURL = $('#add_form').attr("action");

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


$("#add_ads").click(function() {
$("#response").html("");
	$(".gocover").fadeIn('slow');
		
		$("#add_form").submit(function(go) {
		    
	        var postData = $('#add_form').serializeArray();
	        var formURL = $('#add_form').attr("action");

				$.ajax({
					url: formURL,
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					type: 'POST',
					data: new FormData(this)
				})
				.done(function(response) {
					setTimeout(function(){ 
							$("#response").html(response);
							$(".gocover").fadeOut('slow');
							$('#add_form').reset();
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



function AddMedia() {
		$(".gocover").show();
		$('.bs-example-modal-lg').modal('toggle');
		$("#upload_form").submit(function(go) {
		    
	        //var postData = $('#upload_form').serializeArray();
	        var formURL = $('#upload_form').attr("action");
				$.ajax({
					url: formURL,
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					type: 'POST',
					data: new FormData(this)
				})
				.done(function(response) {
					setTimeout(function(){
							$("#imgSrcVal").val(response);
							$('#imageView').html("<img src='assets/images/"+response+"' style='border: 1px solid black; height: 100px;width: 160px;' id='imagesrc'>");
							$(".gocover").fadeOut('slow');
							$('#preview').attr('src','');
							$('#uploadFile').val("");
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


}

