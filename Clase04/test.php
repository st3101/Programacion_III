<?php 
use Mpdf\Mpdf;

require_once __DIR__ . '/vendor/autoload.php';


$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();

