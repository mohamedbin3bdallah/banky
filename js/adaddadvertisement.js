$(document).ready(function(){
	$("#uid").change(function() {
		var id = $(this).val();
		$.ajax({
			type:'POST',
			//data:dataString,
			data: {	
			'id': id,
			},
			url:'ajaxs/userplans.php',
			success: function (response) {
				if(response != 0) document.getElementById("plan").innerHTML = response;
				else document.getElementById("plan").innerHTML = '';
			}
		});
	});
});

$(document).ready(function(){
	$("#category").change(function() {
		var val = $(this).val();
		$.ajax({
		type:'POST',
		//data:dataString,
		data: {	
		'val': val,
		},
		url:'ajaxs/categoryadinput.php',
		success: function (response) { document.getElementById("jsadvertisement").innerHTML = response; }
		});		
	});
});