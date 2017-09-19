<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Virtual Pet</title>
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>

<div align="center">
<h1>世界でどこまで走ったか</h1>
</div>

<?php
	require("function.php");

	$id = $_GET["id"];

	$name = getname($id);
	$distance = getdist($id);
?>

<div align="center">
今まで<?php echo $name ?>さんの走った距離は<?php echo $distance ?> km です
</div>

<div align="center">
<img src="marge.php" width="80%" height="80%" margin="auto" />
</div>

<?php
	$pekin = 2100;
	$indo = 4150;
	$itaria = 6600;
	$igirisu = 1900;
	$america = 6800;
	$nihon = 10000;

	$path = realpath(dirname(__FILE__));
	$x_path = $path . "/x.txt";
	$y_path = $path . "/y.txt";
	$fp_x = fopen($x_path,'w');
	$fp_y = fopen($y_path,'w');

	if($distance < $pekin)
	{
		$remain = $pekin - $distance;
		echo <<< EOM
		<div align="center">
			<h3>日本から中国まで残り{$remain} km です</h3>
		</div>
EOM;
		if($remain < 200)
		{
			$x = 500;
			$y = 145;
		}
		else if($remain < 1900)
		{
			$x = 595;
			$y = 130;
		}
		else if($remain >= 1900)
		{
			$x = 615;
			$y = 130;
		}

	}
	else if($distance < $indo + $pekin)
	{
		$remain = $indo + $pekin - $distance;
		echo <<< EOM
		<div align="center">
			<h3>中国からインドまで残り{$remain} km です</h3>
		</div>
EOM;
		if($remain < 500)
		{
			$x = 500;
			$y = 145;
		}
		else if($remain < 3500)
		{
			$x = 540;
			$y = 138;
		}
		else if($remain >= 3500)
		{
			$x = 577;
			$y = 130;
		}		
	}
	else if($distance < $indo + $pekin + $itaria)
	{
		$remain = $indo + $pekin + $itaria - $distance;
		echo <<< EOM
		<div align="center">
			<h3>インドからイタリアまで残り{$remain} km です</h3>
		</div>
EOM;
		if($remain < 1500)
		{
			$x = 377;
			$y = 118;
		}
		else if($remain < 5100)
		{
			$x = 430;
			$y = 132;
		}
		else if($remain >= 5100)
		{
			$x = 500;
			$y = 145;
		}
	}
	else if($distance < $indo + $pekin + $itaria + $igirisu)
	{
		$remain = $indo + $pekin + $itaria + $igirisu - $distance;
		echo <<< EOM
		<div align="center">
			<h3>イタリアからイギリスまで残り{$remain} km です</h3>
		</div>
EOM;
		if($remain < 200)
		{
			$x = 340;
			$y = 100;
		}
		else if($remain < 1700)
		{
			$x = 355;
			$y = 110;
		}
		else if($remain >= 1700)
		{
			$x = 377;
			$y = 118;
		}
	}
	else if($distance < $indo + $pekin + $itaria + $igirisu + $america)
	{
		$remain = $indo + $pekin + $itaria + $igirisu + $america - $distance;
		echo <<< EOM
		<div align="center">
			<h3>イギリスからアメリカまで残り{$remain} km です</h3>
		</div>
EOM;
		if($remain < 1500)
		{
			$x = 180;
			$y = 130;
		}
		else if($remain < 5300)
		{
			$x = 270;
			$y = 105;
		}
		else if($remain >= 5300)
		{
			$x = 340;
			$y = 100;
		}
	}
	else if($distance < $indo + $pekin + $itaria + $igirisu + $america + $nihon)
	{
		$remain = $indo + $pekin + $itaria + $igirisu + $america + $nihon - $distance;
		echo <<< EOM
		<div align="center">
			<h3>アメリカから日本まで残り{$remain} km です</h3>
		</div>
EOM;
		if($remain < 2000)
		{
			$x = 615;
			$y = 130;
		}
		else if($remain < 8000)
		{
			$x = 20;
			$y = 130;
		}
		else if($remain >= 8000)
		{
			$x = 180;
			$y = 130;
		}
	}

	fwrite($fp_x,$x);
	fwrite($fp_y,$y);
	fclose($fp_x);
	fclose($fp_y);
?>



  </body>
</html>
