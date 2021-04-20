<?php
function getConnection(){
	$host = "localhost";
	$username = "witonl_recipies";
	$password = "LKWDp}jHv_5l";
	$dbname= "witonl_recipes";

	$conn = mysqli_connect($host,$username,$password,$dbname);
	if(!$conn){
		die("Failed to connect to the database.");
	}
	return $conn;
}

function executeSql($sql){
	return mysqli_query(getConnection(),$sql);
}

function selectRecipes(){
	$sql = "SELECT id,COALESCE(photo_1,photo_2,photo_3,photo_4) AS photo_1,title,time FROM recipe ORDER BY id DESC";
	return executeSql($sql);
}

function selectRecipe($id){
	$sql = $sql = "SELECT * FROM recipe WHERE id=$id";
	$result = executeSql($sql);
	$result = mysqli_fetch_assoc($result);
	$result['ingredients'] = (array)explode(',',$result['ingredients']);
	$result['recipe'] = (array)explode(',',$result['recipe']);

	return $result;
}
