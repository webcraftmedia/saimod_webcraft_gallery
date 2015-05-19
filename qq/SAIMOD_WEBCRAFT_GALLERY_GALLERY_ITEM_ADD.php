<?php
namespace DBD;

class SAIMOD_WEBCRAFT_GALLERY_GALLERY_ITEM_ADD extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg
'',
//mys
'INSERT INTO webcraft_gallery (gallery, position, heading, description, file_cat, file_id) VALUES (?,?,?,?,?,?);'
);}}