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
require_once "CreateThumbnail.php";

class AllCreateThumbnail extends CreateThumbnail {
    
private $allFolderFiles;
    
public function __construct($allFolderFiles, $maxWidth, $maxHeight, $folderThumbnails, $quality = 100) {
        
        $this->allFolderFiles = $allFolderFiles;
        $filename = '';
        $nameThumbnail = '';
        $folderImg = '';
        
        parent::__construct($folderImg, $filename, $maxWidth, $maxHeight, $folderThumbnails, $nameThumbnail, $quality);
    }

//atributos
    public function allMakeThumb() {

       // chdir('img_origem'); //seleciona o diretório das imagens ex "image/wallpapers"
        
        $arquivos = glob($this->allFolderFiles. "{*.jpg,*.JPG,*.png,*.PNG,*.gif,*.bmp}", GLOB_BRACE);

        foreach ($arquivos as $nameImg) {
            
            
            $nameThumb  = trim(str_replace('img_origem/', '', $nameImg));
            $this->setFilename($nameImg);
            $this->setNameThumbnail($nameThumb);
            
            $this->makeThumb();
        }

        //métodos
    }

}
