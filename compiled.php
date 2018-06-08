<?php 
	
	$servername = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'sneaks';

	$conn = new mysqli($servername, $user, $pass, $db) or die("Unable to connect");

	function login($email, $password){
		
        $stmt = $GLOBALS['conn']->prepare("SELECT UserID, U_FirstName, U_Email, U_LastName FROM Users WHERE U_Email = ? AND U_Password = ?");
        $encryptpass=md5($password);
        $stmt->bind_param("ss",$email, $encryptpass);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return json_encode(array('Error'=>0));
                $_SESSION['loginErr']="Incorrect Username and Password".$email." ".$password;
                return false;
            
            }
            else{
                
                while($row = $result->fetch_assoc()){
                    $_SESSION['id'] = $row['UserID'];
                    $_SESSION['fname'] = $row['U_FirstName'];
                    $_SESSION['lname'] = $row['U_LastName'];
                    $_SESSION['email'] = $row['U_Email'];
                    
                    $_SESSION['loginErr']="Login Successfully";
                    
                    activityLog($_SESSION['fname']." ". $_SESSION['lname']." User Logged In", $_SESSION['id']);
		
                }
                getAnonCart();
                foreach($_SESSION['cart'] as $cart){
                    addToCart($_SESSION['id'],$cart[0],$cart[2],$cart[3]); 
                }
                
                unset($_SESSION['cart']);
                return true;
            }
        }
        else{
            return false;
        }
}



function signup($uname, $email, $pass1, $pass2){
    $encrypt1=md5($pass1);
    $encrypt2=md5($pass2);

    $stmt = $GLOBALS['conn']->prepare("SELECT UserID FROM Users WHERE U_Email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($result);
    $stmt->fetch();
    if($encrypt1!=$encrypt2){
        $_SESSION['signupErr']="Passwords does not match. ";
        return false;
    }
    else if($result>=1){
        $_SESSION['signupErr']="Username/Email already used in another account.";
        return false;
    }
    else{
        $name=explode(" ",$uname);
        $fname=$name[0];
        $lname="";
        for($i=1;$i<count($name);$i++){
            if($i!=0){
                $lname.=$name[$i]." ";
            }
            else if($i=count($name)-1){
                $lname.=$name;
            }
        }
        $stmt = $GLOBALS['conn']->prepare("INSERT INTO Users (U_FirstName, U_LastName, U_Password, U_Email, U_AccountType) 
            VALUES (?,?,?,?,?)");
        $type="USER";
        $stmt->bind_param("sssss", $fname, $lname, $encrypt1, $email, $type);
        $stmt->execute();

        //CONFIRMATION FOR EMAIL TO BE ADDED

        $_SESSION['signupErr']="Sign Up Successful.";



        
        activityLog($_SESSION['email']." User Signed Up",$uname);
        return true;
    }
}


//DISPLAYS

function displayType($type){
    
    
    $stmt = $GLOBALS['conn']->prepare("SELECT * FROM items WHERE I_Type = ?");
    $stmt->bind_param("s", $type);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows === 0){
            return array();
        }
        else{
            while($row = $result->fetch_assoc()){
                $returnarray[] = array(
                    $row['ItemID'],
                    $row['I_Brand'],
                    $row['I_Type'],
                    $row['I_Name'],
                    $row['I_Price'],
                    $row['I_Stock'],
                    $row['I_Image'],
                    $row['I_Gender'],
                    $row['I_Description'],
                    $row['AddedDate']
                );
            }

            return $returnarray;
        }
    }
    else{
        return array();
    }
}


function displayGenderType($gender, $type){

    $stmt = $GLOBALS['conn']->prepare("SELECT * FROM items WHERE I_Gender = ? AND I_Type = ?");
    $stmt->bind_param("ss", $gender,$type);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows === 0){
            return array();
        }
        else{
            while($row = $result->fetch_assoc()){
                $returnarray[] = array(
                    $row['ItemID'],
                    $row['I_Brand'],
                    $row['I_Type'],
                    $row['I_Name'],
                    $row['I_Price'],
                    $row['I_Stock'],
                    $row['I_Image'],
                    $row['I_Gender'],
                    $row['I_Description'],
                    $row['AddedDate']
                );
            }
            return $returnarray;
        }
    }
    else{
        return array();
    }
}

