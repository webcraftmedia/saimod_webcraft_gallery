<h3>Show Gallery Element</h3>
<table class="table table-hover table-condensed" style="overflow: auto;">
    <tr>
        <td>Gallery</td>
        <td>${gallery}</td>
        <td><input type="number" id="input_show_gallery" value="${gallery}"/></td>
    </tr>
    <tr>
        <td>Position</td>
        <td>${position}</td>
        <td><input type="number" id="input_show_position" value="${position}"/></td>
    </tr>
    <tr>
        <td>Heading</td>
        <td>${heading}</td>
        <td><input type="text" id="input_show_heading" value="${heading}"/></td>
    </tr>
    <tr>
        <td>Description</td>
        <td>${description}</td>
        <td><input type="text" id="input_show_description" value="${description}"/></td>
    </tr>
    <tr>
        <td>File</td>
        <td><a href="./api.php?call=files&cat=${file_cat}&id=${file_id}">./api.php?call=files&cat=${file_cat}&id=${file_id}<a> </td>
        <td>
            <select id="input_show_file_cat">${file_cat_options}</select>
            <select id="input_show_file_id">${file_id_options}</select>
        </td>
    </tr>
</table>
<img id="img_preview" src="./api.php?call=files&cat=${file_cat}&id=${file_id}" style="max-width: 100%"/>
</br>
</br>
<input type="button" class="btn btn-success" id="btn_chg"  galleryid="${ID}"value="Change"/>
<input type="button" class="btn btn-danger" id="btn_del" galleryid="${ID}" value="Delete"/>
<input type="button" class="btn" id="btn_back" value="Back" gallery="${gallery}"/>