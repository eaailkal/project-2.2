<?php
$today = date("d.m.y"); 
return "
<section>
<h1>Add new work</h1>

<form method=\"post\" action=\"index.php?page=upload\" class=\"form\" enctype=\"multipart/form-data\">
<fieldset>
<legend>Upload</legend>

    <input type=\"date\" name=\"date\" value=\"$today\" required>
    <label for=\"\" placeholder=\"Date\" alt=\"Date\"></label>
    
    <input type=\"text\" name=\"title\" required>
    <label for=\"\" placeholder=\"Project title\" alt=\"Title\"></label>
    
    <input type=\"text\" name=\"client\" required>
    <label for=\"\" placeholder=\"Client\" alt=\"Client\"></label>
   
    <textarea name=\"description\" required></textarea>
    <label for=\"\" placeholder=\"Description\" alt=\"Description\"></label>
    
    <input type=\"text\" name=\"emb\" required>
    <label for=\"\" placeholder=\"Youtube Embed\" alt=\"Youtube Embed\"></label>
    
    <input type=\"file\" name=\"poster\" accept=\"image/*\"/>
    <label for=\"\" placeholder=\"Poster\" alt=\"Poster\"></label>
    
    <textarea name=\"reference\" required></textarea>
    <label for=\"\" placeholder=\"Reference\" alt=\"Reference\"></label>
    
    <select name=\"category\" class=\"not_chosen\" required>
    <option value=\"\" disabled selected>Choose category</option>
    <option value=\"company\">Company video</option>
    <option value=\"music\">Music</option>
    <option value=\"film\">Film</option>
    <option value=\"theatre\">Theatre</option>
    </select>
    <span class=\"arrow\"></span>

    <input type=\"submit\" value=\"Save\" name=\"new-work\" />
    
</fieldset>
</form>
</section>
";
