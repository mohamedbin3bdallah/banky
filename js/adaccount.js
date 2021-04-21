$(document).ready(function(){
	$(".admindel").click(function() {
		var id = $(this).attr('id');		
		$("#admin-"+id).modal('show');
		
});
});

function deleteadmin(id)
{
	$.ajax({
		type:'POST',
		//data:dataString,
		data: {	
		'id': id,
		},
		url:'ajaxs/deleteadmin.php',
		success: function (response) { if(response == 1) { $("#tr-"+id).hide(); } else alert(response); }
	});
}