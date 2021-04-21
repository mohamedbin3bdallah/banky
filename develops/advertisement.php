<?php
include('libs/advertisement.php');

if(isset($_GET['ad']) && $_GET['ad'] != '')
{
	//$where = 'where viewad = 0 and adid = '.$_GET['ad'].' and uid = '.$_SESSION['uid'];
	$data = getAllDataFromTable('viewadvertisements.createday as createday,viewadvertisements.viewad as viewad,advertisements.*,plans.timer as timer','viewadvertisements','inner join advertisements on viewadvertisements.adid = advertisements.id inner join userpayads on advertisements.plan = userpayads.id inner join plans on userpayads.planid = plans.id where viewadvertisements.id = '.$_GET['ad'],'');
	//if($data[0]['views'] < $data[0]['clicks'])
	//{
		//$check = checkUserTaskAd('viewadvertisements',$where);
		//if($check  == 1) addAdView($where,$_GET['ad'],$_SESSION['uid']);
	//}
	//else header('Location: ?c=advertisements');
}
else header('Location: ?c=advertisements');

?>