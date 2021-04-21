	$(document).ready(function(){
      $("#myusername").keyup(function(){
      var val = $(this).val();
	  $("#myusername-validation").html('');
      $.ajax({
         type: 'POST',
         url: 'ajaxs/myusername-validation.php',
         data: {
            'myusername':val
         },
         success: function (response) {
            //document.getElementById("myusername-validation").innerHTML = response;
			if(response == '0')
			{
				$("#myusername").css("background-color", "#F5A9A9");
				$("#myusername-validation").css("color", "red");
				$("#myusername-validation").html('يجب ادخال الاسم كاملا');
				$("#myusername-hidden").val('0');
				$("#loginsubmit").attr('disabled', 'true');
			}			
			else if(response == '5')
			{
				$("#myusername").css("background-color", "#81F781");
				$("#myusername-validation").css("color", "green");
				$("#myusername-validation").html('الاسم متاح');
				$("#myusername-hidden").val('1');
				if($("#passw0rd-hidden").val() == '1') $("#loginsubmit").removeAttr("disabled");
			}
         }
      });
      });
	});
	
	$(document).ready(function(){
      $("#passw0rd").keyup(function(){
      var val = $(this).val();
	  $("#passw0rd-validation").html('');
      $.ajax({
         type: 'POST',
         url: 'ajaxs/passw0rd-validation.php',
         data: {
            'passw0rd':val,
         },
         success: function (response) {
            //document.getElementById("passw0rd-validation").innerHTML = response;
			if(response == '0')
			{
				$("#passw0rd").css("background-color", "#F5A9A9");
				$("#passw0rd-validation").css("color", "red");
				$("#passw0rd-validation").html('يجب ادخال كلمة المرور');
				$("#passw0rd-hidden").val('0');
				$("#loginsubmit").attr('disabled', 'true');
			}
			else if(response == '5')
			{
				$("#passw0rd").css("background-color", "#81F781");
				$("#passw0rd-validation").css("color", "green");
				$("#passw0rd-validation").html('كلمة المرور متاح');
				$("#passw0rd-hidden").val('1');
				if($("#myusername-hidden").val() == '1') $("#loginsubmit").removeAttr("disabled");
			}
         }
      });
      });
	});