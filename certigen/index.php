<?php 
	session_start();
	if (!isset($_SESSION['ldap']) || !isset($_POST['key']) || !isset($_POST['temp']) ){
		header("Location: ../index.php");
		exit();
	}
	if (isset($_SESSION['ldap']) && (!isset($_SESSION['gmail']) || !$_SESSION['phno'])) {
		header("Location: ../fill_details.php");
		exit();
	}
require('mem_image.php');

$pdf = new PDF_MemImage();
$pdf->AddPage('L','A4');
$temp=$_POST['temp'];
// echo $temp;
// Load an image from PNG URL 
//$createimage = imagecreatefrompng('analytics.png');
$createimage=imagecreatefromstring(file_get_contents($temp));
$output = "certificate.png"; 
$name=$_SESSION['name'];
$camp=$_POST['key'];
$black = imagecolorallocate($createimage, 48, 74, 119);
$blue = imagecolorallocate($createimage, 48, 74, 119);
$rotation = 0;
$origin_x = 330;
$origin_y=433;
$origin_x1 = 295;
$origin_y1=513;
$font_size = 20;
if($temp=='itc.jpg')
{
	$origin_x = 330;
	$origin_y=405;
	$origin_x1 = 295;
	$origin_y1=485;
}
$extra=10;
if($camp=='Machine Learning and Deep Learning Bootcamp' || $camp=='Scientific Computation and Mathematical Modelling Bootcamp'|| $camp=='Front-End Web Development Bootcamp'|| $camp=='Front-End and Back-End Web Development Bootcamp' )
{
	$extra=45;
}
$width1  = imagesx($createimage)/2;
$certificate_text = $name;
$drFont = dirname(__FILE__)."/font1.ttf";
$frFont = dirname(__FILE__)."/font3.ttf";
list($left,, $right) = imageftbbox( 20, 0, $frFont, $camp);
$width2=($right-$left)/2;
list($left,, $right) = imageftbbox( 30, 0, $drFont, $name);
$width3=($right-$left)/2;

$text1 = imagettftext($createimage, 30, $rotation, $width1-$width3, $origin_y, $blue, $frFont, $certificate_text);
$text2 = imagettftext($createimage, $font_size, $rotation, $width1-$width2-$extra, $origin_y1, $black, $drFont, $camp);
$width  = imagesx($createimage);
$height = imagesy($createimage);
$pdf->GDImage($createimage,0,0,300,210);
// View the loaded image in browser using imagepng() function 
// header('Content-type: image/png');
// imagepng($createimage);   
// imagepng($createimage); 
imagedestroy($createimage); 
$pdf->Output();
?> 
