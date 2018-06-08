<?php
	require_once('mysqli_connect.php');
	session_start();

	function login($email, $password){
		
		$stmt = $conn->prepare("SELECT U_Username, U_FirstName, U_MiddleName, U_LastName FROM Users WHERE U_Email = ? AND U_Password = ?");
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

	function displaySort($column, $order){
		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbName = "sneaks";

		$conn = new mysqli ($servername, $username, $dbpassword, $dbName) or die("Could not connect to MySQL".mysqli_connect_error());

		$stmt = "SELECT * FROM items ORDER BY ".$column." ".$order; 
		$result = @mysqli_query($conn ,$stmt);

		while($row = mysqli_fetch_array($result)) {
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

		$stmt = $conn->prepare("SELECT * FROM items WHERE ItemID = ?"); 
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$stmt->bind_result($ids, $brands, $types, $names, $prices, $stocks, $images);
		$stmt->fetch();

		return array($ids, $brands, $types, $names, $prices, $stocks, $images);
	}
?>
