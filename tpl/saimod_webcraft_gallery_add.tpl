<h3>Add Gallery Element</h3>
<table class="table table-hover table-condensed" style="overflow: auto;">
    <tr>
        <td>Gallery</td>
        <td><input type="number" id="input_add_gallery"/></td>
    </tr>
    <tr>
        <td>Position</td>
        <td><input type="number" id="input_add_position"/></td>
    </tr>
    <tr>
        <td>Heading</td>
        <td><input type="text" id="input_add_heading"/></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><input type="text" id="input_add_description"/></td>
    </tr>
    <tr>
        <td>File</td>
        <td>
            <select id="input_add_file_cat">${file_cat_options}</select>
            <select id="input_add_file_id">${file_id_options}</select>
        </td>
    </tr>
</table>
<img id="img_preview" src="./api.php?call=files&cat=&id=" style="max-width: 100%"/>
</br>
</br>
<input type="button" class="btn btn-success" id="btn_add" value="Add"/>
<input type="button" class="btn" id="btn_back" value="Back" gallery="1"/>