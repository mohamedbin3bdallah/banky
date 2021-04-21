$(document).ready(function(){
    $("#user").keyup(function(){
      var username = $(this).val();
      $.ajax({
         type: 'POST',
         url: 'ajaxs/users.php',
         data: {
            'username':username
         },
         success: function (response) {
			 document.getElementById("usersearch").innerHTML = response;
		 }
      });
    });
});

$(document).ready(function(){
	$(".del").click(function() {
		var id = $(this).attr('id');
		$("#del-"+id).modal('show');
	});
});