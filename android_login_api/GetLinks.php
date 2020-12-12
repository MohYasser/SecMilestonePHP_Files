<?php

$con=mysqli_connect("localhost", "root","","android_login_api") or die("Unable to Connect");

if(mysqli_connect_error($con))
{
	echo "Failed to connect";
}
$stmt = $conn->prepare("SELECT ID, shop_ID, product_ID, price, sp_offers FROM shop_product_link");

$stmt ->execute();
$stmt -> bind_result($ID, $shop_ID, $product_ID, $price, $sp_offers);

$links = array();

while($stmt ->fetch()){

    $temp = array();
	
	$temp['ID'] = $ID;
	$temp['shop_ID'] = $shop_ID;
	$temp['product_ID'] = $product_ID;
	$temp['price'] = $price;
	$temp['sp_offers'] = $sp_offers;

	array_push($links,$temp);
	}
	echo json_encode($links);
?>