function displayItem($id, $brand, $type, $name, $price, $stock, $image, $gender, $desc, $date){
    return '
                <div class="item-container">
                    <img src="'.$image.'" width="200" height="200">
                    <p class="item-name">'.$name.'</p>
                    <p class="item-price">₱ '.$price.'</p>
                    <button class="item-button btn btn-danger" data-target="#'.$id.'" id="view" data-toggle="modal">BUY NOW</button>
                </div>
    
                <div class="modal fade" id="'.$id.'" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="font-family:Bitter, serif;font-size:40px;"> '.$brand.' </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form method="POST" action="">
                                <div class="modal-body">
                                        <h4 class="modal-title" style="font-family:Anton, sans-serif;font-size:30px;margin-left:10px;"> '.$name.' <br></h4>
                                        <h4 class="modal-title" style="font-size:20px;margin:0px;margin-left:10px;padding:10px;padding-top:0px;">
                                            <strong> '.$desc.' </strong><br>
                                        </h4>
            
                                        <div class="col-md-6 column-media">
                                            <img class="img-fluid" src="'.$image.'" alt="Lorem" style="width:280px;height:300px;margin-left:30px;">
                                        </div>
                                        <div class="col-md-6 column-text">
                                            <h1 style="font-family:Bitter, serif;margin-top:10px;margin-bottom:10px;"><strong>PHP '.$price.'</strong>
                                            </h1>
                                            <select name="size">
                                                <option value="" selected="">Size</option>
                                                <optgroup label="Baby (Sizes Newborn - 4)"><option value="">2 M</option> <option value="">3 M</option><option value="">4 M</option></optgroup>
                                                <optgroup label="Walker (Sizes 4.5 - 7)"><option value="">5 M</option> <option value="">6 M</option><option value="">7 M</option></optgroup>
                                                <optgroup label="Toddler"> <option value="">8 M</option><option value="">9 M</option><option value="">10 M</option>  <option value="12">11 M</option><option value="13">12 M</option></optgroup>
                                                <optgroup label="Little Kid (Sizes 12.5 - 3)"><option value="14">13 M</option> <option value="">1 M</option><option value="">2 M</option><option value="">3 M</option></optgroup>
                                                <optgroup label="Big Kids (Sizes 3.5 - 7)"> <option value="">4 M</option><option value="">5 M</option><option value="">6 M</option><option value="">7 M</option></optgroup>
                                            </select>
                                            <input type="number" name="quantity" placeholder="No. of Order" style="width:98px;margin:10px;margin-left:20px;">
                                            <div class="btn-toolbar"></div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit" name="add" value="'.$id.'" style="background-color:#424949;"><strong>ADD TO CART</strong></button>
                                        <input type="hidden" name="price" value="'.$price.'">
                                        <input type="hidden" name="image" value="'.$image.'">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    
    ';
    }

    function getItem($itemid){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM items WHERE ItemID=?");
        $stmt->bind_param("i", $itemid);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $returnarray = array(
                        $row['ItemID'], //0
                        $row['I_Brand'], //1
                        $row['I_Type'], //2
                        $row['I_Name'], //3
                        $row['I_Price'],//4
                        $row['I_Stock'],//5
                        $row['I_Image'],//6
                        $row['I_Gender'],//7
                        $row['I_Description'],//8
                        $row['AddedDate']//9
                    );
                }
                return $returnarray;
            }
            else{
                //ewan
            }
        }
        else{
            echo "ME";
        }
        
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    function getItemInfo($id){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM items WHERE ItemID = ?");
        $stmt->bind_param("i", $id);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return json_encode(array('Error'=>0));
            }
            else{
                while($row = $result->fetch_assoc()){
                    $returnarray = array(
                        $row['ItemID'],
                        $row['I_Brand'],
                        $row['I_Type'],
                        $row['I_Name'],
                        $row['I_Price'],
                        $row['I_Stock'],
                        $row['I_Image'],
                        $row['I_Gender'],
                        $row['I_Description'],
                        $row['AddedDate'],
                        $row['I_Size']
                    );
                }
    
                return $returnarray;
            }
        }
        else{
            return json_encode(array('Error'=>1));
        }
    }

