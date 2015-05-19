<?php
namespace DBD;

class SAIMOD_WEBCRAFT_GALLERY_GALLERY_ITEM_CHG extends \SYSTEM\DB\QP {
    protected static function query(){
        return new \SYSTEM\DB\QQuery(get_class(),
//pg
'',
//mys
'UPDATE webcraft_gallery SET gallery = ?, position = ?, heading = ?, description = ?, file_cat = ?, file_id= ? WHERE ID = ?;'
);}}