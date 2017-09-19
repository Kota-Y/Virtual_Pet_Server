<?php
	if(isset($_POST["btn_create"]))
	{
		require('mysqlini.php');
		$servername = $db['host'];
		$dbname = $db['dbname'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db['user'], $db['pass']);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("Insert Into user(userid,username,password) Values(:userid,:username,:password)");
        $stmt->bindParam(':userid', $_POST["userid"]);
        $stmt->bindParam(':username', $_POST["username"]);
        $stmt->bindParam(':password', $_POST["password"]);
        $stmt->execute();
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
