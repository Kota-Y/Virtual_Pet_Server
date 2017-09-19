<?php
//	error_reporting(E_ALL & ~E_NOTICE);
	function getdist($_id)
	{
		require('mysqlini.php');
		$servername = $db['host'];
		$dbname = $db['dbname'];
		$id = $_id;
    try
	{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db['user'], $db['pass']);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);       
		$stmt = $conn->prepare("SELECT distance FROM rundist WHERE 1 AND id = '$id'");
        $stmt->execute();
		while($result = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$distance = mb_convert_encoding($result['distance'],"utf-8","auto");
		}
        return $distance;
    }
    catch(PDOException $e)
	{
        print(json_encode(-1));
    
	}
	}

	function getname($_id)
	{
		require('mysqlini.php');
		$servername = $db['host'];
		$dbname = $db['dbname'];
		$id = $_id;
    try
	{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db['user'], $db['pass']);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);       
		$stmt = $conn->prepare("SELECT username FROM user WHERE 1 AND id = '$id'");
        $stmt->execute();
		while($result = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$username = mb_convert_encoding($result['username'],"utf-8","auto");
		}
        return $username;
    }
    catch(PDOException $e)
	{
        print(json_encode(-1));
    
	}
	}
	
	function insertdist($_id,$_distance)
	{
		require('mysqlini.php');
		$servername = $db['host'];
		$dbname = $db['dbname'];
		$id = $_id;
		$distance = $_distance;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db['user'], $db['pass']);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("Insert Into rundist(id,distance) Values('$id','$distance')");
        $stmt->execute();
		return 0;
    }
    catch(PDOException $e) {
        print(json_encode(-1));
    }
	}

	function updatedist($_id,$_totaldist,$_beforedist)
	{
		require('mysqlini.php');
		$servername = $db['host'];
		$dbname = $db['dbname'];
		$id = $_id;
		$totaldist = $_totaldist;
		$beforedist = $_beforedist;
    try
	{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db['user'], $db['pass']);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);       
		$stmt = $conn->prepare("UPDATE rundist SET distance='$totaldist',beforedist='$beforedist' WHERE 1 AND id='$id'");
        $stmt->execute();

        return 0;
    }
    catch(PDOException $e)
	{
        print(json_encode(-1));
    
	}
	}

?>