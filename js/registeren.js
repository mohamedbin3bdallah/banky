	$(document).ready(function(){
		$("#advertiser").change(function(){
			if(this.checked) {
				$("#referral").val(' ');
				$("#referral").attr('disabled', 'true');
			}
			else
			{
				$("#referral").removeAttr("disabled");
			}
		});
	});
  
  $(document).ready(function () {
    $('#valcode').bind('copy paste', function (e) {
       e.preventDefault();
    });
	$('#scode').bind('copy paste', function (e) {
       e.preventDefault();
    });
  });	
	
	$(document).ready(function(){
      $("#checkterms").click(function(){
		  if($("#email-hidden").val() == '1' && $("#birthdate-hidden").val() == '1' && $("#password-hidden").val() == '1' && $("#cmfpassword-hidden").val() == '1' && $("#valcode-hidden").val() == '1' && $("#checkterms").is(':checked')) $("#registersubmit").removeAttr("disabled");
		  else $("#registersubmit").attr('disabled', 'true');
		});
	});
	$(document).ready(function(){
      $("#username").focusout(function(){
      var val = $(this).val();
	  $("#username-validation").html('');
      $.ajax({
         type: 'POST',
         url: 'username-validation.php',
         data: {
            'username':val
         },
         success: function (response) {
            //document.getElementById("username-validation").innerHTML = response;
			if(response == '0')
			{
				$("#username").css("background-color", "#F5A9A9");
				$("#username-validation").css("color", "red");
				$("#username-validation").html('Enter Username');
				$("#username-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			/*else if(response == '1')
			{
				$("#username").css("background-color", "#F5A9A9");
				$("#username-validation").css("color", "red");
				$("#username-validation").html('Username must be characters');
				$("#username-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}*/
			else if(response == '2')
			{
				$("#username").css("background-color", "#F5A9A9");
				$("#username-validation").css("color", "red");
				$("#username-validation").html('Username must be 5 characters or more');
				$("#username-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '3')
			{
				$("#username").css("background-color", "#F5A9A9");
				$("#username-validation").css("color", "red");
				$("#username-validation").html('Username must be equal or less than 250 characters');
				$("#username-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '4')
			{
				$("#username").css("background-color", "#F5A9A9");
				$("#username-validation").css("color", "red");
				$("#username-validation").html('Username is not available');
				$("#username-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '5')
			{
				$("#username").css("background-color", "#81F781");
				$("#username-validation").css("color", "green");
				$("#username-validation").html('Username is available');
				$("#username-hidden").val('1');
				if($("#email-hidden").val() == '1' && $("#birthdate-hidden").val() == '1' && $("#password-hidden").val() == '1' && $("#cmfpassword-hidden").val() == '1' && $("#valcode-hidden").val() == '1' && $("#checkterms").is(':checked')) $("#registersubmit").removeAttr("disabled");
			}
         }
      });
      });
	});
	
	$(document).ready(function(){
      $("#email").focusout(function(){
      var val = $(this).val();
	  $("#email-validation").html('');
      $.ajax({
         type: 'POST',
         url: 'email-validation.php',
         data: {
            'email':val
         },
         success: function (response) {
            //document.getElementById("email-validation").innerHTML = response;
			if(response == '0')
			{
				$("#email").css("background-color", "#F5A9A9");
				$("#email-validation").css("color", "red");
				$("#email-validation").html('Enter email');
				$("#email-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '1')
			{
				$("#email").css("background-color", "#F5A9A9");
				$("#email-validation").css("color", "red");
				$("#email-validation").html('Email must be Valid');
				$("#email-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '2')
			{
				$("#email").css("background-color", "#F5A9A9");
				$("#email-validation").css("color", "red");
				$("#email-validation").html('Email is Exist');
				$("#email-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			/*else if(response == '3')
			{
				$("#email").css("background-color", "#F5A9A9");
				$("#email-validation").css("color", "red");
				$("#email-validation").html('email must be 250 characters or less');
				$("#email-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '4')
			{
				$("#email").css("background-color", "#F5A9A9");
				$("#email-validation").css("color", "red");
				$("#email-validation").html('الاسم غير متاح');
				$("#email-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}*/
			else if(response == '5')
			{
				$("#email").css("background-color", "#81F781");
				$("#email-validation").css("color", "green");
				$("#email-validation").html('Email is available');
				$("#email-hidden").val('1');
				if($("#username-hidden").val() == '1' && $("#birthdate-hidden").val() == '1' && $("#password-hidden").val() == '1' && $("#cmfpassword-hidden").val() == '1' && $("#valcode-hidden").val() == '1' && $("#checkterms").is(':checked')) $("#registersubmit").removeAttr("disabled");
			}
         }
      });
      });
	});
	
	$(document).ready(function(){
      $("#birthdate").change(function(){
      var val = $(this).val();
	  $("#birthdate-validation").html('');
      $.ajax({
         type: 'POST',
         url: 'birthdate-validation.php',
         data: {
            'birthdate':val
         },
         success: function (response) {
            //document.getElementById("birthdate-validation").innerHTML = response;
			if(response == '0')
			{
				$("#birthdate").css("background-color", "#F5A9A9");
				$("#birthdate-validation").css("color", "red");
				$("#birthdate-validation").html('Enter YOur Birthday');
				$("#birthdate-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '1')
			{
				$("#birthdate").css("background-color", "#F5A9A9");
				$("#birthdate-validation").css("color", "red");
				$("#birthdate-validation").html('Birth year must be More than 1950');
				$("#birthdate-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '2')
			{
				$("#birthdate").css("background-color", "#F5A9A9");
				$("#birthdate-validation").css("color", "red");
				$("#birthdate-validation").html('Birth year must be Less than one year from now');
				$("#birthdate-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			/*else if(response == '3')
			{
				$("#birthdate").css("background-color", "#F5A9A9");
				$("#birthdate-validation").css("color", "red");
				$("#birthdate-validation").html('email must be 250 characters or less');
				$("#birthdate-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '4')
			{
				$("#birthdate").css("background-color", "#F5A9A9");
				$("#birthdate-validation").css("color", "red");
				$("#birthdate-validation").html('الاسم غير متاح');
				$("#birthdate-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}*/
			else if(response == '5')
			{
				$("#birthdate").css("background-color", "#81F781");
				$("#birthdate-validation").css("color", "green");
				$("#birthdate-validation").html('Email is available');
				$("#birthdate-hidden").val('1');
				if($("#username-hidden").val() == '1' && $("#email-hidden").val() == '1' && $("#password-hidden").val() == '1' && $("#cmfpassword-hidden").val() == '1' && $("#valcode-hidden").val() == '1' && $("#checkterms").is(':checked')) $("#registersubmit").removeAttr("disabled");
			}
         }
      });
      });
	});
	
	$(document).ready(function(){
      $("#password").focusout(function(){
      var val1 = $(this).val();
	  var val2 = $("#cmfpassword").val();
	  $("#password-validation").html('');
      $.ajax({
         type: 'POST',
         url: 'password-validation.php',
         data: {
            'password':val1,
			'cmfpassword':val2,
         },
         success: function (response) {
            //document.getElementById("password-validation").innerHTML = response;
			if(response == '0')
			{
				$("#password").css("background-color", "#F5A9A9");
				$("#password-validation").css("color", "red");
				$("#password-validation").html('Enter Password');
				$("#password-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			/*else if(response == '1')
			{
				$("#password").css("background-color", "#F5A9A9");
				$("#password-validation").css("color", "red");
				$("#password-validation").html('اسم الموقع يجب ان يكون بالحروف الصغيرة باللغة الانجليزية وبدون مسافات');
				$("#password-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}*/
			else if(response == '2')
			{
				$("#password").css("background-color", "#F5A9A9");
				$("#password-validation").css("color", "red");
				$("#password-validation").html('Password must be 8 characters or more');
				$("#password-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '3')
			{
				$("#password").css("background-color", "#F5A9A9");
				$("#password-validation").css("color", "red");
				$("#password-validation").html('Password must be 250 characters or less');
				$("#password-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '4')
			{
				$("#password").css("background-color", "#F5A9A9");
				$("#password-validation").css("color", "red");
				$("#password-validation").html('The 2 password are not equals');
				$("#password-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '5')
			{
				$("#password").css("background-color", "#81F781");
				$("#password-validation").css("color", "green");
				$("#password-validation").html('Password is available');
				$("#password-hidden").val('1');
				if($("#username-hidden").val() == '1' && $("#email-hidden").val() == '1' && $("#birthdate-hidden").val() == '1' && $("#cmfpassword-hidden").val() == '1' && $("#valcode-hidden").val() == '1' && $("#checkterms").is(':checked')) $("#registersubmit").removeAttr("disabled");
			}
         }
      });
      });
	});
	
	$(document).ready(function(){
      $("#cmfpassword").focusout(function(){
      var val1 = $(this).val();
	  var val2 = $("#password").val();
	  $("#cmfpassword-validation").html('');
      $.ajax({
         type: 'POST',
         url: 'cmfpassword-validation.php',
         data: {
            'cmfpassword':val1,
			'password':val2,
         },
         success: function (response) {
            //document.getElementById("cmfpassword-validation").innerHTML = response;
			if(response == '0')
			{
				$("#cmfpassword").css("background-color", "#F5A9A9");
				$("#cmfpassword-validation").css("color", "red");
				$("#cmfpassword-validation").html('Enter Password comfirmation');
				$("#cmfpassword-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			/*else if(response == '1')
			{
				$("#cmfpassword").css("background-color", "#F5A9A9");
				$("#cmfpassword-validation").css("color", "red");
				$("#cmfpassword-validation").html('اسم الموقع يجب ان يكون بالحروف الصغيرة باللغة الانجليزية وبدون مسافات');
				$("#cmfpassword-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '2')
			{
				$("#cmfpassword").css("background-color", "#F5A9A9");
				$("#cmfpassword-validation").css("color", "red");
				$("#cmfpassword-validation").html('عدد حروف كلمة المرور يجب ان تكون 8 احرف فما فوق');
				$("#cmfpassword-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '3')
			{
				$("#cmfpassword").css("background-color", "#F5A9A9");
				$("#cmfpassword-validation").css("color", "red");
				$("#cmfpassword-validation").html('يجب ان يكون عدد الحروف اقل من 250');
				$("#cmfpassword-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}*/
			else if(response == '4')
			{
				$("#cmfpassword").css("background-color", "#F5A9A9");
				$("#cmfpassword-validation").css("color", "red");
				$("#cmfpassword-validation").html('The 2 password are not equals');
				$("#cmfpassword-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '5')
			{
				$("#cmfpassword").css("background-color", "#81F781");
				$("#cmfpassword-validation").css("color", "green");
				$("#cmfpassword-validation").html('Password comfirmation is available');
				$("#cmfpassword-hidden").val('1');
				if($("#username-hidden").val() == '1' && $("#email-hidden").val() == '1' && $("#birthdate-hidden").val() == '1' && $("#password-hidden").val() == '1' && $("#valcode-hidden").val() == '1' && $("#checkterms").is(':checked')) $("#registersubmit").removeAttr("disabled");
			}
         }
      });
      });
	});

		$(document).ready(function(){
      $("#valcode").focusout(function(){
      var val = $(this).val();
	  var val2 = $("#scode").attr('value');
	  $("#valcode-validation").html('');
      $.ajax({
         type: 'POST',
         url: 'valcode-validation.php',
         data: {
            'valcode':val,
			'scode':val2,
         },
         success: function (response) {
            //document.getElementById("valcode-validation").innerHTML = response;
			if(response == '0')
			{
				$("#valcode").css("background-color", "#F5A9A9");
				$("#valcode-validation").css("color", "red");
				$("#valcode-validation").html('Enter the code');
				$("#valcode-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '1')
			{
				$("#valcode").css("background-color", "#F5A9A9");
				$("#valcode-validation").css("color", "red");
				$("#valcode-validation").html('Codes are not Matching');
				$("#valcode-hidden").val('0');
				$("#registersubmit").attr('disabled', 'true');
			}
			else if(response == '5')
			{
				$("#valcode").css("background-color", "#81F781");
				$("#valcode-validation").css("color", "green");
				$("#valcode-validation").html('Code is Valid');
				$("#valcode-hidden").val('1');
				if($("#username-hidden").val() == '1' && $("#email-hidden").val() == '1' && $("#birthdate-hidden").val() == '1' && $("#password-hidden").val() == '1' && $("#cmfpassword-hidden").val() == '1' && $("#checkterms").is(':checked')) $("#registersubmit").removeAttr("disabled");
			}
         }
      });
      });
	});

	$(document).ready(function(){
      $("#myusername").focusout(function(){
      var val = $(this).val();
	  $("#myusername-validation").html('');
      $.ajax({
         type: 'POST',
         url: 'myusername-validation.php',
         data: {
            'myusername':val
         },
         success: function (response) {
            //document.getElementById("myusername-validation").innerHTML = response;
			if(response == '0')
			{
				$("#myusername").css("background-color", "#F5A9A9");
				$("#myusername-validation").css("color", "red");
				$("#myusername-validation").html('Enter Username');
				$("#myusername-hidden").val('0');
				$("#loginsubmit").attr('disabled', 'true');
			}			
			else if(response == '5')
			{
				$("#myusername").css("background-color", "#81F781");
				$("#myusername-validation").css("color", "green");
				$("#myusername-validation").html('Username is available');
				$("#myusername-hidden").val('1');
				if($("#passw0rd-hidden").val() == '1') $("#loginsubmit").removeAttr("disabled");
			}
         }
      });
      });
	});
	
	$(document).ready(function(){
      $("#passw0rd").focusout(function(){
      var val = $(this).val();
	  $("#passw0rd-validation").html('');
      $.ajax({
         type: 'POST',
         url: 'passw0rd-validation.php',
         data: {
            'passw0rd':val,
         },
         success: function (response) {
            //document.getElementById("passw0rd-validation").innerHTML = response;
			if(response == '0')
			{
				$("#passw0rd").css("background-color", "#F5A9A9");
				$("#passw0rd-validation").css("color", "red");
				$("#passw0rd-validation").html('Enter Password');
				$("#passw0rd-hidden").val('0');
				$("#loginsubmit").attr('disabled', 'true');
			}
			else if(response == '5')
			{
				$("#passw0rd").css("background-color", "#81F781");
				$("#passw0rd-validation").css("color", "green");
				$("#passw0rd-validation").html('Password is available');
				$("#passw0rd-hidden").val('1');
				if($("#myusername-hidden").val() == '1') $("#loginsubmit").removeAttr("disabled");
			}
         }
      });
      });
	});