<?php

   namespace App\Controller;
   Class Controller{
    public function render($nameFolder,$nameFile,$title,$result){

          include "../app/View/".$nameFolder."/".$nameFile.".php";
    }
   }