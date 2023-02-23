<?php
if(isset($_POST["image"])){

	$data = $_POST["image"];
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);

	session_start();
	$imageName = $_SESSION['account_id'].'-profile.png';
	$path = '../../uploads/profiles/';
	//$path = 'profiles/';

	file_put_contents($path.$imageName, $data);
	echo '../_Plugins/profile-editor/profiles/'.$imageName;
	
}