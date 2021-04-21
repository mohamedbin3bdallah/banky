<?php
include('libs/adspagead.php');
if(isset($_POST['adspageadsubmit']))
{
	unset($_POST['adspageadsubmit']);
	if(!empty($_FILES))
	{
		delTree('uploads/advertisement');
		if(upload_profile_picture()) header('Location: ?c=adspagead&message=m1');
		else header('Location: ?c=adspagead&message=m12');
	}
	else header('Location: ?c=adspagead&message=m5');
}
?>