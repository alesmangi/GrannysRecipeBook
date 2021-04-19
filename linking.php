<?php
session_start();

function getConnection(){
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname= "recipe_db";

	$conn = mysqli_connect($host,$username,$password,$dbname);
	if(!$conn){
		die("Failed to connect to the database");
	}
	return $conn;
}

function echoNotification ($message,$filename){
	echo   "<h1>{$message}</h1>";
	header('Location:'.$filename);
}

function executeSql($sql){
	return mysqli_query(getConnection(),$sql);
}

function saveFile($name){
	if(empty($_FILES[$name]['name'])){
		return null;
	}
	$target_path = "uploads/";
	$target_path = $target_path . basename($_FILES[$name]['name']);

	if (move_uploaded_file($_FILES[$name]['tmp_name'], $target_path)) {

		return $_FILES[$name]['name'];
	}
	return null;
}


if(isset($_POST['action'])){
	if($_POST['action'] == 'user_login'){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM  users WHERE email='$email' AND password='$password'";

		$result = executeSql($sql);

		if(mysqli_num_rows($result) > 0 ){
			$row = mysqli_fetch_assoc($result);
			$_SESSION['name'] = $row['name'];
			$_SESSION['email'] = $row['email'];
			header("Location:index.php");
		}
		else{
			echoNotification('You have entered wrong credentials','login.html');
		}
	}
	elseif ($_POST['action'] == 'save_recipe'){
		$photo1 = saveFile('photo_1');
		$photo2 = saveFile('photo_2');
		$photo3 = saveFile('photo_3');
		$photo4 = saveFile('photo_4');

		if( !$photo1 && !$photo2 && !$photo3 && !$photo4){

			echo '<h4 class="text-red">You need to upload at least one photo</h4>';
		}
		else{
			$title = $_POST['title'];
			$time = $_POST['time'];
			$bookmarks = $_POST['bookmarks'];
			$owner_name = $_POST['owner_name'];
			$recipe = $_POST['recipe'];
			$ingredients = $_POST['ingredients'];
			$nutrition = $_POST['nutrition'];
			$notes = $_POST['notes'];

			$sql = "INSERT INTO recipe (title,time,bookmarks,owner_name,recipe,ingredients,photo_1,photo_2,photo_3,photo_4,nutrition,notes)
					VALUES(
					'$title','$time',$bookmarks,'$owner_name','$recipe','$ingredients',
					'$photo1','$photo2','$photo3','$photo4','$nutrition','$notes'
					)
					";


			if(executeSql($sql)){
				echo "Recipe saved successfully";
			}
			else{
				echo "There was a problem saving the recipe";
			}
		}
	}
}