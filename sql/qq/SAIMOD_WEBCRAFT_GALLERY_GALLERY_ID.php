<?php
namespace DBD;

class SAIMOD_WEBCRAFT_GALLERY_GALLERY_ID extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg
'',
//mys
'SELECT * FROM webcraft_gallery WHERE gallery = ? ORDER BY position ASC;'
);}}