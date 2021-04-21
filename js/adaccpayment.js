$(document).ready(function(){
	$(".acceptpayment").change(function() {
    if(this.checked) { 
		var id = $(this).attr('id');
		var user = $(this).attr('user');
		var number = $(this).attr('number');
		$.ajax({
			type:'POST',
			//data:dataString,
			data: {	
			'id': id,
			'user': user,
			'number': number,
			},
			url:'ajaxs/acceptpayment.php',
			success: function (response) {
				if(response == 1) { document.location.href = 'admin.php?c=adaccpayment'; }
				else $(".checkdelivered").removeAttr('checked');
			}
		});
	}
});
});