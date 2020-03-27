<?php
session_start();
set_time_limit(0);
$event_name = $_SESSION['event_name'];
$type = $_SESSION['type'];
$flag = 0;

if(((!isset($event_name)) || ($event_name === ""))){
   header("Location:certificate_home.php");
}

if(((!isset($type)) || ($type === ""))){
   header("Location:certificate_home.php");
}

include("conn.php");
require_once('make_certificate.php');

$sql = "SELECT * from participants WHERE event ='".$event_name."'";
$res = mysqli_query($conn,$sql);
$pdf = new Certificate();
while($row = mysqli_fetch_array($res)){
	if($type === "MERIT")
	{
		if($row['position'] !== '')
		{
			$pdf->makeCertificate($row['name'],$row['school'],$row['position'],$row['event'],$row['id'],0,$type);
			$flag = 1;
		}
	}
	else if($type === "PARTICIPATION")
	{
		$flag = 1;
		$pdf->makeCertificate($row['name'],$row['school'],$row['position'],$row['event'],$row['id'],0,$type);
	}
}
if($flag==1)
	$pdf->Output();
else
{
	echo "No certificate found";
}
session_destroy();
?>