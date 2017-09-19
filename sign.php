<?php
	if(isset($_POST["btn_sign"]))
	{
		require('mysqlini.php');
		$servername = $db['host'];
		$dbname = $db['dbname'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db['user'], $db['pass']);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$userid = $_POST["userid"];
		$b_password = $_POST["password"];        
		$stmt = $conn->prepare("SELECT * FROM user WHERE 1 AND userid = '$userid'");
        $stmt->execute();
		while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
			$id = mb_convert_encoding($result['id'],"utf-8","auto");
			$username = mb_convert_encoding($result['username'],"utf-8","auto");
			$a_password = mb_convert_encoding($result['password'],"utf-8","auto");
		}
		if($b_password == $a_password)
		{
			header("Location:http://localhost/virtualpet/home.php?id=$id",true,301);
		}
		else
		{
			echo "IdかPasswordが間違っていますｓ";
		}
        print(json_encode(0));
    }
    catch(PDOException $e) {
        print(json_encode(-1));
    }


	}


	function FileInput($_filenumber,$_textfile)
	{
		$file = "data" . $_filenumber . ".txt";
		file_put_contents($file,$_textfile);
	}

?>
