<?php

require_once 'thumbnails/Image.php';
require_once 'thumbnails/CreateThumbnail.php';
require_once 'thumbnails/AllCreateThumbnail.php';


$allFolderFiles = 'img_origem/';
$maxWidth = 100;
$maxHeight = 100;
$folderThumbnails = 'image/';
$quality = 100;

$thumb = new AllCreateThumbnail($allFolderFiles, $maxWidth, $maxHeight, $folderThumbnails, $quality);
$thumbNovoImagem = new AllCreateThumbnail($allFolderFiles, $maxWidth, $maxHeight, $folderThumbnails, $quality);



$thumb->allMakeThumb();

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
