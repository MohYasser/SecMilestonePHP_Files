<?php

$conn=mysqli_connect("localhost", "root","","android_login_api") or die("Unable to Connect");

if(mysqli_connect_error($conn))
{
	echo "Failed to connect";
}
$stmt = $conn->prepare("SELECT id, product_name, description, image_url FROM product");

$stmt ->execute();
$stmt -> bind_result($id, $product_name, $description, $image_url);

$products = array();

while($stmt ->fetch()){

    $temp = array();
	
	$temp['id'] = $id;
	$temp['product_name'] = $product_name;
	$temp['description'] = $description;
	$temp['image_url'] = $image_url;

	array_push($products,$temp);
	}
	echo json_encode($products);
?>


