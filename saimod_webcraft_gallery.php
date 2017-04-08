<?php
class saimod_webcraft_gallery extends \SYSTEM\SAI\SaiModule {    
    public static function getGalleryFlexslider($id){
        $gallery = \SQL\SAIMOD_WEBCRAFT_GALLERY_GALLERY_ID::QQ(array($id));
        $result = '<ul class="slides">';
        while($img = $gallery->next()){
            $result .= '<li><img class="img-responsive" src="./files/'.$img['file_cat'].'/'.$img['file_id'].'" alt="'.$img['description'].'"></li>';}
        $result .= '</ul>';
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
        return \SYSTEM\PAGE\replace::replaceFile((new PSAI('saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_add.tpl'))->SERVERPATH(),$vars);
    }    
    
    private static function select_options_cat($cat = null){
        $result = '';
        $cats = \SYSTEM\FILES\files::get();
        foreach($cats as $name=>$path){
            $selected = $name == $cat ? 'selected' : '';
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PSAI('saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_file_option.tpl'))->SERVERPATH(), array('name' => $name, 'selected' => $selected));
        }
        return $result;
    }
    
    public static function sai_mod_saimod_webcraft_gallery_action_select_options_id($cat, $id = null){
        $result = '';
        $files = \SYSTEM\FILES\files::get($cat);
        foreach($files as $file){
            $selected = $file == $id ? 'selected' : '';
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PSAI('saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_file_option.tpl'))->SERVERPATH(), array('name' => $file, 'selected' => $selected));
        }
        return $result;
    }
    
    public static function sai_mod_saimod_webcraft_gallery_action_showgalleryitem($gallery,$id){
        $vars = \SQL\SAIMOD_WEBCRAFT_GALLERY_GALLERY_ITEM_ID::Q1(array($gallery,$id));
        $vars = array_merge($vars, array('file_cat_options' => self::select_options_cat($vars['file_cat']), 'file_id_options' => self::sai_mod_saimod_webcraft_gallery_action_select_options_id($vars['file_cat'],$vars['file_id'])));
        return \SYSTEM\PAGE\replace::replaceFile((new PSAI('saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_show.tpl'))->SERVERPATH(),$vars);
    }
    
    public static function sai_mod_saimod_webcraft_gallery(){
        $galleries = \SQL\SAIMOD_WEBCRAFT_GALLERY_GALLERIES::QQ();
        $vars = array('tabopts' => '', 'firsttab' => '');
        $first = true;
        while($gallery = $galleries->next()){
            $gallery['active'] = $first ? 'active' : '';
            if($first){$vars['firsttab'] = self::sai_mod_saimod_webcraft_gallery_action_tab($gallery['gallery']);}
            $first = false;
            $vars['tabopts'] .= \SYSTEM\PAGE\replace::replaceFile((new PSAI('saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_tabopt.tpl'))->SERVERPATH(), $gallery);}
        
        return \SYSTEM\PAGE\replace::replaceFile((new PSAI('saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_tabs.tpl'))->SERVERPATH(),$vars);
    }
    
    public static function sai_mod_saimod_webcraft_gallery_action_tab($name){
        $gallery = \SQL\SAIMOD_WEBCRAFT_GALLERY_GALLERY_ID::QQ(array($name));
        $content = '';
        while($entry = $gallery->next()){
            $content .= \SYSTEM\PAGE\replace::replaceFile((new PSAI('saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_tabentry.tpl'))->SERVERPATH(), $entry);}
        return \SYSTEM\PAGE\replace::replaceFile((new PSAI('saimod_webcraft_gallery/tpl/saimod_webcraft_gallery_tab.tpl'))->SERVERPATH(),
                array('content' => $content, 'gallery' => self::getGalleryFlexslider($name)));
    }
    
    public static function html_li_menu(){return '<li><a href="#!gallery"><span class="glyphicon glyphicon-picture"></span>&nbsp;&nbsp;Gallery</a></li><li class="divider"></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    public static function js(){
        return array(   \LIB\lib_flexslider::js(),
                        new PSAI('saimod_webcraft_gallery/js/saimod_webcraft_gallery.js'));}
    public static function css(){
        return array(   \LIB\lib_flexslider::css());}   
}