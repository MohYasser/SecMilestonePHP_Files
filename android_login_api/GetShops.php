<?php

$conn=mysqli_connect("localhost", "root","","android_login_api") or die("Unable to Connect");

if(mysqli_connect_error($conn))
{
	echo "Failed to connect";
}
$stmt = $conn->prepare("SELECT id, shop_name, lattitude, longitude FROM shop");

$stmt ->execute();
$stmt -> bind_result($id, $shop_name, $lattitude, $longitude);

$shops = array();

while($stmt ->fetch()){

    $temp = array();
	
	$temp['id'] = $id;
	$temp['shop_name'] = $shop_name;
	$temp['lattitude'] = $lattitude;
	$temp['longitude'] = $longitude;

	array_push($shops,$temp);
	}
	echo json_encode($shops);
?>


