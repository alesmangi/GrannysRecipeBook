<?php
include 'selector.php';
session_start();

if(!$_SESSION['name']){
	header("Location:login.html");
}

$recipe = selectRecipe(intval($_GET['id']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Granny's Recipe Book</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/1a6b90a264.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="main-container">
    <h1 class="main-title"><?=$recipe['title']?></h1>
    <section>
        <div class="top-title">
            <button class="recipe-button">Save Recipe
                <i class="fas fa-caret-down"></i>
            </button>
            <div class="text-gray" id="span-container">
                <span >Review this recipe</span>
                <span > <i class="fas fa-clock"></i> Ready in <?=$recipe['time']?></span>
                <span > <i class="fas fa-user-friends"></i> 6(2/3 cups)</span>
                <span > <i class="fas fa-bookmark"></i> <?=$recipe['bookmarks']?> want to try</span>
            </div>
        </div>

        <hr>

    </section>
    <section>
        <div id="salad-detail-container">
            <div class="salad-image">
                <img src="uploads/<?=$recipe['photo_1']?>">
            </div>
            <div class="salad-description">
                <div id="icon-container">
                    <button class="icon-button"><i class="fas fa-cart-plus"></i></button>
                    <button class="icon-button"><i class="fas fa-calendar-alt"></i></button>
                    <button class="icon-button"><i class="fas fa-print"></i></button>
                </div>
                <hr>
                <div id="image-with-name">
                    <img src="img/user.jpeg" alt="">
                    <span>by <?=$recipe['owner_name']?></span>
                </div>
                <p>Try this <?=$recipe['title']?> recipe, or contribute your own</p>
            </div>
        </div>
    </section>
    <hr>
    <section>
        <p class="text-center">Still searching for what to cook?</p>
        <h3 class="text-center text-red">Find the most delicious recipes here</h3>
    </section>
    <hr>
    <section>
        <div class="tab">
            <button class="tablinks active" id="tab-recipe" onclick="openTab( 'recipe')">Recipe</button>
            <button class="tablinks" id="tab-photos" onclick="openTab( 'photos')">Photos</button>
            <button class="tablinks" id="tab-nutrition" onclick="openTab( 'nutrition')">Nutrition</button>
            <button class="tablinks" id="tab-notes" onclick="openTab( 'notes')">Notes</button>
        </div>
        <div class="tabcontent active" id="recipe">
            <h5 class="text-red">INGREDIENTS</h5>
            <ul>
                <?php
                foreach ($recipe['ingredients'] as $ingredient){
                    ?>
                    <li><?=$ingredient?></li>
	                <?php
                }
                ?>
            </ul>
            <hr>
            <h5 class="text-red">RECIPE</h5>
            <ul>
		        <?php
		        foreach ($recipe['recipe'] as $rcp){
			        ?>
                    <li><?=$rcp?></li>
			        <?php
		        }
		        ?>
            </ul>
        </div>
        <div class="tabcontent" id="photos">
            <h5>Recipe photos</h5>
            <hr>
            <div class="recipe-photos">
                <img src="uploads/<?=$recipe['photo_1']?>" alt="">
                <img src="uploads/<?=$recipe['photo_2']?>" alt="">
                <img src="uploads/<?=$recipe['photo_3']?>" alt="">
                <img src="uploads/<?=$recipe['photo_4']?>" alt="">
            </div>
        </div>

        <div class="tabcontent" id="nutrition">
            <h5>Nutrition details</h5>
            <?=$recipe['nutrition'] ?>
        </div>

        <div class="tabcontent" id="notes">
            <h5>Notes</h5>
	        <?=$recipe['notes'] ?>
        </div>
    </section>
    <script src="script.js"></script>
</div>
</body>
</html>