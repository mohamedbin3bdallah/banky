$(document).ready(function(){
	$(".plandel").click(function() {
		var id = $(this).attr('id');		
		$("#plan-"+id).modal('show');
		
});
});

function deleteplan(id)
{
	$.ajax({
		type:'POST',
		//data:dataString,
		data: {	
		'id': id,
		},
		url:'ajaxs/deleteplan.php',
		success: function (response) { if(response == 1) { $("#tr-"+id).hide(); } else alert(response); }
	});
}