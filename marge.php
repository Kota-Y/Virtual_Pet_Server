<?php
$x_flag = 375;
$y_flag = 80;
$angle = 0;

date_default_timezone_set('Asia/Tokyo');

$path = realpath(dirname(__FILE__));
$x_path = $path . "/x.txt";
$y_path = $path . "/y.txt";
$fp_x = fopen($x_path,'r');
$fp_y = fopen($y_path,'r');
$x_run = fgets($fp_x);
$y_run = fgets($fp_y);
fclose($fp_x);
fclose($fp_y);

$map = 'map.png';
$run = 'run.png';
$flag = 'flag.png';

$mapImg = imagecreatefromstring(file_get_contents($map));
$runImg = imagecreatefromstring(file_get_contents($run));
$flagImg = imagecreatefromstring(file_get_contents($flag));


list($width_run, $height_run) = getimagesize($run);
list($width_flag, $height_flag) = getimagesize($flag);


//$rotate = imagerotate($runImg, $angle, 0);

// マスの中央に雪だるまを配置
imagecopy($mapImg, $runImg, $x_run - $width_run / 2, $y_run - $height_run / 2, 0, 0, $width_run, $height_run);
//imagecopy($mapImg, $flagImg, $x_flag - $width_flag / 2, $y_flag - $height_flag / 2, 0, 0, $width_flag, $height_flag);



header('Content-Type: image/png');
imagepng($mapImg);
//readfile('worldmap.png');

imagedestroy($boardImg);


?>