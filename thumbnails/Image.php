<?php

/**
 * Retorna informações da imagem
 *
  // @author Kleber Germano <Kleberus> kleber_lsgermano@hotmail.com

 * 
 */
class Image {

    private $filename, $width, $height, $extension, $mime, $bits, $channels, $imgWidhHeight;
    private $url;
    
    function __construct($filename) {
        $this->filename = $filename;
        $this->setImageInfo();
    }

        private function setImageInfo() {

        $imageinfo = getimagesize($this->filename);      
        $this->width = $imageinfo[0];
        $this->height = $imageinfo[1];
        $this->extension = $imageinfo[2]; //returns '0/UNKNOWN', '1/GIF', '2/JPEG' , '3/PNG' ... 16
        $this->imgWidhHeight = $imageinfo[3];
        $this->bits = $imageinfo['bits'];
        $this->channels = $imageinfo['channels'];
        $this->mime = $imageinfo['mime'];
    }
    
    //Getters
    function getFilename() {
        return $this->filename;
    }

    function getWidth() {
        return $this->width;
    }

    function getHeight() {
        return $this->height;
    }

    function getExtension() {
        return $this->extension;
    }

    function getMime() {
        return $this->mime;
    }

    function getBits() {
        return $this->bits;
    }

    function getChannels() {
        return $this->channels;
    }

    function getImgWidhHeight() {
        return $this->imgWidhHeight;
    }

    function getUrl() {
        return $this->url;
    }
    
    
    //Setters
    protected function setFilename($filename) {
        $this->filename = $filename;
    }

    protected function setWidth($width) {
        $this->width = $width;
    }

    protected function setHeight($height) {
        $this->height = $height;
    }

    protected function setExtension($extension) {
        $this->extension = $extension;
    }

    protected function setMime($mime) {
        $this->mime = $mime;
    }

    protected function setBits($bits) {
        $this->bits = $bits;
    }

    protected function setChannels($channels) {
        $this->channels = $channels;
    }

    protected function setImgWidhHeight($imgWidhHeight) {
        $this->imgWidhHeight = $imgWidhHeight;
    }

   protected function setUrl($url) {
        $this->url = $url;
    }




}
