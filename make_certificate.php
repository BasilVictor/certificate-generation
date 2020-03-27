<?php
require("FPDF/fpdf.php");
class Certificate extends FPDF
{
    function makeCertificate($name,$school,$position,$event,$id,$flag,$type)
    {
        $this->AddFont('BirdsOfParadise','','birdsOfParadise.php');
		$this->AddFont('ChampagneAndLimousines','','ChampagneAndLimousines.php');
		$this->AddPage('L');
		$this->SetFont('ChampagneAndLimousines','',45);
		//Image used only for initial layout setup, must be commented while printing
		if($flag==1)
			$this->Image('imgs/certif.jpg',0,0,297,210);
		$this->Ln(62);
		$this->Cell(0,0,"CERTIFICATE OF {$type}",0,1,'C');
		//$pdf->Write(10,'CERTIFICATE OF MERIT');
		$this->Ln(15);
		$this->SetFont('BirdsOfParadise','',40);
		if($type === "MERIT")
		{
			$this->Multicell(0,17,"This is to certify that\n{$name}\nof {$school}\nhas been placed {$position} in\n{$event}",0,'C');
			//To center:- QRCode (Pg. Width - Image Width)/2 = (297-30)/2
			$this->Image('http://localhost/chriz2019/generate_qr.php?id='.$id,133.5,167,30,30,"png");
		}
		else
		{
			$this->Multicell(0,17,"This is to certify that\n{$name}\nof {$school}\nhas participated in {$event}",0,'C');
		}
    }
}
?>