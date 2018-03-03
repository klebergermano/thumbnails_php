<?php

require_once 'thumbnails/Image.php';
require_once 'thumbnails/CreateThumbnail.php';
require_once 'thumbnails/AllCreateThumbnail.php';


 $folderFilename = 'img_origem/';
    $filename = "teste.jpg";
    $maxWidth = 100;
    $maxHeight = 100;
    $folderThumbnail = 'image';
    $nameThumbnail =  "aaabbbbb";
    $quality = 100;

   $thumb = new CreateThumbnail($folderFilename, $filename, $maxWidth, $maxHeight, $folderThumbnail, $nameThumbnail, $quality);
$thumb->makeThumb();
   
    /*
chdir('img_origem'); //seleciona o diretório das imagens ex "image/wallpapers"
$arquivos = glob("{*.jpg,*.JPG,*.png,*.PNG,*.gif,*.bmp}", GLOB_BRACE);
foreach ($arquivos as $nameImg) {

    $folderFilename = '';
    $filename = $nameImg;
    $maxWidth = 100;
    $maxHeight = 100;
    $folderThumbnail = '../image';
    $nameThumbnail =  $nameImg;
    $quality = 100;

    $thumb = new CreateThumbnail($folderFilename, $filename, $maxWidth, $maxHeight, $folderThumbnail, $nameThumbnail, $quality);
}
*/
