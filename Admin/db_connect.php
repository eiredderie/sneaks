<?php 
    $servername = 'localhost';
	$user = 'root';
	$pass = '';
    $db = 'sneaks';
    
    date_default_timezone_set('Asia/Manila');

	$conn = new mysqli($servername, $user, $pass, $db) or die("Unable to connect");

	function login($email, $password){
		
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM Users WHERE U_Email = ? AND U_Password = ? AND (U_AccountType = ? || U_AccountType = ?) AND U_Status = ?");
        $status = "ACTIVE";
        $encryptpass=md5($password);
        $type = "ADMIN";
        $type2 = "STAFF";
        $stmt->bind_param("sssss",$email, $encryptpass, $type, $type2, $status);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return json_encode(array('Error'=>0));
                $_SESSION['loginErr']="Incorrect Username and Password".$email." ".$password;
                return false;
            }
            else{
                while($row = $result->fetch_assoc()){
                    $_SESSION['execid'] = $row['UserID'];
                    $_SESSION['execfname'] = $row['U_FirstName'];
                    $_SESSION['execmname'] = $row['U_MiddleName'];
                    $_SESSION['execlname'] = $row['U_LastName'];
                    $_SESSION['execacctype'] = $row['U_AccountType'];
                    
                    $_SESSION['loginErr']="Login Successfully";
                }
                return true;
            }
        }
        else{
            $_SESSION['loginErr']="Server Not Available";
            return false;
        }
    }

    function getItems(){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM items");
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return array('Error'=>0);
            }
            else{
                while($row = $result->fetch_assoc()){
                    $returnarray[] = array(
                        $row['ItemID'], //0
                        $row['I_Brand'], //1
                        $row['I_Type'], //2
                        $row['I_Name'], //3
                        $row['I_Price'], //4
                        $row['I_Stock'], //5
                        $row['I_Image'], //6
                        $row['I_Gender'], //7
                        $row['I_Description'], //8
                        $row['I_Size'] //9
                    );
                }

                return $returnarray;
            }
        }
        else{
            return array('Error'=>1);
        }
    }

    function addItem($brand, $type, $name, $gender, $colors, $sizes, $description, $price, $stock, $imagename, $imagetmploc){
        $seperateitems = explode(',', $colors);
        $date = date("m/d/Y");

        if($imagename != NULL){
            $seperate = explode(".", $imagename);
            $filetype = end($seperate);
            $imagenamefinal = $brand . "_" . $name . "." . $filetype;
            $location = "products/" . $imagenamefinal;
            move_uploaded_file($imagetmploc, "../".$location);
        }

        for($a = 0 ;$a < sizeof($seperateitems); $a++){
            $namewithcolor = $name . " (" . $seperateitems[$a] . ")";
            $stmt = $GLOBALS['conn']->prepare("INSERT INTO items(I_Brand, I_Type, I_Gender, I_Name, I_Price, I_Stock, I_Size, 
                                            I_Image, I_Description, AddedDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
            $stmt->bind_param("ssssssssss", $brand, $type, $gender, $namewithcolor, $price, $stock, $sizes, $location, $description, $date);
            $stmt->execute();
        }
        
        for($b = 0 ;$b < sizeof($seperateitems); $b++){
            $log = $_SESSION['execfname'] . " " . $_SESSION['execlname'] . " Added Item " . $brand . " " . $name . " (" . $seperateitems[$b] . ")";
            activityLog($log, $_SESSION['execid']);
        }
        
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    function updateItem($itemid, $brand, $type, $gender, $name, $imagename, $imagetmploc, $price, $stock, $size, $description){
        if($imagename != NULL || $imagename != ""){
            $seperate = explode(".", $imagename);
            $filetype = end($seperate);
            $imagenamefinal = $brand . "_" . $name . "." . $filetype;
            $location = "products/" . $imagenamefinal;
            move_uploaded_file($imagetmploc, $location);
            
            $stmt = $GLOBALS['conn']->prepare("UPDATE items SET I_Brand = ?, I_Type = ?, I_Gender = ?, I_Name = ?, I_Image = ?,
            I_Price = ?, I_Stock = ?, I_Size = ?, I_Description = ? WHERE ItemID = ?");

            $stmt->bind_param("sssssiissi", $brand, $type, $gender, $name, $location, $price, $stock, $size, $description, $itemid);
            $stmt->execute();
        }
        else{
            $stmt = $GLOBALS['conn']->prepare("UPDATE items SET I_Brand = ?, I_Type = ?, I_Gender = ?, I_Name = ?, 
            I_Price = ?, I_Stock = ?, I_Size = ?, I_Description = ? WHERE ItemID = ?");
    
            $stmt->bind_param("ssssiissi", $brand, $type, $gender, $name, $price, $stock, $size, $description, $itemid);
            $stmt->execute();
        }
    }

    function getOrders(){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM orders");
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return array('Error'=>0);
            }
            else{
                while($row = $result->fetch_assoc()){
                    $returnarray[] = array(
                        $row['OrderID'], //0
                        $row['Date'], //1
                        $row['Time'], //2
                        $row['Items'], //3
                        $row['Total'], //4
                        $row['Status'], //5
                        $row['Contact'], //6
                        $row['Email'], //7
                        $row['PaymentOption'], //8
                        $row['Address'] //9
                    );
                }
                return $returnarray;
            }
        }
        else{
            return array('Error'=>1);
        }
    }

    function getItem($itemid){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM items WHERE ItemID=?");
        $stmt->bind_param("i", $itemid);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return array('Error'=>0);
            }
            else{
                return $result->fetch_assoc();
            }
        }
        else{
            return array('Error'=>1);
        }
        
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    function activityLog($activity, $userid){
        $date = date("M d, Y");
        $time = date("g:ia");

        $stmt = $GLOBALS['conn']->prepare("INSERT INTO activitylogs(UserID, Date, Time, Activity) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $userid, $date, $time, $activity);
        $stmt->execute();
    }

    function getUsers(){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM users WHERE U_AccountType = ?");
        $acc = "USER";
        $stmt->bind_param("s", $acc);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return array('Error'=>0);
            }
            else{
                while($row = $result->fetch_assoc()){
                    $returnarray[] = array(
                        $row['UserID'], //0
                        $row['U_FirstName'], //1
                        $row['U_LastName'], //2
                        $row['U_MiddleName'], //3
                        $row['U_Email'], //4
                        $row['U_AccountType'], //5
                        $row['U_Address'], //6
                        $row['U_Status'], //7
                        $row['U_Contact'], //8
                    );
                }
                return $returnarray;
            }
        }
        else{
            return array('Error'=>1);
        }
    }

    function getStaff(){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM users WHERE U_AccountType = ?");
        $acc = "STAFF";
        $stmt->bind_param("s", $acc);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return array('Error'=>0);
            }
            else{
                while($row = $result->fetch_assoc()){
                    $returnarray[] = array(
                        $row['UserID'], //0
                        $row['U_FirstName'], //1
                        $row['U_LastName'], //2
                        $row['U_MiddleName'], //3
                        $row['U_Email'], //4
                        $row['U_AccountType'], //5
                        $row['U_Address'], //6
                        $row['U_Status'], //7
                        $row['U_Contact'], //8
                    );
                }
                return $returnarray;
            }
        }
        else{
            return array('Error'=>1);
        }
    }

    function getLogs(){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM activitylogs");
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return array('Error'=>0);
            }
            else{
                while($row = $result->fetch_assoc()){
                    $returnarray[] = array(
                        $row['ID'], //0
                        $row['UserID'], //1
                        $row['Date'], //2
                        $row['Time'], //3
                        $row['Activity'], //4
                    );
                }
                return $returnarray;
            }
        }
        else{
            return array('Error'=>1);
        }
    }

    function getLogsIDFilter($userid){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM activitylogs WHERE UserID = ? AND Activity LIKE '%Added%'");
        $stmt->bind_param("i", $userid);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return array('Error'=>0);
            }
            else{
                while($row = $result->fetch_assoc()){
                    $returnarray[] = array(
                        $row['ID'], //0
                        $row['UserID'], //1
                        $row['Date'], //2
                        $row['Time'], //3
                        $row['Activity'], //4
                    );
                }
                return $returnarray;
            }
        }
        else{
            return array('Error'=>1);
        }
    }

    function getUserDetails($userid){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM users WHERE UserID=?");
        $stmt->bind_param("i", $userid);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return array('Error'=>0);
            }
            else{
                return $result->fetch_assoc();
            }
        }
        else{
            return array('Error'=>1);
        }
        
        $stmt->close();
        $GLOBALS['conn']->close();
    }
    
    function addStaff($fname, $mname, $lname, $email, $contact, $address){
        $stmt = $GLOBALS['conn']->prepare("INSERT INTO users(U_FirstName, U_MiddleName, U_LastName, U_Password, U_Email, U_Contact, U_AccountType, U_Address, U_Status) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $acctype = "STAFF";
        $status = "ACTIVE";
        $password = md5("1234");
        $stmt->bind_param("sssssssss", $fname, $mname, $lname, $password, $email, $contact, $acctype, $address, $status);

        $stmt->execute();
        $log = $_SESSION['execfname'] . " " . $_SESSION['execlname'] . " Added Staff " . $fname . " " . $lname;
        activityLog($log, $_SESSION['execid']);

        //$stmt->close();
        //$GLOBALS['conn']->close();
    }

    function cancelOrder($orderid){
        $stmt = $GLOBALS['conn']->prepare("UPDATE orders SET Status = ? WHERE OrderID = ?");
        $status = "CANCELLED";
        $stmt->bind_param("ss", $status, $orderid);

        return $stmt->execute();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    function confirmOrder($orderid){
        $stmt = $GLOBALS['conn']->prepare("UPDATE orders SET Status = ? WHERE OrderID = ?");
        $status = "CONFIRMED";
        $stmt->bind_param("ss", $status, $orderid);

        return $stmt->execute();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    function deliverOrder($orderid){
        $stmt = $GLOBALS['conn']->prepare("UPDATE orders SET Status = ? WHERE OrderID = ?");
        $status = "BEING DELIVERED";
        $stmt->bind_param("ss", $status, $orderid);

        return $stmt->execute();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    function finishOrder($orderid){
        $stmt = $GLOBALS['conn']->prepare("UPDATE orders SET Status = ? WHERE OrderID = ?");
        $status = "FINISHED";
        $stmt->bind_param("ss", $status, $orderid);

        return $stmt->execute();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    function deactivateUser($userid){
        $stmt = $GLOBALS['conn']->prepare("UPDATE users SET U_Status = ? WHERE UserID = ?");
        $status = "DEACTIVATED";
        $stmt->bind_param("ss", $status, $userid);

        return $stmt->execute();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    function activateUser($userid){
        $stmt = $GLOBALS['conn']->prepare("UPDATE users SET U_Status = ? WHERE UserID = ?");
        $status = "ACTIVE";
        $stmt->bind_param("ss", $status, $userid);

        return $stmt->execute();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    function deleteItem($itemid){
        $stmt = $GLOBALS['conn']->prepare("DELETE FROM items WHERE ItemID = ?");
        $stmt->bind_param("s", $itemid);

        return $stmt->execute();
        $stmt->close();
        $GLOBALS['conn']->close();
    }
?>