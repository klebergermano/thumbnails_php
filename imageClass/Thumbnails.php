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
class Thumbnails  {

//atributos
    private $folder;
    private $filename;
    private $maxWidth;
    private $maxHeight;
    private $ratio_orig;
    private $image_p;
    private $width_orig, $height_orig;
    private $outputFilename;
    private $quality;

    //métodos

    public function __construct($folder, $filename, $maxWidth, $maxHeight, $outputFilename, $quality = 100) {
        $this->folder = $folder;
        $this->filename = $filename;
        $this->maxWidth = $maxWidth;
        $this->maxHeight = $maxHeight;
        $this->outputFilename = $outputFilename;
        $this->quality = $quality;

        $this->imageSize();
        $this->ratioImage();
        $this->resample();
        $this->outputImg();
    }

    public function imageSize() {

        list($width_orig, $height_orig) = getimagesize($this->filename);

        $this->width_orig = $width_orig;
        $this->height_orig = $height_orig;
    }

    public function ratioImage() {

        $this->ratio_orig = $this->width_orig / $this->height_orig;

        if ($this->width_orig / $this->height_orig > $this->ratio_orig) {

            $width_ratio = $this->maxHeight * $this->ratio_orig;

            $this->maxWidth = $width_ratio;
        } else {

            $height_ratio = $this->maxWidth / $this->ratio_orig;
            $this->maxHeight = $height_ratio;
        }
    }

    public function resample() {

        $this->image_p = imagecreatetruecolor($this->maxWidth, $this->maxHeight);
        $image = imagecreatefromjpeg($this->filename);
        imagecopyresampled($this->image_p, $image, 0, 0, 0, 0, $this-> maxWidth, $this->maxHeight, $this->width_orig, $this->height_orig);
    }

    public function outputImg() {
        imagejpeg($this->image_p, $this->folder.'/'.$this->outputFilename, $this->quality);
    }


}