//Display ung dun sa itemdetails.php pagnag BUY
function itemDetails($id)
{
    $print="";
    $item=getItemInfo($id);
    $sizes=explode(",", $item[10]);
    $options="";
    foreach($sizes as $shoe){
        $options.='<option value="'.$shoe.'" >'.$shoe.'</option>';
    }
    $print= '
        <div class="container" align="center" style="margin-top: 150px; background-color: null; float: center">
            <div class="container choices-container" style="width: 90%; display: inline-block; margin: auto;">
                <form method="POST" action="cart.php">
                <div class="col-md-5 row item-display pull-left" style="justify-content: center">
                    <img align="left" src="'.$item[6].'" width="350" height="350" />
                </div>
                <div class="col-md-7 row pull-right"  align="left" style="display: block;">
                    <h1>'.$item[3].'</h1>
                    <h3>P '.$item[4].'</h3>
                    <h3>Product Details:</h3>
                    <h4>In Stock</h4>
                    <h3>Product Description:</h3>
                    <h4>'.$item[8].'</h4><br>
                    <select name="size">
                        '.$options.'  
                    </select>
                    <input type="number" name="quantity" min="1" placeholder="No. of Order" style="width:98px;margin:10px;margin-left:20px;" required>
                    <br> <br>     
                    <button type="submit" name="item" value="'.$id.'"class="item-button btn btn-danger" data-target="#'.$item[0].'" id="view" data-toggle="modal">BUY NOW</button>
                </div>
                </form>
            </div>

            <!--
            <a href="itemdisplay.php?item='.$id.'&add=yes"></a>
            <div class="modal fade" id="'.$item[0].'" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="font-family:Bitter, serif;font-size:40px;"> Item has been added to your cart </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <h1>MEMALAMAN</h1>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="button" style="background-color:#424949;"><strong>BUY NOW</strong></button>
                        </div>
                    </div>
                </div>
            </div>
            -->
        </div>

        

        
    ';
    echo $print;
}

function noItems($msg){
    echo '
    <div class="container" align="center" style="margin-top: 150px; background-color: null; float: center">
        <div class="container choices-container" style="width: 90%; display: inline-block; margin: auto;">
            <div class="col-md-12 row item-display pull-left" style="justify-content: center">
            <h1>'.$msg.'</h1>
            </div>
            <br><br><br><br>
        </div>
    </div>
    <br><br><br>
    ';
}


//display items if buy is clicked will transfer to item details
function viewItem($id, $brand, $type, $name, $price, $stock, $image, $gender, $desc, $date){
    return '
                <div class="item-container">
                    <img src="'.$image.'" width="200" height="200">
                    <p class="item-name">'.$name.'</p>
                    <p class="item-price">₱ '.$price.'</p>
                    <form method="GET" action="itemdisplay.php">
                        <button class="item-button btn btn-danger" type="submit" name="item" value="'.$id.'">BUY NOW</button>
                    </form>
                </div>';
    }

