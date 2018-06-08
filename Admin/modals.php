<?php 
    function modalItemDisplay($id, $image, $brand, $name, $sizes, $gender, $type, $price, $stock, $description){
        echo '<div class="modal fade" role="dialog" tabindex="-1" id="' . $id . '">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">' . $brand . '</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div id="contact">
                                        <div class="container" style="padding-right:15px;padding-top:5px;background-color:#f1efef;">
                                            <form method="post" id="contact-form"  enctype="multipart/form-data">
                                                <div class="controls">
                                                    <div class="form-row" style="justify-content: center;">
                                                        <img src="../' . $image . '" width="100" height="100" style="border-radius: 100px"/>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label for="form_name">Shoe Brand</label><input class="form-control" type="text" name="brand" required="" value= "' . $brand . '" placeholder="e.g. Nike">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label for="form_lastname">Shoe Name</label><input class="form-control" type="text" name="name" required="" value= "' . $name . '" placeholder="e.g. Nike Cortex">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label for="form_email">Sizes</label><input class="form-control" type="text" name="sizes" required="" value= "' . $sizes . '" placeholder="e.g. 5,6,7,8">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label for="form_email">Type</label><input class="form-control" type="text" name="type" value= "' . $type . '" required="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="form-group"><label for="form_email">Gender</label><input class="form-control" type="text" name="gender" value= "' . $gender . '" required="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group"><label for="form_phone">Price</label><input class="form-control" type="number" name="price" value= "' . $price . '">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group"><label for="form_phone">Stock</label><input class="form-control" type="number" name="stock" value= "' . $stock . '">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group"><label for="form_message">Description</label><input class="form-control" type="text" name="description" required="" value= "' . $description . '" placeholder="e.g. Comfortable shoes." rows="4">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="file" name="image2" style="padding-right:140px;margin-left:141px;margin-bottom: 15px;"/>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-danger" type="submit" value="' . $id . '" name="deleteItem">Delete</button>
                <button class="btn btn-primary" type="submit" value="' . $id . '" name="updateItem">Save</button>
            </div>
        </form>
        </div>
        </div>
        </div>
        </div>';
    }

    function modalOrderDisplay($id, $email, $address, $contact, $paymentoption, $items, $status){

    echo'<div class="mui-container-fluid">
            <div class="modal fade" role="dialog" tabindex="-1" id="' . $id . '">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">ORDER #' . $id . ' - ' . $status . '</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div id="contact">
                                        <div class="container" style="padding-right:15px;padding-top:5px;background-color:#f1efef;padding-bottom:15px;">
                                            <div class="add-padding"></div>    
                                            <form method="post" id="contact-form" enctype="multipart/form-data">
                                                <div class="controls">
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group"><label for="form_name">Email</label><br><p style="float: left">' . $email . '</p>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="form-group"><label for="form_name">Address</label><br><p style="text-align: left">' . $address . '</p>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group"><label for="form_name">Contact</label><br><p style="float: left">' . $contact . '</p>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group"><label for="form_name">Payment Option</label><br><p style="float: left">' . $paymentoption . '</p>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row minus-padding">
                                            <div class="col-md-6">
                                                <div class="form-group"><label for="form_name">Items:</label>
                                                </div>
                                            </div>
                                        </div>';
                                        
                                        $splitone = explode('?', $items);
                                        for ($b = 0; $b < sizeof($splitone); $b++){
                                            $splittwo = explode('@', $splitone[$b]);
                                            $itemdetails = getItem($splittwo[0]);

                                            if($b == sizeof($splitone)){
                                                echo'<div class="form-row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                        <img src="../' . $itemdetails['I_Image'] . '" width="60" height="60" style="border-radius: 60px"/>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                        <label for="form_name">' . $itemdetails['I_Brand'] . " " . $itemdetails['I_Name'] .'</label><br>
                                                        <label for="form_name" class="reduce-padding-top">Quantity: ' . $splittwo[2] . '</label>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>';
                                            }
                                            else{
                                                echo'<div class="form-row minus-padding">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                        <img src="../' . $itemdetails['I_Image'] . '" width="60" height="60" style="border-radius: 60px"/>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                        <label for="form_name">' . $itemdetails['I_Brand'] . " " . $itemdetails['I_Name'] .'</label><br>
                                                        <label for="form_name" class="reduce-padding-top">Quantity: ' . $splittwo[2] . '</label>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>';
                                            }
                                        }
                                        if($status == "PENDING"){
                                            echo '<div class="form-row" style="justify-content: center">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <form method="POST">
                                                        <button type="submit" class="btn btn-danger" name="cancelOrder" value="' . $id . '" style="width: 100%">Cancel</button>
                                                        </form>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <form method="POST">
                                                        <button type="submit" class="btn btn-warning" name="confirmOrder" value="' . $id . '" style="width: 100%">Confirm</button>
                                                        </form>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                        else if($status == "CONFIRMED"){
                                            echo '<div class="form-row" style="justify-content: center">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <form method="POST">
                                                        <button type="submit" class="btn btn-warning" name="deliverOrder" value="' . $id . '" style="width: 100%">Deliver</button>
                                                        </form>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                        else if($status == "BEING DELIVERED"){
                                            echo '<div class="form-row" style="justify-content: center">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <form method="POST">
                                                        <button type="submit" class="btn btn-danger" name="finishOrder" value="' . $id . '" style="width: 100%">Finish Order</button>
                                                        </form>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>';
                                        }

                            echo '</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button></div>
        </form>
        </div>
        </div>
        </div>
        </div>';
    }

    function modalUserView($id, $name, $email, $address, $contact, $status){
        echo '<div class="mui-container-fluid">
            <div class="modal fade" role="dialog" tabindex="-1" id="' . $id . '">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">' . $name . '</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <div id="contact">
                                            <div class="container" style="padding-right:15px;padding-top:5px;background-color:#f1efef;">
                                                <div class="add-padding"></div>
                                                <form method="post" id="contact-form" enctype="multipart/form-data">
                                                    <div class="messages"></div>
                                                    <div class="controls">
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <div class="form-group"><label for="form_name">Full Name</label>
                                                                    <p style="text-align:left">' . $name . '</p>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group"><label for="form_name">Email</label>
                                                        <p style="text-align:left">' . $email . '</p>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <div class="form-group"><label for="form_name">Address</label>
                                                        <p style="text-align:left">' . $address . '</p>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="form_name">Contact</label>
                                                        <p style="text-align:left">' . $contact . '</p>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>';

                                            if($status != "DEACTIVATED"){
                                                echo '<div class="form-row" style="justify-content: center">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <button type="submit" name="deactivateUser" value="' . $id . '" class="btn btn-danger" style="width: 100%">Deactivate</button>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>';
                                            }
                                            else{
                                                echo '<div class="form-row" style="justify-content: center">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <button type="submit" name="activateUser" value="' . $id . '" class="btn btn-warning" style="width: 100%">Activate</button>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>';
                                            }

                                echo '</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button></div>
            </form>
            </div>
            </div>
            </div>
            </div>';
    }

?>