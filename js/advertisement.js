var j = 0;

function mytimerdraw(i)
{
	document.getElementById("time").innerHTML = i;
	i = i - 1;
	j = 1000;
	if(i >= 0) setTimeout(function() { mytimerdraw(i); }, j);
	else
	{
		setTimeout(function() { 
			var adid = $("#adid").val();
			var viewid = $("#viewid").val();
			$("#time").hide();
			$.ajax({
				type:'POST',
				//data:dataString,
				data: {	
				'adid': adid,
				'viewid': viewid,
				},
				url:'ajaxs/addview.php',
				success: function (response) { $("#time").show(); document.getElementById("time").innerHTML = response; }
			});
		}, j);
	}
}

function mytimer(timer)
{	
	setTimeout(function() { mytimerdraw(timer); }, j);
}
