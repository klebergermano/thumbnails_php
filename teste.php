<?php 


$endThu = "original.png";
$newX = 400;
$newY = 200; 
$endImg = "0x1.png";
$fileType = "png";
$teste = new teste();

$teste->redimesionImage($endThu, $newX, $newY, $endImg, $fileType);

class teste {
 public function redimesionImage($endThu,$newX,$newY,$endImg,$fileType){

    // Copy the image to be resized
    copy($endThu, $endImg);

    // Retrieves the image data
    list($width, $height) = getimagesize($endImg);

    // If the width is greater ...
    if($width >= $height) {

        // I set the width of the image to the desired size ...
        $newXimage = $newX;

        // And calculate the size of the time to not stretch the image
        $newYimage = ($height / $width) * $newXimage;

    } else {

        // Define the desired height ...
        $newYimage = $newY;

        // And calculate the width to not stretch the image
        $newXimage = ($width / $height) * $newYimage;
    }

    // Creates an initial image in memory with calculated measures
    $imageInicial = imagecreatetruecolor(ceil($newXimage), ceil($newYimage));

    // I check the extension of the image and create their respective image
    if ($fileType == 'jpeg')  { $endereco = imagecreatefromjpeg($endImg);}
 if ($fileType == 'jpg')  { $endereco = imagecreatefromjpeg($endImg);}      
    if ($fileType == 'png')    {
         
        $endereco = imagecreatefrompng($endImg);
        imagealphablending($imageInicial, false);
        imagesavealpha($imageInicial,true);
        $transparent = imagecolorallocatealpha($imageInicial, 255, 255, 255, 127);
        imagefilledrectangle($endereco, 0, 0, $newXimage, $newYimage, $transparent);
    }
    if ($fileType == 'gif')  {
        $endereco = imagecreatefromgif($endImg);
        $this->setTransparency($imageInicial,$endereco);
    }

    // I merge the image to be resized with created in memory
    imagecopyresampled($imageInicial, $endereco, 0, 0, 0, 0, ceil($newXimage), ceil($newYimage), ceil($width), ceil($height));

    // Creates the image in its final lacal, according to its extension
    if ($fileType == 'jpeg') {imagejpeg($imageInicial, $endImg, 100);}
 if ($fileType == 'jpg') {imagejpeg($imageInicial, $endImg, 100);}
    if ($fileType == 'png'){ imagepng($imageInicial, $endImg, 9);}
    if ($fileType == 'gif'){ imagegif($imageInicial, $endImg, 100);}
}

// Function to assist the PNG images, sets the transparency in the image
private function setTransparency($new_image,$image_source){ 
    $transparencyIndex = imagecolortransparent($image_source); 
    $transparencyColor = array('red' => 255, 'green' => 255, 'blue' => 255);     
    if($transparencyIndex >= 0){
        $transparencyColor = imagecolorsforindex($image_source, $transparencyIndex);    
    }
    $transparencyIndex = imagecolorallocate($new_image, $transparencyColor['red'], $transparencyColor['green'], $transparencyColor['blue']); 
    imagefill($new_image, 0, 0, $transparencyIndex); 
    imagecolortransparent($new_image, $transparencyIndex);        
}



}


