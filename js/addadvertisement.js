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