//IMPORTANT: Create products folder for image store.
//IMPORTANT: Change default Image Name.
//Admin Use. Adds Item to Database. Returns true if upload successful, else false.
function addItem($brand, $type, $name, $price, $stock, $imagename, $imagetmploc){
    if($imagename != NULL){
        $seperate = explode(".", $imagename);
        $filetype = end($seperate);
        $imagenamefinal = "Product." . $filetype;
           $location = "products/" . $imagenamefinal;
        move_uploaded_file($imagetmploc, $location);
    }

    $stmt = $GLOBALS['conn']->prepare("INSERT INTO items(I_Brand, I_Type, I_Name, I_Price, I_Stock, I_Image) 
        VALUES(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $brand, $type, $name, $price, $stock, $location);

    return $stmt->execute();
    $stmt->close();
    $GLOBALS['conn']->close();
}

    //Admin Use. Edit Item in Database. Returns true if update successful, else false.
    function editItem($itemid, $brand, $type, $name, $price){
        $stmt = $GLOBALS['conn']->prepare("UPDATE items SET I_Brand=?, I_Type=?, I_Name=?, I_Price=? WHERE ItemID=?");
        $stmt->bind_param("sssii", $brand, $type, $name, $price, $itemid);
        
        return $stmt->execute();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    //Admin Use. Delete Item in Database. Takes ItemID as parameter. 
    //Returns true if update successful, else false.
    function deleteItem($itemid){
        $stmt = $GLOBALS['conn']->prepare("DELETE FROM items WHERE ItemID=?");
        $stmt->bind_param("i", $itemid);  


        return $stmt->execute();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    //Admin and User Use. Searches for Items depending on keyword parameter. Returns JSON Items.
    //Returns Error value of 0 if empty, 1 if Error.
    function searchItem($keyword){
        $returnarray = array();
        $likekeyword = '%' . htmlspecialchars($keyword) . '%';
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM items WHERE (I_Brand || I_Type || I_Name) LIKE ?");
        $stmt->bind_param("s", $likekeyword);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return json_encode(array('Error'=>0));
            }
            else{
                while($row = $result->fetch_assoc()){
                    array_push($returnarray, array(
                        "Brand" => $row['I_Brand'],
                        "Type" => $row['I_Type'],
                        "Name" => $row['I_Brand'],
                        "Price" => $row['I_Price'],
                        "Image" => $row['I_Image']
                    ));
                }

                return json_encode($returnarray);
            }
        }
        else{
            return json_encode(array('Error'=>1));
        }
    }

    //Admin and User Use. Searches for Items depending on keyword parameter. Returns JSON Items.
    //Returns Error value of 0 if empty, 1 if Error.
    function displayItemsCat($category){
        $returnarray = array();
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM items WHERE I_Type=?");
        $stmt->bind_param("s", $category);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return json_encode(array('Error'=>0));
            }
            else{
                while($row = $result->fetch_assoc()){
                    array_push($returnarray, array(
                        "Brand" => $row['I_Brand'],
                        "Type" => $row['I_Type'],
                        "Name" => $row['I_Brand'],
                        "Price" => $row['I_Price'],
                        "Image" => $row['I_Image']
                    ));
                }

                return json_encode($returnarray);
            }
        }
        else{
            return json_encode(array('Error'=>1));
        }
    }

    //Admin and User Use. Searches for Items depending on keyword parameter. Returns JSON Items.
    //Returns Error value of 0 if empty, 1 if Error.
    function displayItems(){
        $returnarray = array();
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM items");

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return json_encode(array('Error'=>0));
            }
            else{
                while($row = $result->fetch_assoc()){
                    array_push($returnarray, array(
                        "Brand" => $row['I_Brand'],
                        "Type" => $row['I_Type'],
                        "Name" => $row['I_Brand'],
                        "Price" => $row['I_Price'],
                        "Image" => $row['I_Image']
                    ));
                }

                return json_encode($returnarray);
            }
        }
        else{
            return json_encode(array('Error'=>1));
        }
    }

    //Admin Use. Confirms order. Returns true if update successful, else false. Emails Customer for Updates.
    function confirmOrder($orderid){
        $stmt = $GLOBALS['conn']->prepare("UPDATE orders SET Status=? WHERE OrderID=?");
        $stmt->bind_param("si", "CONFIRMED", '$orderid');


        return $stmt->execute();
        //email User
        //mail();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    //Admin Use. Declines order. Returns true if update successful, else false. Emails Customer for Updates.
    function declineOrder($orderid){
        $stmt = $GLOBALS['conn']->prepare("UPDATE orders SET Status=? WHERE OrderID=?");
        $stmt->bind_param("si", "DECLINED", '$orderid');


        return $stmt->execute();
        //email User
        //mail();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    //User Use. Cancels order. Returns true if update successful, else false. Emails Admin for Updates.
    function cancelOrder($orderid){
        $stmt = $GLOBALS['conn']->prepare("UPDATE orders SET Status=? WHERE OrderID=?");
        $stmt->bind_param("si", "CANCELLED", '$orderid');

        return $stmt->execute();
        //email Admin
        //mail();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    //Admin Use. Add Stocks in Database. Gets number and ItemID as parameter. 
    //Returns true if update successful, else false.
    function addStocks($incrementNumber, $itemid){
        //$stmt = $GLOBALS['conn']->prepare("UPDATE items SET I_Stock = ? WHERE ItemID=?");
        $stmt = $GLOBALS['conn']->prepare("UPDATE items SET I_Stock += ? WHERE ItemID=?");
        $stmt->bind_param("ii", $incrementNumber, $itemid);

        return $stmt->execute();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    //Admin and User Use. Gets Order Details. Returns JSON value. 
    //Returns Error value of 0 if empty, 1 if Error.
    function getOrder($orderid){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM orders WHERE OrderID=?");
        $stmt->bind_param("i", $orderid);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return json_encode(array('Error'=>0));
            }
            else{
                return json_encode($result->fetch_assoc());
            }
        }
        else{
            return json_encode(array('Error'=>1));
        }
        
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    //Admin Use. Gets Confirmed and Pending Orders. Returns JSON list.
    //Returns Error value of 0 if empty, 1 if Error.
    function adminOrders(){
        $returnarray = array();
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM orders WHERE (Status = 'CONFIRMED') || (Status = 'PENDING') ORDER BY Status");

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return json_encode(array('Error'=>0));
            }
            else{
                while($row = $result->fetch_assoc()){
                    array_push($returnarray, array(
                        "OrderID" => $row['OrderID'],
                        "Date" => $row['Date'],
                        "Time" => $row['Time'],
                        "Items" => $row['Items'],
                        "Quantity" => $row['Quantity'],
                        "Total" => $row['Total'],
                        "Status" => $row['Status'],
                        "Contact" => $row['Contact'],
                        "Email" => $row['Email'],
                        "PaymentOption" => $row['PaymentOption'],
                        "Address" => $row['Address']
                    ));
                }

                return json_encode($returnarray);
            }
        }
        else{
            return json_encode(array('Error'=>1));
        }
    }

    //User Use. Customer gets list of Orders. Gets Email and Order Status as Parameter. Returns JSON list.
    //Returns Error value of 0 if empty, 1 if Error.
    function customerOrders($email, $orderstatus){
        $returnarray = array();
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM orders WHERE Status=? AND Email=?");
        $stmt->bind_param("ss", $orderstatus, $email);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows === 0){
                return json_encode(array('Error'=>0));
            }
            else{
                while($row = $result->fetch_assoc()){
                    array_push($returnarray, array(
                        "OrderID" => $row['OrderID'],
                        "Date" => $row['Date'],
                        "Time" => $row['Time'],
                        "Items" => $row['Items'],
                        "Quantity" => $row['Quantity'],
                        "Total" => $row['Total'],
                        "Status" => $row['Status'],
                        "Contact" => $row['Contact'],
                        "Email" => $row['Email'],
                        "PaymentOption" => $row['PaymentOption'],
                        "Address" => $row['Address']
                    ));
                }

                return json_encode($returnarray);
            }
        }
        else{
            return json_encode(array('Error'=>1));
        }
    }

    //clear cart seperators

    function cleanCart($id){
        $stmt = $GLOBALS['conn']->prepare("SELECT U_Cart FROM users WHERE UserID= ?");
        $stmt->bind_param("s", $id);

        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                $cart=$row['U_Cart'];
                if($row['U_Cart'] != ""){
                    if($row['U_Cart'][0]=="?"){
                        $cart=substr($row['U_Cart'],1,strlen($row['U_Cart'])-1);
                    }
                    else if($row['U_Cart'][strlen($row['U_Cart'])-1]=="?"){
                        $cart=substr($row['U_Cart'],0,-1);
                    }
                }
                else{
                    $cart=$row['U_Cart'];
                }
            }
        }
        

        $stmt = $GLOBALS['conn']->prepare("UPDATE users SET U_Cart = ? WHERE UserID = ?");
        $stmt->bind_param("ss", $cart, $id);
        $stmt->execute();
    }




    //IMPORTANT: SESSION_START FIRST BEFORE USING.
    //IMPORTANT: CALL getCurrentCart() BEFORE using addToCart()
    //User Use. Gets Cart from Database. Gets Email parameter. C kkreate $_SESSION['cart'] and $_SESSION['cartID']
    function getCurrentCart($id){
        $_SESSION['cart'] = array();
        $splitone = array();
        $splittwo = array();
        $counter = 0;
        
        $stmt = $GLOBALS['conn']->prepare("SELECT U_Cart FROM users WHERE UserID= ?");
        $stmt->bind_param("s", $id);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows >= 1){
                while($row = $result->fetch_assoc()){
                    if($row['U_Cart'] != ""){
                        if($row['U_Cart'][0]=="?"){
                            $row['U_Cart']=substr($row['U_Cart'],1,strlen($row['U_Cart'])-1);
                        }
                        else if($row['U_Cart'][strlen($row['U_Cart'])-1]=="?"){
                            $row['U_Cart']=substr($row['U_Cart'],0,-1);
                        }
                        $splitone = explode('?',$row['U_Cart']);
                        foreach($splitone as $sone){
                            for($a = 0; $a < sizeof($splitone); $a++){
                                $splittwo = explode("@", $sone);
                            } 
                            if(!empty($splittwo[0])){
                                $_SESSION['cart'][$counter]= array($splittwo[0], $splittwo[1], $splittwo[2], $splittwo[3]);
                            }
                            $counter++;
                        }
                    }
                }
            }
            
        }
    }

    //
    function getAnonCart(){
        $_SESSION['cart'] = array();
            if(isset($_SESSION['anoncart'])){
                foreach($_SESSION['anoncart'] as $items){
                    $_SESSION['cart'][]= array($items[0], $items[1], $items[2], $items[3]);
                }
                    
            }
            
        
    }

    //IMPORTANT: SESSION_START FIRST BEFORE USING.
    //IMPORTANT: CALL getCurrentCart() BEFORE using addToCart()
    //User Use. Adds Item to Cart. Returns true if add successful, else false.
    function addToCart($id, $itemid, $quantity, $size){
        $cartstring = "";
        $addtocartstring = "";
        $stmt = $GLOBALS['conn']->prepare("SELECT U_Cart FROM users WHERE UserID= ?");
        $stmt->bind_param("i", $id);

        $isNew=true;
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $cartstring = $row['U_Cart'];
                }
                $isNew=false;
            }
            else{
                $isNew=true;
            }
        }

        getCurrentCart($id);
        $same=false;
        $newitems=array();
        foreach($_SESSION['cart'] as $items){
            if($items[0]==$itemid && $items[3]==$size){
                $items[2]=$items[2]+$quantity;
                $same=true;
            }
            $newitems[]=array($items[0],$items[1],$items[2],$items[3]);
        }

        
        if($same){
            $newcart="";
            $_SESSION['totalitems']=0;
            foreach($newitems as $items){
                $newcart.="?".$items[0]."@".$items[1]."@".$items[2]."@".$items[3];
                $_SESSION['totalitems']+=$items[2];
            }
            
            $stmt = $GLOBALS['conn']->prepare("UPDATE users SET U_Cart = ? WHERE UserID = ?");
            $stmt->bind_param("ss", $newcart, $id);
        }
        else{
            
            $price=0;
            $stmt = $GLOBALS['conn']->prepare("SELECT I_Price FROM items WHERE ItemID= ?");
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $price = $row['I_Price'];
                    }
                }
            }

            $addtocartstring = $itemid . "@" . $price . "@" . $quantity . "@" . $size;
            $finalcart = $cartstring . "?" . $addtocartstring;

            if($isNew){
                $finalcart=$addtocartstring;
            }


            if($cartstring!=""){}
            $stmt = $GLOBALS['conn']->prepare("UPDATE users SET U_Cart=? WHERE UserID=?");
            $stmt->bind_param("ss", $finalcart, $id);
        }

        
        activityLog($_SESSION['email']." Added an item to cart",$id);

        return $stmt->execute();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    //delete an item from cart
    function deleteItemFromCart($id,$size){
        $empty="";
        
        foreach($_SESSION['cart'] as $item){
            if($item[0]!=$id && $item[3]!=$size){
                $new[]=$item;
            }
        }

        print_r($new);
        $newcart="";
        foreach($new as $items){
            $newcart.="?".$items[0]."@".$items[1]."@".$items[2]."@".$items[3];
        }





        
        unset($_SESSION['cart']);
        if(isset($_SESSION['id'])){
            $user=$_SESSION['id'];
            $stmt = $GLOBALS['conn']->prepare("UPDATE users SET U_Cart = ? WHERE UserID = ?");
            $stmt->bind_param("ss", $newcart, $id);
            $stmt->execute();
        }
        else{
            foreach($new as $cart){
                $_SESSION['cart'][]=array($_SESSION['id'],$cart[0],$cart[2],$cart[3]);
            }
            
        }

        header("Location:cart.php");

        $stmt->close();
        $GLOBALS['conn']->close();
    }


    //delete anon cart

    function deleteItemFromAnonCart($id,$size){
        $empty="";
        $new=array();
        getAnonCart();
        
        
        foreach($_SESSION['cart'] as $item){
            if( $item[0]!=$id && $item[3]!=$size ){
                $new[]=array($item[0],$item[1],$item[2],$item[3]);
            }
        }
        $_SESSION['anoncart']=array();
        foreach($new as $items){
            addToCartSes($items[0],$items[2],$items[3]);
        }


        //header("Location:cart.php");
    }


    //add to Session cart
    function addToCartSes($itemid, $quantity, $size){
        $cartstring = array();
        $addtocartstring = "";
        
        $new=array();
        if(isset($_SESSION['anoncart'])){
            $cartstring = $_SESSION['anoncart'];
            $same=false;
            foreach($cartstring as $item){
                if($item[0]==$itemid && $item[3]==$size){
                    $item[2]=$item[2]+$quantity;
                    $same=true;
                }
                $new[]=$item;
            }
            if($same){
                $_SESSION['anoncart']=array();
                foreach($new as $items){
                    $_SESSION['anoncart'][]=array($items[0],$items[1],$items[2],$items[3]);
                }
            }
            else{
                $price=0;
                $stmt = $GLOBALS['conn']->prepare("SELECT I_Price FROM items WHERE ItemID= ?");
                $stmt->bind_param("i", $id);
                if($stmt->execute()){
                    $result = $stmt->get_result();
                    if($result->num_rows > 0){
                        $price=$result;
                    }
                }

                $_SESSION['anoncart'][]=array($itemid,$price,$quantity,$size);
            }
        
        }
        else{
            
            $price=0;
            $stmt = $GLOBALS['conn']->prepare("SELECT I_Price FROM items WHERE ItemID= ?");
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    $price=$result;
                }
            }

            $_SESSION['anoncart'][]=array($itemid,$price,$quantity,$size);
        }
        
        

        return true;
    }
    //IMPORTANT: SESSION_START FIRST BEFORE USING.
    //IMPORTANT: CALL getCurrentCart() BEFORE using addToCart()
    //User Use. Checks out Cart. Returns true if update successful, else false.
    function checkoutCart($id, $total, $contact, $email, $paymentoption, $address){
        $cartstring = "";
        $blank="";
        $stmt = $GLOBALS['conn']->prepare("SELECT U_Cart FROM users WHERE UserID= ?");
        $stmt->bind_param("s", $id);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $cartstring = $row['U_Cart'];
                }
            }
        }
        date_default_timezone_set('Asia/Manila');
        $date = date("m/d/Y") . "";
        $time = date("h:i:s"). "";
        $status = "PENDING";
        $stmt = $GLOBALS['conn']->prepare("INSERT INTO orders(Date, Time, Items, Total, Status, Contact, Email, PaymentOption, Address) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssisssss", $date, $time, $cartstring, $total, $status, $contact, $email, $paymentoption, $address);
        $stmt->execute();
        $stmt = $GLOBALS['conn']->prepare("UPDATE users SET U_Cart=? WHERE UserID=?");
        $stmt->bind_param("ss", $blank, $id);
        $stmt->execute();
        $_SESSION['checkmsg']="You order is being process. Wait for text message for more info";
        activityLog($_SESSION['email']." Checkout Cart",$id);
        //mail();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    function getOrders($email){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM orders WHERE Email= ?");
        $stmt->bind_param("s", $email);

        $array=array();
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $array[] = array($row['OrderID'],$row['Items'],$row['Status'],$row['PaymentOption']);
                }
                print_r($array);
                return $array;
            }
        }
    }

    function getUser($id){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM users WHERE UserID=?");
        $stmt->bind_param("s", $id);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>= 1){
                return json_encode($result->fetch_assoc());
            }
            else{
                return json_encode(array('Error'=>0));
            }
        }
        else{
            return json_encode(array('Error'=>1));
        }
        
        $stmt->close();
        $GLOBALS['conn']->close();
    }

    function updateAccount($id, $name, $email, $contact, $address){
        $name=explode(" ",$_POST['name']);
        $fname=$name[0];
        $lname="";
        
        for($i=1;$i<count($name); $i++){
            if($i!=0){
                $lname.=$name[$i]." ";
            }
            else if($i=count($name)-1){
                $lname.=$name;
            }
        }

        $stmt = $GLOBALS['conn']->prepare("UPDATE items SET U_FirstName=?, U_LastName=?, U_Email=?, U_Contact, U_Account=? WHERE UserID=?");
        $stmt->bind_param("sssss        s", $fname, $lname, $email, $contact, $account, $id);
    }

    function activityLog($activity, $userid){
        $date = date("M d, Y");
        $time = date("g:ia");

        $stmt = $GLOBALS['conn']->prepare("INSERT INTO activitylogs(UserID, Date, Time, Activity) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $userid, $date, $time, $activity);
        $stmt->execute();
    }

?>