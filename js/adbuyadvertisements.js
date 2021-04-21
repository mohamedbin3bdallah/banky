$(document).ready(function(){
	$("#plan").change(function() {
		var plan = $('option:selected', this).attr('cost');
		var adnumber = $('#adnumber').val();
		var clicks = $('#clicks').val();
		document.getElementById("cost").innerHTML = plan*adnumber*clicks+' EGP';		
	});
});

$(document).ready(function(){
	$("#adnumber").keyup(function() {
		var plan = $('option:selected', '#plan').attr('cost');
		var adnumber = $(this).val();
		var clicks = $('#clicks').val();
		document.getElementById("cost").innerHTML = plan*adnumber*clicks+' EGP';
	});
});

$(document).ready(function(){
	$("#clicks").keyup(function() {
		var plan = $('option:selected', '#plan').attr('cost');
		var adnumber = $('#adnumber').val();
		var clicks = $(this).val();
		document.getElementById("cost").innerHTML = plan*adnumber*clicks+' EGP';		
	});
});

/*
$(document).ready(function(){
	$("#adnumber").change(function() {
		var plan = $('option:selected', '#plan').attr('cost');
		var adnumber = $(this).val();
		var admonths = $('#admonths').val();
		document.getElementById("cost").innerHTML = plan*adnumber*admonths+' EGP';
	});
});

$(document).ready(function(){
	$("#admonths").change(function() {
		var plan = $('option:selected', '#plan').attr('cost');
		var adnumber = $('#adnumber').val();
		var admonths = $(this).val();
		document.getElementById("cost").innerHTML = plan*adnumber*admonths+' EGP';		
	});
});*/