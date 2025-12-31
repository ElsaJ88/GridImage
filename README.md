# Image Grid Tool
#### Video Demo:  <[YouTube Video](https://www.youtube.com/watch?v=wDxWb2pdVbw)>
#### Description:

With this tool you can add a grid raster over an image, which is usefull for drawing or painting from a reference photo.
I like to draw myself and sometimes used to draw a grid with pencil and a ruler on an images. So I will defenitly use this tool myself very much.

## How it works
First you need to log in or register.
Afetr you logged in you can select an image, the amount of grid you would like (for the width of the image) and if you want black or white grid lines. 
After you click submit the image is converted and you can download the image.
All the converted images are saved for you, you can only see your own pictures when you are logged id. 

I made this tool in PHP, because it is used at my work and I would like to get a better understanding of the language.

#### index.php
In the index.php file, the first check is if you are logged in, if you are not you will get to choose to loging or register.
If the user registered or logged in, they get to see the form to add images, and also they can see their previous uploaded images.

#### login.php
This is a simple login from to enter the username and password. The form method 'POST' is used and on submit the form is send to 'login.inc.php'.

#### login.inc.php
After the login inputs are submitted, in this file first there will be checked if the username exists and if so, the password will be checked. With a build in php function `password_verify()`.
If the username does not exists or the password does not match, there will be shown an error message. If not the user is and name will be added to a session and the user is rederected to the indexpage.

#### register.php
This page is very similar to the login page, you have to insert a username, email, password and a password confirmation. Also the post method is used and the submitted form is send to 'register.inc.login'.

#### register.inc.php
In this file the inputs a checked, this time there is also a check if the password and the password confirmation are the same, if not an error message is shown.
If all the inputs are valid a new entry is send to the database. First the password is hashed with a build in php function `password_hash`.

#### dbh.inc.php
The file 'dbh.inc.php' is included in bot the 'login.inc.php' and 'register.inc.php' file. So they can use the connection to the database.
In this file there is made a connection to the database an a message is shown if the conncection failed.

#### logout.inc.php
This is a simple file, when the user click on the logout button on the index.php file, a form is send to this file. Where the session is cleared from all info.

#### error.php
If the login fails the user is send to this page.

#### grid_image.php
After the user submits an image the form is send to this page.

First the inputs are validated. if valid a grid with will be added.
To get the grid on the images, i installed a GD library, which gives defferent function to add the lines to the images.

I used a seperate file calles 'functions' to store the convert function. 
When the image succecfully is converted an entry to the database table 'images' is send, which contains the user id who uploaded the images, an image name and an image id.
The image is saved in a folder in the project, each user has a folder named after their user id, the image name is the id of the image.
The image source is dynamicly created using the path images/{userid}/{imageId}.

#### other info
For each view a made a file, like loging.php and register.php. For the form handling i made a seperate php file in a folder called 'includes', so this functionallity is seperate from the view.

I used Xampp to create a local environment and datebase. The database has 2 tables: users and images
Images has a column 'user_id' which has a foreign key which reference the user table 'id'

When logged in, all images which have a user_id of the current user will be shown.

For the styling the styling i used bootstrap in combination with plain css. The form and buttons are all from the bootstrap library.
For the layout I used the styles.css file mostly.

#### next

I am planning on adding more functionalities to the tool:
* You can choose the pixel size of the grid lines
* You can choose any color you like for the lines
* The option to delete previously added images
* A maximum amount of uploads
* A 'print' button

I also plan to add more code improvements:
* Better authorization
* Password 



