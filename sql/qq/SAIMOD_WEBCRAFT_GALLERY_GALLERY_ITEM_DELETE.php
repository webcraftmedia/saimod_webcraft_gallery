<?php
namespace DBD;

class SAIMOD_WEBCRAFT_GALLERY_GALLERY_ITEM_DELETE extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg
'',
//mys
'DELETE FROM webcraft_gallery WHERE ID = ?;'
);}}