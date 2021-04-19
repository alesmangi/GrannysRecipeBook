# GrannysRecipeBook
Website developed from scratch. Recipe book for users to add their own recipes. Individually done for a final project for my Web Development Class. Still under development, as it was made in under a week. Feedback is greatly appreciated!

add-new.html handles the template of a new recipe being added. This allows the user to add: Recipe's title, time to prepare and cook, how many people like it, creator's name, ingredients, recipe steps, up to 4 photos (minimum of 1), nutritional value, and notes. 

index.php handles the list of all the current recipes created. These will show the recipe number, the main image, the name, the duration, and a button which allows the user to view. 

linking.php  handles situational erorrs such as if no image was imported, if the recipe was not saved successfully, and if the wrong credentials were used to log in. 

login.html handles the user login tab, where there is the name of the website and a button that allows the user to input the login details. 

recipe.sql handles the database of the website, where all the information is stored. 

script.js handles the javascript aspect of the project, handling mostly the openTab function. 

selector.php connects the database to the server, as well as updates the recipes once they are added. 

style.css handles the aesthetic aspect of the server. Still under development. 

view-recipe.php handles the template which is triggered when the user clicks the View button next to the recipes in the index. This shows the recipe and its components. 
