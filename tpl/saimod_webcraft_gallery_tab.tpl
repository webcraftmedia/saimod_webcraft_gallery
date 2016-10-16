<style>
    .flexslider .slides img { 
        display: block;
        width: auto; max-height: 500px; margin: auto;
    }
</style>
<div class="flexslider" style="height: 500px;">
    ${gallery}
</div>
<table class="table table-hover table-condensed" style="overflow: auto;">
    <tr>
        <th>ID</th>
        <th>Gallery</th>
        <th>Position</th>
        <th>Heading</th>
        <th>Description</th>
        <th>File</th>
    </tr>
    ${content}
</table>