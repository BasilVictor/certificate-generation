<?php
/* Created by Basil Victor
*/
include("conn.php");
require_once("make_certificate.php");

if (empty($_GET))
{
    echo 'Sorry no such certificate found';
}
else
{
	$id = $_GET['id'];
	if($id !== '')
	{
		$sql = "SELECT * FROM participants WHERE id = '".$id."'";
		$res = mysqli_query($conn,$sql);

		if((mysqli_num_rows($res))==1)
		{
			while($row = mysqli_fetch_array($res)){
				/**
				$name = $row['name'];
				$school = $row['school'];
				$position = $row['position'];
				$event = $row['event'];
				**/
				if($row['position']!=='')
            	{
					$pdf = new Certificate();
					$pdf->makeCertificate($row['name'],$row['school'],$row['position'],$row['event'],$row['id'],1,"MERIT");
					$pdf->Output();
				}
				else
				{
					echo 'Sorry no such certificate found';
				}
			}
		}
		else
		{
			echo 'Sorry no such certificate found';
		}
	}
	else
	{
		echo 'Sorry no such certificate found';
	}
}
/**
$pdf = new FPDF();
$pdf->AddFont('BirdsOfParadise','','birdsOfParadise.php');
$pdf->AddFont('ChampagneAndLimousines','','ChampagneAndLimousines.php');
$pdf->AddPage('L');
$pdf->SetFont('ChampagneAndLimousines','',45);
$pdf->Image('imgs/certif.jpg',0,0,297,210);
$pdf->Ln(62);
$pdf->Cell(0,0,"CERTIFICATE OF MERIT",0,1,'C');
//$pdf->Write(10,'CERTIFICATE OF MERIT');
$pdf->Ln(15);
$pdf->SetFont('BirdsOfParadise','',40);
$pdf->Multicell(0,17,"This is to certify that\n{$name}\nof {$school}\nhas been placed {$position} in\n{$event}",0,'C');
//To center:- QRCode (Pg. Width - Image Width)/2 = (297-30)/2
$pdf->Image('http://localhost/chriz2019/generate_qr.php?id='.$id,133.5,167,30,30,"png");
$pdf->Output();**/
?>
