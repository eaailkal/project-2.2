<?php

return"             <h1>Contact us</h1>

                    <section><p>Duke Denver Film's primary task is to convey the good story. Humour, ingenuity and the desire to create and innovate has over time proved to be our characteristics. We make films that have something to say with stories that can inspire and motivate.</p><br />
                    <p>Have a story to tell? You can write us by email <a href=\"mailto:info@dukedenverfilm.dk\">info@dukedenverfilm.dk</a> or use the form provided below.</p><br /></section>
                                    
                    <form name=\"htmlform\" method=\"post\" class=\"form\" action=\"index.php?page=contact\">
                    <fieldset>
                    <legend>Contact details</legend>
                        
                        <input type=\"text\" id=\"name\" name=\"first_name\" required=\"required\" autocapitalize=\"words\" autofocus=\"autofocus\">                   
                        <label for=\"\" placeholder=\"Your Full Name\" alt=\"Full Name\"></label>
                        
                        <input type=\"tel\" id=\"phone\" name=\"telephone\" required=\"required\">
                        <label for=\"\" placeholder=\"Your telephone\" alt=\"Telephone\"></label>
                        
                        <input type=\"email\" id=\"email\" name=\"email\" required=\"required\">
                        <label for=\"\" placeholder=\"Your mail\" alt=\"Email\"></label>
                    
                        <!-- <span class=\"title\">Contact me by:</span>
                        <div class=\"segmented-button\">
                        <input type=\"radio\" name=\"channel\" value=\"phone\" id=\"channel-phone\" checked>
                        <label for=\"channel-phone\" class=\"first\">phone</label>
                        
                        <input type=\"radio\" name=\"channel\" value=\"e-mail\" id=\"channel-email\">
                        <label for=\"channel-email\" class=\"last\">email</label>  
                        </div> -->
                   
                        <textarea id=\"message\" name=\"message\" required=\"required\" placeholder=\"\" autocapitalize=\"sentences\"></textarea>
                        <label for=\"\" placeholder=\"Tell us a little about your ...\" alt=\"Your story\"></label>
                                    
                    <!-- <p>Fields marked with * are mandatory.</p> -->
                    
                    <input name=\"send\" type=\"submit\" value=\"Send message\" id=\"button\">
                        
                    </fieldset>
                    </form>
";
