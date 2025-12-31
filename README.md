# Image Grid Tool
#### Video Demo:  <[YouTube Video](https://www.youtube.com/watch?v=wDxWb2pdVbw)>
#### Description:

With this tool you can add a grid raster over an image, which is usefull for drawing or painting from a reference photo.

You can select an image, the amount of grid you would like and if you want black or white lines. 

The converted images are saved for you, you can only see your own pictures. 

I made this tool in PHP, because it is used at my work and I would like to get a better understanding of the language.

## index.php
In the index.php file, the first check is if you are logged in, if you are not you will get to choose to loging or register.
If the user registered or logged in, they get to see the form to add images, and also they can see their previous uploaded images.

## login.php
This is a simple login from to enter the username and password. The form method 'POST' is used and on submit the form is send to 'login.inc.php'.

## login.inc.php
After the login inputs are submitted, in this file first there will be checked if the username exists and if so, the password will be checked. With a build in php function `password_verify()`.
If the username does not exists or the password does not match, there will be shown an error message. If not the user is and name will be added to a session and the user is rederected to the indexpage.

## register.php
This page is very similar to the login page, also the post method is used and the submitted form is send to 'register.inc.login'.



For each view a made a file, like loging.php and register.php. For the form handling i made a seperate php file in a folder called 'includes', so this functionallity is seperate from the view.

In the login.inc.php en register.inc.php files I check if the inputs are correct and if not the right error message is shown.
If the input is valid the pasword will be hashed, with a build in funtion from php.
Then the username, password, email will be added to the database.

I used Xampp to create a local environment and datebase. The database has 2 tables: users and images
Images has a column 'user_id' which has a foreign key which reference the user table 'id'

When logged in, all images which have a user_id of the current user will be shown.

The image is saved in a folder in the project, each user has a folder named after their user id, the image name is the id of the image.
The image source is dynamicly created using the path images/{userid}/{imageId}.



To get the grid on the images, i installed a GD library, which gives defferent function to add the lines to the images.
Then I added an entry to the database table 'images', which contains the user id who uploaded the images, an image name and an image id.

For the styling the styling i used bootstrap in combination with plain css. The form and buttons are all from the bootstrap library.



