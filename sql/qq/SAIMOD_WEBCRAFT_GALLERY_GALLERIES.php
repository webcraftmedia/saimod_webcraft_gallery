<?php
namespace DBD;

class SAIMOD_WEBCRAFT_GALLERY_GALLERIES extends \SYSTEM\DB\QQ {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg
'',
//mys
'SELECT DISTINCT gallery FROM webcraft_gallery;'
);}}