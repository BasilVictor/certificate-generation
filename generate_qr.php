<?php
require_once("phpqrcode/qrlib.php");
$id = $_GET['id'];
QRcode::png('localhost/certificate/certi.php?id='.$id);
?>