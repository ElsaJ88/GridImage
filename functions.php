<?php

function convertImage($image, $gridCount, $linePixels, $lineColor, $userId, $imageId )
{

    $image = imagecreatefromjpeg($image);

    $width  = imagesx($image);
    $height = imagesy($image);
    imagesetthickness($image, $linePixels);


    $gridSize = $width / $gridCount;

    // calculate linesize (depending on image and gridsize)

    $gridColor = $lineColor === 'white' ? 
        imagecolorallocatealpha($image, 255, 255, 255, 0) :
        imagecolorallocatealpha($image, 0, 0, 0, 0);
    
    for ($x = 0; $x <= $width; $x += $gridSize) {
        imageline($image, $x, 0, $x, $height, $gridColor);
    }
    
    for ($y = 0; $y <= $height; $y += $gridSize) {
        imageline($image, 0, $y, $width, $y, $gridColor);
    }

    

    $dir = 'images/' . $userId;

if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}
    $path = 'images/'. $userId . '/' . $imageId . ".jpg";

    imagejpeg($image, $path , 90);

    // imagedestroy($image);

    return true;
}