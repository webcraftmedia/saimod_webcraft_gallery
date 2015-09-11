<?php
namespace SQL;
class SAIMOD_WEBCRAFT_GALLERY_GALLERIES extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT DISTINCT gallery FROM webcraft_gallery;';
    }    
}