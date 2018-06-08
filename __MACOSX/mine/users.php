//Better calls for header(Location: file);
function navigate($filename){
    header('Location: $filename');
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

    $stmt = $conn->prepare("INSERT INTO items(I_Brand, I_Type, I_Name, I_Price, I_Stock, I_Image) 
        VALUES(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $brand, $type, $name, $price, $stock, $location);

    if($stmt->execute()){
        return true;
    }
    else{
        return false;
    }

    $stmt->close();
    $conn->close();
}

//Admin Use. Edit Item in Database. Returns true if update successful, else false.
function editItem($itemid, $brand, $type, $name, $price){
    $stmt = $conn->prepare("UPDATE items SET I_Brand='?', I_Type='?', I_Name='?', I_Price=? WHERE ItemID=?");
    $stmt->bind_param("sssii", $brand, $type, $name, $price, $itemid);
    
    if($stmt->execute()){
        return true;
    }
    else{
        return false;
    }

    $stmt->close();
    $conn->close();
}

//Admin Use. Delete Item in Database. Takes ItemID as parameter. 
//Returns true if update successful, else false.
function deleteItem($itemid){
    $stmt = $conn->prepare("DELETE FROM items WHERE ItemID=?");
    $stmt->bind_param("i", $itemid);  

    if($stmt->execute()){
        return true;
    }
    else{
        return false;
    }

    //return $stmt->execute();
    $stmt->close();
    $conn->close();
}
//Admin and User Use. Gets details of Item. Takes ItemID as parameter. Returns JSON value for Item Details. 
//Returns Error value of 0 if empty, 1 if Error.
function getItem($itemid){
    $stmt = $conn->prepare("SELECT * FROM items WHERE ItemID=?");
    $stmt->bind_param("i", $itemid);

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
    $conn->close();
}

//Admin and User Use. Searches for Items depending on keyword parameter. Returns JSON Items.
//Returns Error value of 0 if empty, 1 if Error.
function searchItem($keyword){
    $returnarray = array();
    $likekeyword = '%' . htmlspecialchars($keyword) . '%';
    $stmt = $conn->prepare("SELECT * FROM items WHERE (I_Brand || I_Type || I_Name) LIKE '?'");
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
                ))
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
    $stmt = $conn->prepare("UPDATE orders SET Status='?' WHERE OrderID=?");
    $stmt->bind_param("si", "CONFIRMED", '$orderid');

    if($stmt->execute()){
        return true;
    }
    else{
        return false;
    }

    //return $stmt->execute();
    //email User
    //mail();
    $stmt->close();
    $conn->close();
}

//Admin Use. Declines order. Returns true if update successful, else false. Emails Customer for Updates.
function declineOrder($orderid){
    $stmt = $conn->prepare("UPDATE orders SET Status='?' WHERE OrderID=?");
    $stmt->bind_param("si", "DECLINED", '$orderid');

    if($stmt->execute()){
        return true;
    }
    else{
        return false;
    }

    //return $stmt->execute();
    //email User
    //mail();
    $stmt->close();
    $conn->close();
}

//User Use. Cancels order. Returns true if update successful, else false. Emails Admin for Updates.
function cancelOrder($orderid){
    $stmt = $conn->prepare("UPDATE orders SET Status='?' WHERE OrderID=?");
    $stmt->bind_param("si", "CANCELLED", '$orderid');

    if($stmt->execute()){
        return true;
    }
    else{
        return false;
    }

    //return $stmt->execute();
    //email Admin
    //mail();
    $stmt->close();
    $conn->close();
}

//Admin Use. Add Stocks in Database. Gets number and ItemID as parameter. 
//Returns true if update successful, else false.
function addStocks($incrementNumber, $itemid){
    //$stmt = $conn->prepare("UPDATE items SET I_Stock = ? WHERE ItemID=?");
    $stmt = $conn->prepare("UPDATE items SET I_Stock += ? WHERE ItemID=?");
    $stmt->bind_param("ii", $incrementNumber, $itemid);

    if($stmt->execute()){
        return true;
    }
    else{
        return false;
    }

    //return $stmt->execute();
    $stmt->close();
    $conn->close();
}

//Admin and User Use. Gets Order Details. Returns JSON value. 
//Returns Error value of 0 if empty, 1 if Error.
function getOrder($orderid){
    $stmt = $conn->prepare("SELECT * FROM orders WHERE OrderID=?");
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
    $conn->close();
}

//Admin Use. Gets Confirmed and Pending Orders. Returns JSON list.
//Returns Error value of 0 if empty, 1 if Error.
function adminOrders(){
    $returnarray = array();
    $stmt = $conn->prepare("SELECT * FROM orders WHERE (Status = 'CONFIRMED') || (Status = 'PENDING') ORDER BY Status");

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
                ))
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
    $stmt = $conn->prepare("SELECT * FROM orders WHERE Status=? AND Email=?");
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
                ))
            }

            return json_encode($returnarray);
        }
    }
    else{
        return json_encode(array('Error'=>1));
    }
}

//IMPORTANT: SESSION_START FIRST BEFORE USING.
//IMPORTANT: CALL getCurrentCart() BEFORE using addToCart()
//User Use. Gets Cart from Database. Gets Email parameter. Create $_SESSION['cart'] and $_SESSION['cartID']
function getCurrentCart($email){
    $jsonoutput = "";
    $cartid = null;
    $_SESSION['cart'] = array();
    $_SESSION['cartID'] = "";

    $stmt = $conn->prepare("SELECT * FROM orders WHERE Status=? AND Email=?");
    $stmt->bind_param("ss", "CART", $email);

    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $jsonoutput = $row['Items'];
                $cartid = $row['OrderID'];
            }
        }
    }

    $_SESSION['cart'] = json_decode($jsonoutput, true);
    $_SESSION['cartID'] = $cartid;
}

//IMPORTANT: SESSION_START FIRST BEFORE USING.
//IMPORTANT: CALL getCurrentCart() BEFORE using addToCart()
//User Use. Adds Item to Cart. Returns true if add successful, else false.
function addToCart($orderid, $itemid, $price, $quantity){
    array_push($_SESSION['cart'], array(
        "ItemID" => $itemid,
        "Price" => $price,
        "Quantity" => $quantity
    ));

    $newItems = json_encode($_SESSION['cart']);
    
    $stmt = $conn->prepare("UPDATE orders SET Items=? WHERE OrderID=?");
    $stmt->bind_param("si", $newItems, $orderid);

    if($stmt->execute()){
        return true;
    }
    else{
        return false;
    }

    //return $stmt->execute();
    $stmt->close();
    $conn->close();
}

//IMPORTANT: SESSION_START FIRST BEFORE USING.
//IMPORTANT: CALL getCurrentCart() BEFORE using addToCart()
//User Use. Checks out Cart. Returns true if update successful, else false.
function checkoutCart($orderid){
    $stmt = $conn->prepare("UPDATE orders SET Status=? WHERE OrderID=?");
    $stmt->bind_param("si", "PENDING", $orderid);

    if($stmt->execute()){
        return true;
        $_SESSION['cart'] = array();
    }
    else{
        return false;
    }

    //return $stmt->execute();
    //mail();
    $stmt->close();
    $conn->close();
}