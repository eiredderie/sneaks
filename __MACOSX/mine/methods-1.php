<?php
	session_start();

	function login($email, $password){
		
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";


		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = $conn->prepare("SELECT UserID FROM Users WHERE U_Email = ? AND U_Password = ?");
		$stmt->bind_param("ss",$email,md5($password));
		$stmt->execute();
		$stmt->bind_result($result);
		$stmt->fetch();

		$_SESSION['id']=$result;

		if($result>=1){
			$_SESSION['loginErr']="Login Successfully";
			header("Location:home.php");
		}
		else{
			//login
			$_SESSION['loginErr']="Incorrect Username and Password".$email." ".$password;
			header("Location:index.php");
		}

	}


	function signup($uname, $fname, $lname, $mname, $email, $pass, $contact, $address){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$pass=md5($pass);

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = $conn->prepare("SELECT UserID FROM Users WHERE U_Email = ? OR U_Username = ?");
		$stmt->bind_param("ss",$email,$uname);
		$stmt->execute();
		$stmt->bind_result($result);
		$stmt->fetch();

		if($result>=1){
			$_SESSION['signupErr']="Username/Email already used in another account.";
			header("Location:signup.php");
		}
		else{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbName = "sneaks";


			$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
			$stmt = $conn->prepare("INSERT INTO Users (U_FirstName, U_MiddleName, U_LastName, U_Username, U_Password, U_Email, U_Contact, U_AccountType, U_Address) 
				VALUES (?,?,?,?,?,?,?,?,?)");
			$type="buyer";
			$stmt->bind_param("sssssssss", $fname, $mname, $lname, $uname, md5($pass), $email, $contact, $type, $address);
			$stmt->execute();

			//CONFIRMATION FOR EMAIL TO BE ADDED

			$_SESSION['signupErr']="Sign Up Successful.";
			header("Location:home.php");
		}
	}


	//SORT

	function displayByIdAsc(){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = "SELECT * FROM items ORDER BY ItemID ASC"; 
		$result = mysqli_query($conn ,$stmt);

		while($row = $result->fetch_assoc()) {
			$ids[] = $row['ItemID'];
			$brands[] = $row['I_Brand'];
			$types[] = $row['I_Type'];
			$names[] = $row['I_Name'];
			$prices[] = $row['I_Prices'];
			$stocks[] = $row['I_Stock'];
			$images[] = $row['I_Image'];
		}
		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}


	function displayByIdDes(){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = "SELECT * FROM items ORDER BY ItemID DESC"; 
		$result = mysqli_query($conn ,$stmt);

		while($row = $result->fetch_assoc()) {
			$ids[] = $row['ItemID'];
			$brands[] = $row['I_Brand'];
			$types[] = $row['I_Type'];
			$names[] = $row['I_Name'];
			$prices[] = $row['I_Price'];
			$stocks[] = $row['I_Stock'];
			$images[] = $row['I_Image'];
		}
		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}


	function displayByBrandAsc(){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = "SELECT * FROM items ORDER BY I_Brand ASC"; 
		$result = mysqli_query($conn ,$stmt);

		while($row = $result->fetch_assoc()) {
			$ids[] = $row['ItemID'];
			$brands[] = $row['I_Brand'];
			$types[] = $row['I_Type'];
			$names[] = $row['I_Name'];
			$prices[] = $row['I_Prices'];
			$stocks[] = $row['I_Stock'];
			$images[] = $row['I_Image'];
		}
		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}


	function displayByBrandDes(){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = "SELECT * FROM items ORDER BY I_Brand DESC"; 
		$result = mysqli_query($conn ,$stmt);

		while($row = $result->fetch_assoc()) {
			$ids[] = $row['ItemID'];
			$brands[] = $row['I_Brand'];
			$types[] = $row['I_Type'];
			$names[] = $row['I_Name'];
			$prices[] = $row['I_Prices'];
			$stocks[] = $row['I_Stock'];
			$images[] = $row['I_Image'];
		}
		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}


	function displayByTypeAsc(){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = "SELECT * FROM items ORDER BY I_Type ASC"; 
		$result = mysqli_query($conn ,$stmt);

		while($row = $result->fetch_assoc()) {
			$ids[] = $row['ItemID'];
			$brands[] = $row['I_Brand'];
			$types[] = $row['I_Type'];
			$names[] = $row['I_Name'];
			$prices[] = $row['I_Prices'];
			$stocks[] = $row['I_Stock'];
			$images[] = $row['I_Image'];
		}
		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}


	function displayByTypeDes(){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = "SELECT * FROM items ORDER BY I_Type DESC"; 
		$result = mysqli_query($conn ,$stmt);

		while($row = $result->fetch_assoc()) {
			$ids[] = $row['ItemID'];
			$brands[] = $row['I_Brand'];
			$types[] = $row['I_Type'];
			$names[] = $row['I_Name'];
			$prices[] = $row['I_Prices'];
			$stocks[] = $row['I_Stock'];
			$images[] = $row['I_Image'];
		}
		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}

	function displayByNameAsc(){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = "SELECT * FROM items ORDER BY I_Name ASC"; 
		$result = mysqli_query($conn ,$stmt);

		while($row = $result->fetch_assoc()) {
			$ids[] = $row['ItemID'];
			$brands[] = $row['I_Brand'];
			$types[] = $row['I_Type'];
			$names[] = $row['I_Name'];
			$prices[] = $row['I_Prices'];
			$stocks[] = $row['I_Stock'];
			$images[] = $row['I_Image'];
		}
		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}


	function displayByNameDes(){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = "SELECT * FROM items ORDER BY I_Name DESC"; 
		$result = mysqli_query($conn ,$stmt);

		while($row = $result->fetch_assoc()) {
			$ids[] = $row['ItemID'];
			$brands[] = $row['I_Brand'];
			$types[] = $row['I_Type'];
			$names[] = $row['I_Name'];
			$prices[] = $row['I_Prices'];
			$stocks[] = $row['I_Stock'];
			$images[] = $row['I_Image'];
		}
		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}

	function displayByPriceAsc(){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = "SELECT * FROM items ORDER BY I_Price ASC"; 
		$result = mysqli_query($conn ,$stmt);

		while($row = $result->fetch_assoc()) {
			$ids[] = $row['ItemID'];
			$brands[] = $row['I_Brand'];
			$types[] = $row['I_Type'];
			$names[] = $row['I_Name'];
			$prices[] = $row['I_Prices'];
			$stocks[] = $row['I_Stock'];
			$images[] = $row['I_Image'];
		}
		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}


	function displayByPriceDes(){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = "SELECT * FROM items ORDER BY I_Price DESC"; 
		$result = mysqli_query($conn ,$stmt);

		while($row = $result->fetch_assoc()) {
			$ids[] = $row['ItemID'];
			$brands[] = $row['I_Brand'];
			$types[] = $row['I_Type'];
			$names[] = $row['I_Name'];
			$prices[] = $row['I_Prices'];
			$stocks[] = $row['I_Stock'];
			$images[] = $row['I_Image'];
		}
		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}

	function displayByStockAsc(){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = "SELECT * FROM items ORDER BY I_Stock ASC"; 
		$result = mysqli_query($conn ,$stmt);

		while($row = $result->fetch_assoc()) {
			$ids[] = $row['ItemID'];
			$brands[] = $row['I_Brand'];
			$types[] = $row['I_Type'];
			$names[] = $row['I_Name'];
			$prices[] = $row['I_Prices'];
			$stocks[] = $row['I_Stock'];
			$images[] = $row['I_Image'];
		}
		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}


	function displayByStockDes(){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = "SELECT * FROM items ORDER BY I_Stock DESC"; 
		$result = mysqli_query($conn ,$stmt);

		while($row = $result->fetch_assoc()) {
			$ids[] = $row['ItemID'];
			$brands[] = $row['I_Brand'];
			$types[] = $row['I_Type'];
			$names[] = $row['I_Name'];
			$prices[] = $row['I_Price'];
			$stocks[] = $row['I_Stock'];
			$images[] = $row['I_Image'];
		}
		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}

	//IDDISPLAY
	function displayItem($id){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName);
		$stmt = $conn->prepare("SELECT * FROM items WHERE ItemID = ?"); 
		$stmt->bind_param("s",$id);
		$stmt->execute();
		$stmt->bind_result($ids, $brands, $types, $names, $prices, $stocks, $images);
		$stmt->fetch();

		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}


?>
