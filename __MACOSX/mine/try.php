<?php
require_once dirname(__FILE__).'/methods.php';

list($ids, $brands, $types, $names, $prices, $stocks , $images)=displayItem(1);

echo $ids." ".$brands." ".$types." ".$names." ".$prices." ".$stocks." ".$images.."<br>";
?>