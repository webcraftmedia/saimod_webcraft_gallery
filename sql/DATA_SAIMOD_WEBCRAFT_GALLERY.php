<?php
namespace SQL;
class DATA_SAIMOD_WEBCRAFT_GALLERY extends \SYSTEM\DB\QI {
    public static function get_class(){return \get_class();}
    public static function files_mysql(){
        return array(   \SYSTEM\SERVERPATH(new \PSAI(),'/saimod_webcraft_gallery/sql/mysql/schema_webcraft_gallery.sql'),
                        \SYSTEM\SERVERPATH(new \PSAI(),'/saimod_webcraft_gallery/sql/mysql/saimod_webcraft_gallery.sql'),
                        \SYSTEM\SERVERPATH(new \PSAI(),'/saimod_webcraft_gallery/sql/mysql/saimod_webcraft_gallery_page.sql'));
    }    
}