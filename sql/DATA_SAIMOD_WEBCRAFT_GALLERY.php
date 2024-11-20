<?php
namespace SQL;
class DATA_SAIMOD_WEBCRAFT_GALLERY extends \SYSTEM\DB\QI {
    public static function get_class(){return static::class;}
    public static function files_mysql(){
        return array(   (new \PSAI('/saimod_webcraft_gallery/sql/mysql/schema_webcraft_gallery.sql'))->SERVERPATH(),
                        (new \PSAI('/saimod_webcraft_gallery/sql/mysql/saimod_webcraft_gallery.sql'))->SERVERPATH(),
                        (new \PSAI('/saimod_webcraft_gallery/sql/mysql/saimod_webcraft_gallery_page.sql'))->SERVERPATH());
    }    
}