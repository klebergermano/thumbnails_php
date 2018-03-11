<?php

/**
 * Retorna informações da imagem
 *
  // @author Kleber Germano <Kleberus> kleber_lsgermano@hotmail.com

 * 
 */
class Image {

    private $filename, $width, $height, $extension, $numExt, $mime, $bits, $channels, $imgWidhHeight;
    private $folderFilename;

    function __construct($folderFilename, $filename) {
        
        $this->folderFilename = $folderFilename;
        $this->filename = $filename;
    }

    public function imageInfo() {

        $imageinfo = getimagesize($this->folderFilename.$this->filename);
        $this->width = $imageinfo[0];
        $this->height = $imageinfo[1];
        $this->numExt = $imageinfo[2]; //returns '0/UNKNOWN', '1/GIF', '2/JPEG' , '3/PNG' ... 16
        $this->imgWidhHeight = $imageinfo[3];
        $this->bits = $imageinfo['bits'];
        //$this->channels = $imageinfo['channels'];
        $this->mime = $imageinfo['mime'];
        
        $this->convExtension();

    }

    private function convExtension() {

        switch ($this->getNumExt()) {
            case 1: $this->setExtension(".gif");
                break;
            case 2: $this->setExtension(".jpg");
                break;
            case 3: $this->setExtension(".png");
                break;
            case 4 : $this->setExtension(".swf");
                break;
            case 5: $this->setExtension(".psd");
                break;
            case 6: $this->setExtension(".bmp");
                break;
            case 7: $this->setExtension(".tiff");
                break; //tiff ii               
            case 8: $this->setExtension(".tiff");
                break; //tiff MM               
            case 9: $this->setExtension(".jpc");
                break;
            case 10: $this->setExtension(".jp2");
                break;
            case 11: $this->setExtension(".jpx");
                break;
            case 12: $this->setExtension(".jb2");
                break;
            case 13: $this->setExtension(".swc");
                break;
            case 14: $this->setExtension(".iff");
                break;
            case 15: $this->setExtension(".wbmp");
                break;
            case 16: $this->setExtension(".xbm");
                break;
            case 17: $this->setExtension(".ico");
                break;
            case 18: $this->setExtension(".count");
                break;
            
            default: $this->setExtension("undefined");
        }
    }

    //Getters
function getFolderFilename(){
    return $this->folderFilename;
}
    function getFilename() {
        return $this->filename;
    }

    function getWidth() {
        return $this->width;
    }

    function getHeight() {
        return $this->height;
    }

    function getNumExt() {
        return $this->numExt;
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
        protected function setFolderFilename($folderFilename) {
        $this->folderFilename = $folderFilename;
    }
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

    protected function setNumExt($numExt) {
        $this->numExt = $numExt;
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
