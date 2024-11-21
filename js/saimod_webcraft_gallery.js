function init_saimod_webcraft_gallery() { 
    // $('#gallerytab a').click(function (e) {e.preventDefault(); load_tab($(this).attr('gallery')); $(this).tab('show');});
    $('#tabs_gallery a').click(function (e) {
        $('#tabs_gallery li a').each(function(){
            $(this).removeClass('active');});
        $(this).addClass('active');
    });
    register_controlls();
}

function load_tab(name){
    $('#tab_gallery').load('./sai.php?sai_mod=saimod_webcraft_gallery&action=tab&name='+name, function(){
        register_controlls();
    });
}

function register_controlls(){
    $('.flexslider').flexslider({
        animation: "slide",
        directionNav: true,
        slideshow: true,
        animationLoop: false
    });
    $('.gallery_entry').click(function(){
        $('#tab_gallery').load('./sai.php?sai_mod=saimod_webcraft_gallery&action=showgalleryitem&gallery='+$(this).attr('gallery')+'&id='+$(this).attr('galleryid'), function(){
            $('#input_show_file_cat').change(function(){
                $('#input_show_file_id').load('./sai.php?sai_mod=saimod_webcraft_gallery&action=select_options_id&cat='+$('#input_show_file_cat').val(),function(){
                    $('#img_preview').attr('src', './api.php?call=files&cat='+$('#input_show_file_cat').val()+'&id='+$('#input_show_file_id').val());
                });                
            });
            $('#input_show_file_id').change(function(){
               $('#img_preview').attr('src', './api.php?call=files&cat='+$('#input_show_file_cat').val()+'&id='+$('#input_show_file_id').val());
            });            
            $('#img_preview').attr('src', './api.php?call=files&cat='+$('#input_show_file_cat').val()+'&id='+$('#input_show_file_id').val());
            $('#btn_back').click(function(){
                 load_tab($(this).attr('gallery'));});
            $('#btn_del').click(function(){
                $.ajax({
                    url: './sai.php?sai_mod=saimod_webcraft_gallery&action=delgalleryitem',
                    type: 'GET',
                    data: {   id : $(this).attr('galleryid')},
                    success: function (data) {
                        if(!data || !data['status']){
                            alert("Fail: "+data);
                            return;}
                        alert("OK: "+data);
                    }
                }); 
            });
            $('#btn_chg').click(function(){
                $.ajax({
                    url: './sai.php?sai_mod=saimod_webcraft_gallery&action=chggalleryitem',
                    type: 'GET',
                    data: {   id : $(this).attr('galleryid'),
                              gallery : $('#input_show_gallery').val(),
                              position : $('#input_show_position').val(),
                              heading : $('#input_show_heading').val(),
                              description : $('#input_show_description').val(),
                              file_cat : $('#input_show_file_cat').val(),
                              file_id : $('#input_show_file_id').val()},
                    success: function (data) {
                        if(!data || !data['status']){
                            alert("Fail: "+data);
                            return;}
                        alert("OK: "+data);
                    }
                });
            });
        });
    });
    $('.galleryadd').click(function(){
        $('#tab_gallery').load('./sai.php?sai_mod=saimod_webcraft_gallery&action=addgallery', function(){
            $('#input_add_file_cat').change(function(){
                $('#input_add_file_id').load('./sai.php?sai_mod=saimod_webcraft_gallery&action=select_options_id&cat='+$('#input_add_file_cat').val(),function(){
                    $('#img_preview').attr('src', './api.php?call=files&cat='+$('#input_add_file_cat').val()+'&id='+$('#input_add_file_id').val());
                });                
            });
            $('#input_add_file_id').change(function(){
               $('#img_preview').attr('src', './api.php?call=files&cat='+$('#input_add_file_cat').val()+'&id='+$('#input_add_file_id').val());
            });            
            $('#img_preview').attr('src', './api.php?call=files&cat='+$('#input_add_file_cat').val()+'&id='+$('#input_add_file_id').val());
            $('#btn_add').click(function(){
                $.ajax({
                    url: './sai.php?sai_mod=saimod_webcraft_gallery&action=addgalleryitem',
                    type: 'GET',
                    data: {   gallery : $('#input_add_gallery').val(),
                              position : $('#input_add_position').val(),
                              heading : $('#input_add_heading').val(),
                              description : $('#input_add_description').val(),
                              file_cat : $('#input_add_file_cat').val(),
                              file_id : $('#input_add_file_id').val()},
                    success: function (data) {
                        if(!data || !data['status']){
                            alert("Fail: "+data);
                            return;}
                        alert("OK: "+data);
                    }
                });
            });
            $('#btn_back').click(function(){
                 load_tab($(this).attr('gallery'));});
        });
    });
}