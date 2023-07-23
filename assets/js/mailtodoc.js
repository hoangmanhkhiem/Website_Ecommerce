  
function myFunction() {
        $("#load").show();
setTimeout(function(){
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var message = document.getElementById("message");
   
    var namev = document.getElementById("name").value;
    var emailv = document.getElementById("email").value;
	var messagev = document.getElementById("message").value;
	var tov = document.getElementById("to").value;
	   
    if (name.checkValidity() == false) {
        document.getElementById("vname").innerHTML = "Please Enter a valid Name (Characters Only)";
        $("#load").hide();
    } else{

            document.getElementById("vname").innerHTML = "";
            $("#load").hide();
    } 

    if (email.checkValidity() == false) {
        document.getElementById("vemail").innerHTML = "Please Enter a valid Email";
        $("#load").hide();
    } else {
      
       document.getElementById("vemail").innerHTML = "";
       $("#load").hide();
    } 

    if (message.checkValidity() == false) {
        document.getElementById("vmessage").innerHTML = "Please write some Message";
        $("#load").hide();
    } else {
      
       document.getElementById("vmessage").innerHTML = "";
       $("#load").hide();
    } 

    

    if (name.checkValidity() != false && email.checkValidity() != false && message.checkValidity() != false) {


        $.post('includes/mailto.php', {to:tov, name: namev,email: emailv,message: messagev}, function(data, textStatus, xhr) {
            /*optional stuff to do after success */
            $("#name").val("");
            $("#email").val("");
            $("#message").val("");
			
           $("#submt").html("<h5 style='color:green;'>Your Message Submitted.</h5>");
	
        });

 		


    }

},2000);

} 



