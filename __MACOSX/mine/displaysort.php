<?php
require_once dirname(__FILE__).'/methods.php';

/*
ItemID
I_Brand
I_Type
I_Name
I_Price
I_Stock
I_Image

*/
list($ids, $brands, $types, $names, $prices, $stocks, $images)=displaySort("ItemID","ASC");

$total=count($ids);
for ($i=0;$i<$total;$i++)
	echo $ids[$i]." ".$brands[$i]." ".$types[$i]." ".$names[$i]." ".$prices[$i]." ".$stocks[$i]." <img src='".$images[$i]."' alt='image'><br>";

?>