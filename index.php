<?php

require_once 'thumbnails/Image.php';
require_once 'thumbnails/CreateThumbnail.php';



chdir('img_origem'); //seleciona o diretório das imagens ex "image/wallpapers"

$arquivos = glob("{*.jpg,*.JPG,*.png,*.PNG,*.gif,*.bmp}", GLOB_BRACE);


foreach ($arquivos as $nameImg) {
    
    echo $nameImg.'<br>';
    $folderFilename = '';
    $filename = $nameImg;
    $maxWidth = 100;
    $maxHeight = 100;
    $folderThumbnail = '../image';
    $nameThumbnail = 'NOVO-'.$nameImg;
    $quality = 100;

    $thumb = new CreateThumbnail( $folderFilename, $filename, $maxWidth, $maxHeight, $folderThumbnail, $nameThumbnail, $quality);
    
}


//print_r($thumb);

//$image = new Image("teste.jpg");
//print_r($image);
