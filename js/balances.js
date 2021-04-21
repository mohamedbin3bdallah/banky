$(document).ready(function(){
	$(".deliveredcheck").change(function() {
    if(this.checked) { 
		var id = $(this).attr('id');
		var uid = $(this).attr('uid');
		$.ajax({
			type:'POST',
			//data:dataString,
			data: {	
			'id': id,
			'uid': uid,
			},
			url:'ajaxs/checkdelivered.php',
			success: function (response) {
				if(response == 1) { document.location.href = 'admin.php?c=balances&type=1&uid='+uid; }
				else $(".checkdelivered").removeAttr('checked');
			}
		});
	}
});
});