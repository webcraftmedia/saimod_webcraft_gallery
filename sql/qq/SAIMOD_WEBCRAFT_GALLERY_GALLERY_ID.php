<?php
namespace SQL;
class SAIMOD_WEBCRAFT_GALLERY_GALLERY_ID extends \SYSTEM\DB\QP {
    public static function get_class(){return static::class;}
    public static function mysql(){return
'SELECT * FROM webcraft_gallery WHERE gallery = ? ORDER BY position ASC;';
    }    
}