<?php
namespace SQL;
class SAIMOD_WEBCRAFT_GALLERY_GALLERY_ITEM_ADD extends \SYSTEM\DB\QP {
    public static function get_class(){return static::class;}
    public static function mysql(){return
'INSERT INTO webcraft_gallery (gallery, position, heading, description, file_cat, file_id) VALUES (?,?,?,?,?,?);';
    }    
}