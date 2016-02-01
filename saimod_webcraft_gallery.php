<?php
class saimod_webcraft_gallery extends \SYSTEM\SAI\SaiModule {
    public static function getGalleryBootstrap($id){
        $gallery = \SQL\SAIMOD_WEBCRAFT_GALLERY_GALLERY_ID::QQ(array($id));
        $gallery_items = '';
        $first = true;
        while($img = $gallery->next()){
            $img['active'] = $first ? 'active' : '';
            $first = false;
            $gallery_items .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(), 'saimod_webcraft_gallery/tpl/saimod_webraft_gallery_gallery_item.tpl'), $img);}
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(), 'saimod_webcraft_gallery/tpl/saimod_webraft_gallery_gallery.tpl'),
                array('gallery' => $id, 'items' => $gallery_items));
    }
    
    public static function getGalleryGalleria($id){
        $gallery = \SQL\SAIMOD_WEBCRAFT_GALLERY_GALLERY_ID::QQ(array($id));
        $result = '';
        while($img = $gallery->next()){
            $result .= '<img class="carousel-img img-responsive" src="./api.php?call=files&cat='.$img['file_cat'].'&id='.$img['file_id'].'" alt="">';}
        $result .= '<script>Galleria.loadTheme(\''.\SYSTEM\WEBPATH(new PSAI(), 'saimod_webcraft_gallery/js/galleria/themes/classic/galleria.classic.min.js').'\');Galleria.run(\'.galleria\');</script>';
        return $result;
    }
    
    public static function sai_mod_saimod_webcraft_gallery_action_addgalleryitem($gallery, $position, $heading, $description, $file_cat, $file_id){
        if(!\SQL\SAIMOD_WEBCRAFT_GALLERY_GALLERY_ITEM_ADD::QI(array($gallery, $position, $heading, $description, $file_cat, $file_id))){
            throw new SYSTEM\LOG\ERROR("Problem with adding Galleryitem!");}
        return \SYSTEM\LOG\JsonResult::ok();}    
    public static function sai_mod_saimod_webcraft_gallery_action_delgalleryitem($id){
        if(!\SQL\SAIMOD_WEBCRAFT_GALLERY_GALLERY_ITEM_DELETE::QI(array($id))){
            throw new SYSTEM\LOG\ERROR("Problem with deleting Galleryitem!");}
        return \SYSTEM\LOG\JsonResult::ok();}
    public static function sai_mod_saimod_webcraft_gallery_action_chggalleryitem($id, $gallery, $position, $heading, $description, $file_cat, $file_id){
        if(!\SQL\SAIMOD_WEBCRAFT_GALLERY_GALLERY_ITEM_CHG::QI(array($gallery, $position, $heading, $description, $file_cat, $file_id, $id))){
            throw new SYSTEM\LOG\ERROR("Problem with changing Galleryitem!");}
        return \SYSTEM\LOG\JsonResult::ok();}
    
    public static function sai_mod_saimod_webcraft_gallery_action_addgallery(){
        $vars = array('file_cat_options' => self::select_options_cat(), 'file_id_options' => self::sai_mod_saimod_webcraft_gallery_action_select_options_id(array_keys(\SYSTEM\FILES\files::get())[0]));
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(), 'saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_add.tpl'),$vars);
    }    
    
    private static function select_options_cat($cat = null){
        $result = '';
        $cats = \SYSTEM\FILES\files::get();
        foreach($cats as $name=>$path){
            $selected = $name == $cat ? 'selected' : '';
            $result .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(), 'saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_file_option.tpl'), array('name' => $name, 'selected' => $selected));
        }
        return $result;
    }
    
    public static function sai_mod_saimod_webcraft_gallery_action_select_options_id($cat, $id = null){
        $result = '';
        $files = \SYSTEM\FILES\files::get($cat);
        foreach($files as $file){
            $selected = $file == $id ? 'selected' : '';
            $result .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(), 'saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_file_option.tpl'), array('name' => $file, 'selected' => $selected));
        }
        return $result;
    }
    
    public static function sai_mod_saimod_webcraft_gallery_action_showgalleryitem($gallery,$id){
        $vars = \SQL\SAIMOD_WEBCRAFT_GALLERY_GALLERY_ITEM_ID::Q1(array($gallery,$id));
        $vars = array_merge($vars, array('file_cat_options' => self::select_options_cat($vars['file_cat']), 'file_id_options' => self::sai_mod_saimod_webcraft_gallery_action_select_options_id($vars['file_cat'],$vars['file_id'])));
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(), 'saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_show.tpl'),$vars);
    }
    
    public static function sai_mod_saimod_webcraft_gallery(){
        $galleries = \SQL\SAIMOD_WEBCRAFT_GALLERY_GALLERIES::QQ();
        $vars = array('tabopts' => '', 'firsttab' => '');
        $first = true;
        while($gallery = $galleries->next()){
            $gallery['active'] = $first ? 'active' : '';
            if($first){$vars['firsttab'] = self::sai_mod_saimod_webcraft_gallery_action_tab($gallery['gallery']);}
            $first = false;
            $vars['tabopts'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(), 'saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_tabopt.tpl'), $gallery);}
        
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(), 'saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_tabs.tpl'),$vars);
    }
    
    public static function sai_mod_saimod_webcraft_gallery_action_tab($name){
        $gallery = \SQL\SAIMOD_WEBCRAFT_GALLERY_GALLERY_ID::QQ(array($name));
        $content = '';
        while($entry = $gallery->next()){
            $content .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(), 'saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_tabentry.tpl'), $entry);}
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new PSAI(), 'saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_tab.tpl'),
                array('content' => $content, 'gallery' => self::getGalleryBootstrap($name)));
    }
    
    public static function html_li_menu(){return '<li><a href="#!gallery">Gallery</a></li><li class="divider"></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    public static function js(){
        return array(  \SYSTEM\WEBPATH(new PSAI(),'saimod_webcraft_gallery/js/saimod_webcraft_gallery.js'));}
    public static function css(){
        return array();}   
}