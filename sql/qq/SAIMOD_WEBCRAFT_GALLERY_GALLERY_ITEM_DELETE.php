<?php
namespace SQL;
class SAIMOD_WEBCRAFT_GALLERY_GALLERY_ITEM_DELETE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'DELETE FROM webcraft_gallery WHERE ID = ?;';
    }    
}