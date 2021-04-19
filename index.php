<?php
include 'selector.php';
session_start();
if(!$_SESSION['name']){
    header("Location:login.html");
}

$recipes = selectRecipes();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Recipe</title>
    <style>
        table {
            width:100%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
         tr:nth-child(even) {
            background-color: #eee;
        }
        tr:nth-child(odd) {
            background-color: #fff;
        }
        th {
            background-color: black;
            color: white;
        }
        .button-container{
            width: 100%;
            margin:0.2rem 2rem;
        }
        .button-container>button{
            align-self: end;
            background: #31a9cd;
            margin: 5px 3rem;
            float: right;
        }
    </style>
</head>
<body>
<div id="main-container">
    <div>
        <h1 class="text-center text-red">Welcome to Granny's Recipe Book</h1>
        <hr>
       <div class="button-container">
           <button class="recipe-button" onclick="window.location.assign('add-new.html')">Add New Recipe</button>
       </div>
        <table >
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
            <tbody>
            <?php
            $count = 1;
            while($recipe = mysqli_fetch_assoc($recipes)){
                ?>
                <tr>
                    <td><?=$count++?></td>
                    <td>
                        <img src="uploads/<?=$recipe['photo_1']?>" alt="" style="height: 50px">
                    </td>
                    <td><?=$recipe['title']?></td>
                    <td><?=$recipe['time']?></td>
                    <td>
                        <a class="recipe-button"  href="view-recipe.php?id=<?=$recipe['id']?>">View</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>