
function catdelete(id) {

		$(".gocover").show();
			
				$.ajax({
					url: "admin_process.php?act=catdelete",
					type: 'POST',
					data: {id:id}
				})
				.done(function(response) {
					setTimeout(function(){ 

							$("#response").html(response);
							$("#row"+id).remove();
												
							$(".gocover").fadeOut('slow');
						
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



}


function docdelete(id) {

		$(".gocover").show();
			
				$.ajax({
					url: "admin_process.php?act=docdelete",
					type: 'POST',
					data: {id:id}
				})
				.done(function(response) {
					setTimeout(function(){ 

							$("#response").html(response);
							$("#row"+id).remove();
												
							$(".gocover").fadeOut('slow');
						
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



}

function Updatecat() {
		$(".gocover").show();
		$('.bs-example-modal-lg').modal('toggle');
		$("#update_form").submit(function(go) {
		    
	        var postData = $('#update_form').serializeArray();
	        var formURL = $('#update_form').attr("action");
	        var cid = $("#cid").val();
	        var name = $("#name").val();
	        var pos = $("#position").val();
	        var slug = $("#slug").val();
				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){
					if (response == "position_exist") {
						$("#response").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>This Menu Position Already Have Category!</strong></div>');
						$(".gocover").fadeOut('slow');
					}else if (response == "name_exist") {
						$("#response").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>This Category Name Already Exist!</strong></div>');
						$(".gocover").fadeOut('slow');
					}else if (response == "slug_exist") {
						$("#response").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>This Category Slug Already Exist!</strong></div>');
						$(".gocover").fadeOut('slow');
					}else if (response == "Success") {
							$("#response").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Category Updated Successfully!</strong></div>');
							$("#name"+cid).html(name);
							$("#pos"+cid).html(pos);
							$("#slug"+cid).html(slug);
							
							$(".gocover").fadeOut('slow');
					}else{
							$("#response").html(response);
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


}


function catstatus(id,sts) {

		$(".gocover").show();
			var status = "Active";
			var action = "Deactive";
			var tst = "'deactive'";
			var option = '<a href="javascript:;" id="'+id+'" onclick="catstatus('+id+','+tst+')" class="btn btn-warning btn-xs"><i class="fa fa-times"></i> '+action+' </a>';
			if (sts != "active") {
				tst = "'active'";
				status = "Not Active";
				action = "Active";
				option = '<a href="javascript:;" id="'+id+'" onclick="catstatus('+id+','+tst+')" class="btn btn-primary btn-xs"><i class="fa fa-times"></i> '+action+' </a>';
			
			}
				$.ajax({
					url: "admin_process.php?act=catstatus",
					type: 'POST',
					data: {id:id,sts:sts}
				})
				.done(function(response) {
					setTimeout(function(){ 
							$("#response").html(response);
							$("#sts"+id).html(status);
							$("#stst"+id).html(option);						
							$(".gocover").fadeOut('slow');
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



}


function vdostatus(id,sts) {

		$(".gocover").show();
			var status = "Active";
			var action = "Deactive";
			var tst = "'deactive'";
			var option = '<a href="javascript:;" id="'+id+'" onclick="vdostatus('+id+','+tst+')" class="btn btn-warning btn-xs"><i class="fa fa-times"></i> '+action+' </a>';
			if (sts != "active") {
				tst = "'active'";
				status = "Not Active";
				action = "Active";
				option = '<a href="javascript:;" id="'+id+'" onclick="vdostatus('+id+','+tst+')" class="btn btn-primary btn-xs"><i class="fa fa-times"></i> '+action+' </a>';
			
			}
				$.ajax({
					url: "admin_process.php?act=vdostatus",
					type: 'POST',
					data: {id:id,sts:sts}
				})
				.done(function(response) {
					setTimeout(function(){ 
							$("#response").html(response);
							$("#sts"+id).html(status);
							$("#stst"+id).html(option);						
							$(".gocover").fadeOut('slow');
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



}


function sliderdelete(id) {

		$(".gocover").show();
			
				$.ajax({
					url: "admin_process.php?act=sliderdelete",
					type: 'POST',
					data: {id:id}
				})
				.done(function(response) {
					setTimeout(function(){ 

							$("#response").html(response);
							$("#row"+id).remove();
												
							$(".gocover").fadeOut('slow');
						
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



}


function vdodelete(id) {

		$(".gocover").show();
			
				$.ajax({
					url: "admin_process.php?act=vdodelete",
					type: 'POST',
					data: {id:id}
				})
				.done(function(response) {
					setTimeout(function(){ 

							$("#response").html(response);
							$("#row"+id).remove();
												
							$(".gocover").fadeOut('slow');
						
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



}


function staffremove(id) {

		$(".gocover").show();
			
				$.ajax({
					url: "admin_process.php?act=staffremove",
					type: 'POST',
					data: {id:id}
				})
				.done(function(response) {
					setTimeout(function(){ 

							$("#response").html(response);
							$("#row"+id).remove();
												
							$(".gocover").fadeOut('slow');
						
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



}



function newsstatus(id,sts) {

		$(".gocover").show();
			var status = "Published";
			var action = "Hide";
			var tst = "'0'";
			var option = '<a href="javascript:;" id="'+id+'" onclick="newsstatus('+id+','+tst+')" class="btn btn-warning btn-xs"><i class="fa fa-times"></i> '+action+' </a>';
			if (sts != "1") {
				tst = "'1'";
				status = "Unpublished";
				action = "Show";
				option = '<a href="javascript:;" id="'+id+'" onclick="newsstatus('+id+','+tst+')" class="btn btn-primary btn-xs"><i class="fa fa-times"></i> '+action+' </a>';
			
			}

				$.ajax({
					url: "admin_process.php?act=newsstatus",
					type: 'POST',
					data: {id:id,sts:sts}
				})
				.done(function(response) {
					setTimeout(function(){ 
							$("#response").html(response);
							$("#sts"+id).html(status);
							$("#stst"+id).html(option);						
							$(".gocover").fadeOut('slow');
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



}

function staffstatus(id,sts) {

		$(".gocover").show();
			var status = "Active";
			var action = "Deactive";
			var tst = "'0'";
			var option = '<a href="javascript:;" id="'+id+'" onclick="staffstatus('+id+','+tst+')" class="btn btn-warning btn-xs"><i class="fa fa-times"></i> '+action+' </a>';
			if (sts != "1") {
				tst = "'1'";
				status = "Not Active";
				action = "Active";
				option = '<a href="javascript:;" id="'+id+'" onclick="staffstatus('+id+','+tst+')" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> '+action+' </a>';
			
			}

				$.ajax({
					url: "admin_process.php?act=staffstatus",
					type: 'POST',
					data: {id:id,sts:sts}
				})
				.done(function(response) {
					setTimeout(function(){ 
							$("#response").html(response);
							$("#sts"+id).html(status);
							$("#stst"+id).html(option);						
							$(".gocover").fadeOut('slow');
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



}

function adstatus(id,sts) {

		$(".gocover").show();
			var status = "Active";
			var action = "Deactive";
			var tst = "'0'";
			var option = '<a href="javascript:;" id="'+id+'" onclick="staffstatus('+id+','+tst+')" class="btn btn-warning btn-xs"><i class="fa fa-times"></i> '+action+' </a>';
			if (sts != "1") {
				tst = "'1'";
				status = "Not Active";
				action = "Active";
				option = '<a href="javascript:;" id="'+id+'" onclick="staffstatus('+id+','+tst+')" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> '+action+' </a>';
			
			}

				$.ajax({
					url: "admin_process.php?act=adstatus",
					type: 'POST',
					data: {id:id,sts:sts}
				})
				.done(function(response) {
					setTimeout(function(){ 
							$("#response").html(response);
							$("#sts"+id).html(status);
							$("#stst"+id).html(option);						
							$(".gocover").fadeOut('slow');
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



}

function newsdelete(id) {

		$(".gocover").show();
			
				$.ajax({
					url: "admin_process.php?act=newsdelete",
					type: 'POST',
					data: {id:id}
				})
				.done(function(response) {
					setTimeout(function(){ 

							$("#response").html(response);
							$("#row"+id).remove();
												
							$(".gocover").fadeOut('slow');
						
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



}

function addelete(id) {

		$(".gocover").show();
			
				$.ajax({
					url: "admin_process.php?act=addelete",
					type: 'POST',
					data: {id:id}
				})
				.done(function(response) {
					setTimeout(function(){ 

							$("#response").html(response);
							$("#row"+id).remove();
												
							$(".gocover").fadeOut('slow');
						
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



}

$("#media_remove").click(function() {
		$(".gocover").show();
		var img = $("#imgsrc").val();
		var id = $("#imgid").val();
				$.ajax({
					url: "admin_process.php?act=media_remove",
					type: 'POST',
					data: {delete_file:img}
				})
				.done(function(response) {
					setTimeout(function(){ 
							$("#response").html(response);
							$("#"+id).remove();
							$("#imgsrc").val('');
							$("#imgid").val('');
							$("#preview").attr('src', '');
							$(".gocover").fadeOut('slow');
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



});


$("#upbtn").click(function() {
		$(".gocover").show();
		var img = $("#imageValue").val();
				$.ajax({
					url: "admin_process.php?act=upload_media",
					type: 'POST',
					data: {media:img}
				})
				.done(function(response) {
					setTimeout(function(){ 
							$("#response").html(response);
							$("#mediasrc").html("");
							$("#imageValue").val("");
							$("#load-media").load("admin_process.php?act=load_media");
							$(".gocover").fadeOut('slow');
					}, 1000);
					
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});



});


function Updatead() {
		$(".gocover").show();
		$('.bs-example-modal-lg').modal('toggle');
		$("#update_form").submit(function(go) {
		    
	        var postData = $('#update_form').serializeArray();
	        var formURL = $('#update_form').attr("action");
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
							location.reload();
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


}



function Updatestaff() {
		$(".gocover").show();
		$('.bs-example-modal-lg').modal('toggle');
		$("#update_form").submit(function(go) {
		    
	        var postData = $('#update_form').serializeArray();
	        var formURL = $('#update_form').attr("action");
	        var cid = $("#cid").val();
	        var name = $("#name").val();
	        var email = $("#email").val();
	        var user = $("#username").val();
	        var role = $("#role").val();
	        var phone = $("#phone").val();
				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){
					if (response == "name_exist") {
						$("#response").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>This Staff Username Already Exist!</strong></div>');
						$(".gocover").fadeOut('slow');
					}else if (response == "email_exist") {
						$("#response").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>This Staff Email Already Exist!</strong></div>');
						$(".gocover").fadeOut('slow');
					}else if (response == "Success") {
							$("#response").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Staff Updated Successfully!</strong></div>');
							$("#name"+cid).html(name);
							$("#eml"+cid).html(email);
							$("#rol"+cid).html(role);
							$("#usr"+cid).html(user);
							
							$(".gocover").fadeOut('slow');
					}else{
							$("#response").html(response);
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


}



function ProfUpdate() {
		$(".gocover").show();
		$('.bs-example-modal-lg').modal('toggle');
		$("#update_form").submit(function(go) {
		    
	        var postData = $('#update_form').serializeArray();
	        var formURL = $('#update_form').attr("action");
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



function UploadMedia() {
		$(".gocover").show();
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
							$("#response").html(response);
							$("#adminimg").attr('src', '');
							$(".gocover").fadeOut('slow');
							$("#load-media").load("admin_process.php?act=load_media");
							$('#uploadFile').val("");
							$('#uploadTrigger').html('<i class="fa fa-upload"></i> Add New Media');
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




function UpdateVideo() {
		$(".gocover").show();
		$('.bs-example-modal-lg').modal('toggle');
		$("#update_form").submit(function(go) {
		    
	        var postData = $('#update_form').serializeArray();
	        var formURL = $('#update_form').attr("action");
				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){
							$("#response").html(response);
							location.reload();
							$(".gocover").fadeOut('slow');
							$('#update_form').reset();
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





$("#update_button").click(function() {
	$("#response").html("");
		$(".gocover").fadeIn('slow');
		$("#update_form").submit(function(go) {
		    
	        var postData = $('#update_form').serialize();
	        var formURL = $('#update_form').attr("action");
				go.preventDefault();	//STOP default action
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

			
			go.unbind();

		});
});


$("#update_pass").click(function() {
	$("#response").html("");
		$(".gocover").fadeIn('slow');
		$("#update_form").submit(function(go) {
		    
	        var postData = $('#update_form').serialize();
	        var formURL = $('#update_form').attr("action");
				go.preventDefault();	//STOP default action
				$.ajax({
					url: formURL,
					type: 'POST',
					data: postData
				})
				.done(function(response) {
					setTimeout(function(){ 
						if (response == "Success") {
							$("#response").html('<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Password Changed Successfully!</strong></div>');
							$(".gocover").fadeOut('slow');
						}else{
							$("#response").html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+response+'</strong></div>');
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

			
			go.unbind();

		});
});






function Updateprofile() {
  $("#response").html("");
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

      go.preventDefault();  //STOP default action
      go.unbind();

    });
}


