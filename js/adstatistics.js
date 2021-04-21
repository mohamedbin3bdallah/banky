$(document).ready(function(){
	$("#category").change(function() {
		var val = $(this).val();
		$.ajax({
		type:'POST',
		//data:dataString,
		data: {	
		'val': val,
		},
		url:'ajaxs/statisticstype.php',
		success: function (response) { document.getElementById("jsstatistics").innerHTML = response; }
	});
		
});
});