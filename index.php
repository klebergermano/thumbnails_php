<?php
require_once 'thumbnails/Image.php';
require_once 'thumbnails/CreateThumbnail.php';



chdir( 'img_origem' );//seleciona o diretório das imagens ex "image/wallpapers"

$arquivos = glob("{*.jpg,*.JPG,*.png,*.PNG, *.gif,*.bmp}", GLOB_BRACE);
echo "<pre>";
print_r($arquivos);
echo "<pre>";

foreach($arquivos as $nameImg){
     
    echo $nameImg.'<br>';
    
}

$folderFilename = 'teste';
$filename = '02.ico';
$maxWidth = 100;
$maxHeight = 100;
$folderThumbnail = 'image';
$nameThumbnail = 'Nv';
$quality = 100;

echo '<pre>';

//$thumb = new CreateThumbnail( $folderFilename, $filename, $maxWidth, $maxHeight, $folderThumbnail, $nameThumbnail, $quality);
//print_r($thumb);

//$image = new Image("teste.jpg");
//print_r($image);
