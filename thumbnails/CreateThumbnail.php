<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Cria um Thumbnail nas pasta img do projeto

  // @author Kleber Germano <Kleberus> kleber_lsgermano@hotmail.com
 */
require_once "Image.php";

class CreateThumbnail extends Image {

//atributos
    private $folderThumbnail;
    private $maxWidth;
    private $maxHeight;
    private $ratio_orig;
    private $image_p;
    private $nameThumbnail;
    private $quality;

    //métodos

    public function __construct($folderFilename, $filename, $maxWidth, $maxHeight, $folderThumbnail, $nameThumbnail, $quality = 100) {
        parent::__construct($folderFilename, $filename);

        $this->folderThumbnail = $folderThumbnail;
        $this->maxWidth = $maxWidth;
        $this->maxHeight = $maxHeight;
        $this->nameThumbnail = $nameThumbnail;
        $this->quality = $quality;
     
    }
    public function makeThumb(){
        $this->imageInfo();
        $this->ratioImage();
        $this->resample();
        $this->extNameThumbnail();
        $this->outputImg();
    }


    protected function ratioImage() {

        $this->ratio_orig = $this->getWidth() / $this->getHeight();

        if ($this->getWidth() / $this->getHeight() > $this->ratio_orig) {

            $width_ratio = $this->maxHeight * $this->ratio_orig;

            $this->maxWidth = $width_ratio;
        } else {

            $height_ratio = $this->maxWidth / $this->ratio_orig;
            $this->maxHeight = $height_ratio;
        }
    }

    protected function resample() {

        $this->image_p = imagecreatetruecolor($this->maxWidth, $this->maxHeight);

        if ($this->getExtension() === '.gif') {
            $image = imagecreatefromgif($this->getFolderFilename() . $this->getFilename());
        } else if ($this->getExtension() === '.jpg') {
            $image = imagecreatefromjpeg($this->getFolderFilename() . $this->getFilename());
        } else if ($this->getExtension() === '.png') {
            $image = imagecreatefrompng($this->getFolderFilename() . $this->getFilename());
            imagealphablending($this->image_p, false);
            imagesavealpha($this->image_p, true);
            $transparent = imagecolorallocatealpha($this->image_p, 255, 255, 255, 127);
            imagefilledrectangle($image, 0, 0, $this->getWidth(), $this->getHeight(), $transparent);
        } else {
            throw new Exception("Formato da imagem <<< " . $this->getExtension() . "  >>> não suportado por favor utilize os formatos JPG/PNG/GIF");
        }

        imagecopyresampled($this->image_p, $image, 0, 0, 0, 0, $this->maxWidth, $this->maxHeight, $this->getWidth(), $this->getHeight());
    }

    protected function outputImg() {

        if ($this->getNumExt() == 1) {

            imagegif($this->image_p, $this->folderThumbnail . '/' . $this->nameThumbnail . $this->getExtension(), $this->quality);
        }

        if ($this->getNumExt() == 2) {

            imagejpeg($this->image_p, $this->folderThumbnail . '/' . $this->nameThumbnail . $this->getExtension(), $this->quality);
        }

        if ($this->getNumExt() == 3) {
            imagepng($this->image_p, $this->folderThumbnail . '/' . $this->nameThumbnail . $this->getExtension(), 9);
        }
    }

    protected function extNameThumbnail() {

        $arrExt = explode('.', $this->nameThumbnail);
        if (!empty($arrExt[1])) {
            $this->setExtension('');
        }
    }
    
    
    
    //SETTERS
    protected function setNameThumbnail($nameThumbnail){
        $this->nameThumbnail = $nameThumbnail;
    }
    //GETTERS

}
