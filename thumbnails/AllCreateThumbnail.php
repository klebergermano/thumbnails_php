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

    public function __construct($folderFilename, $filename , $maxWidth, $maxHeight, $folderThumbnail, $nameThumbnail, $quality = 100) {
        parent::__construct($folderFilename, $filename, $maxWidth, $maxHeight, $folderThumbnail, $nameThumbnail, $quality);

    }

//atributos
    public function allMakeThumb() {

        chdir('img_origem'); //seleciona o diretório das imagens ex "image/wallpapers"
        $arquivos = glob("{*.jpg,*.JPG,*.png,*.PNG,*.gif,*.bmp}", GLOB_BRACE);

        foreach ($arquivos as $nameImg) {

            $this->setFolderFilename('');
            $this->setFilename($nameImg);
            $this->setNameThumbnail($nameImg);
            $this->makeThumb();
        }

        //métodos
    }

}
