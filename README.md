#Image Grid Tool
#### Video Demo:  <[YouTube Video](https://www.youtube.com/watch?v=wDxWb2pdVbw)>
#### Description:

With this tool you can add a grid raster over an image, which is usefull for drawing or painting from a reference photo.
You can select an image, the amount of grid you would like and if you want black or white lines. 
The converted images are saved for you, you can only see your own pictures. 

I made the tool in PHP, because it is used at my work and I would like to get a better understanding of the language.

In the index.php file, the first check is if you are logged in, if you are not you will get to choose to loging or register.
For each view a made a file, like loging.php and register.php. For the form handling i made a seperate php file in a folder called 'includes', so this functionallity is seperate from the view.

If the user registered or logged in, they get to see the form to add images, and also they can see their previous uploaded images

