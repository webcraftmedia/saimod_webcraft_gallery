<?php
namespace SQL;
class SAIMOD_WEBCRAFT_GALLERY_GALLERY_ITEM_CHG extends \SYSTEM\DB\QP {
    public static function get_class(){return static::class;}
    public static function mysql(){return
'UPDATE webcraft_gallery SET gallery = ?, position = ?, heading = ?, description = ?, file_cat = ?, file_id= ? WHERE ID = ?;';
    }    
}