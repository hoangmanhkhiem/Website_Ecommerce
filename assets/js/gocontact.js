(function($) {

  $.fn.goValidator = function(params) {  
    params = $.extend( {shaon: "pagol"}, params);
      alert(params.shaon);
  }

var number1 = 1 + Math.floor(Math.random() * 15);
var number2 = 1 + Math.floor(Math.random() * 15);
$("#number1").html(number1);
$("#number2").html(number2);



$("input[name='name']").on('input', function(event) {
 event.preventDefault();
  validateName($(this));
});

$("input[name='email']").on('input', function(event) {
   event.preventDefault();
   validateEmail($(this));
});

$("input[name='phone']").on('input', function(event) {
   event.preventDefault();
   validatePhone($(this));
});

$("[name='department']").on('change', function(event) {
   event.preventDefault();
   validateDepartment($(this));
});

$("[name='message']").on('input', function(event) {
   event.preventDefault();
   validateMessage($(this));
});

$("[name='capcha']").on('input', function(event) {
   event.preventDefault();
   validateCapcha($(this));
});

function validateName(name){
  if (name.val().length == 0) {
      $("#nameError").html("Name Cannot Be Empty.");
        name.addClass("error");
        return false;
  }else if(!validateNames(name.val())){  
        $("#nameError").html("Name must contain only characters");
        name.addClass("error");
        return false;
    }else{
        $("#nameError").html("");
        name.removeClass("error");
        return true;
    }
}

function validateCapcha(capcha){
  var num1 = parseInt($("#number1").html());
  var num2 = parseInt($("#number2").html());
  var sum = num1+num2;
  if (capcha.val().length == 0) {
      $("#capchaError").html("Capcha Cannot Be Empty.");
        capcha.addClass("error");
        return false;
  }else if(sum != capcha.val()){  
        $("#capchaError").html("Capcha is not valid.");
        capcha.addClass("error");
        return false;
    }else{
        $("#capchaError").html("");
        capcha.removeClass("error");
        return true;
    }
}

function validateDepartment(select){
  if (select.val().length == 0) {
      $("#departmentError").html("Please Select a Department.");
        select.addClass("error");
        return false;
  }else{
        $("#departmentError").html("");
        select.removeClass("error");
        return true;
    }
}

function validatePhone(phone){
  if (phone.val().length == 0) {
      $("#phoneError").html("Phone Cannot Be Empty.");
        phone.addClass("error");
        return false;
  }else if(!validatePhones(phone.val())){  
        $("#phoneError").html("Phone Number is invalid.");
        phone.addClass("error");
        return false;
    }else{
        $("#phoneError").html("");
        phone.removeClass("error");
        return true;
    }
}

function validateMessage(value){
  if (value.val().length == 0) {
      $("#messageError").html("Message is required.");
        value.addClass("error");
        return false;
  }else{
        $("#messageError").html("");
        value.removeClass("error");
        return true;
    }
}

var validateEmails = function(elementValue) {
  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(elementValue);
}

var validatePhones = function(elementValue) {
    var emailPattern = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/;
    return emailPattern.test(elementValue.replace(/\s/g, ''));
}
var validateNames = function(elementValue) {
    var namePattern = /^[a-zA-Z\s]+$/;
    return namePattern.test(elementValue);
}
var validateDepartments = function(elementValue) {
  if (elementValue.length == 0) {
    return false;
  }else{
    return true;
  }
}
var validateMessages = function(elementValue) {
  if (elementValue.length == 0) {
    return false;
  }else{
    return true;
  }
}

var validateCapchas = function(elementValue) {
  var num1 = parseInt($("#number1").html());
  var num2 = parseInt($("#number2").html());
  var sum = num1+num2;

  if (elementValue.length == 0) {
    return false;
  }else if(sum != elementValue){  
        return false;
  }else{
    return true;
  }
}


function validateEmail(email){

var vals = email.val();

  if (email.val().length == 0) {
      $("#emailError").html("Email Cannot Be Empty.");
        email.addClass("error");
        return false;
  }else if(!validateEmails(vals)){  
        $("#emailError").html("Email is not vald.");
        email.addClass("error");
        return false;
    }else{
        $("#emailError").html("");
        email.removeClass("error");
        return true;
    }
}

    $("#conatct").submit(function(event) {
      /* Act on the event */
      var name = $("input[name='name']").val();
      var email = $("input[name='email']").val();
      var phone = $("input[name='phone']").val();
      var depart = $("[name='department']").val();
      var message = $("[name='message']").val();
      var capcha = $("[name='capcha']").val();
      if (validateEmails(email) && validatePhones(phone) && validateNames(name) && validateDepartments(depart) && validateMessages(message) && validateCapchas(capcha)) {

      var data = $(this).serializeArray();
      var action = $(this).attr('action');

      $.ajax({
        url: action,
        type: 'POST',
        data: data,
      })
      .done(function(response) {
        console.log("success");
          $("#success_message").fadeIn('slow');
          $("#resp").html(response);
          $("input[name='name'], input[name='email'], input[name='phone'], [name='department'], [name='message'], [name='capcha']").val("");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    }else{
      validateName($("input[name='name']"));
      validateEmail($("input[name='email']"));
      validatePhone($("input[name='phone']"));
      validateDepartment($("[name='department']"));
      validateMessage($("[name='message']"));
      validateCapcha($("[name='capcha']"));
    }
      return false;
    
    });



})(jQuery);
