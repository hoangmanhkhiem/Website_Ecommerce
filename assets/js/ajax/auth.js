function getBaseUrl() {
	var re = new RegExp(/^.*\//);
	return re.exec(window.location.href);
}


$(document).ready(function()
{
		
$("#sign-in").click(function()
{
	$("#form-signin").submit(function(e)
	{
		
	
		
		var main=$("#main");
					
					main.animate({
						scrollTop: 0
					}, 500);
		main.addClass("slideDown");		
					
		
		$("#msg").html("");
		$(".la-anim-10").addClass("la-animate");
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		
		
		
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{	
			
			
			
				if(data == ""){
						var role = $("#role").val();
     					
						$.notific8('Signing Successfull...',{ sticky:true, horizontalEdge:"top", theme:"theme-inverse" ,heading:"LOGIN SUCCESS"});

						//$('#form')[0].reset();
						window.location.href = getBaseUrl()+"dashboard.php";
						
						/*if(role == "Administrator"){
							window.location.href = getBaseUrl()+"admin_area.php";
						}
						else if(role == "reseller"){
							window.location.href = getBaseUrl()+"dashboard.html";
						}
						else if(role == "merchant"){
							window.location.href = getBaseUrl()+"user_panel.php";
						}*/
						
                    			
				}else{
				
					$.notific8(data,{ sticky:true, horizontalEdge:"top", theme:"theme" ,heading:"LOGIN ERROR"});
					main.removeClass("slideDown");		
		
				}
				
				
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	//STOP default action
	    e.unbind();
	});
		
	$("#form-signin").submit(); //SUBMIT FORM
});

});