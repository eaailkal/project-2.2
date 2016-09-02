
<?php

// page title
$pageData->title = "Contact Us";

// two arrays called to store details of errors and required fields that haven’t been filled in
$errors = [];
$missing = [];

// check if the form has been submitted
if (isset($_POST['send'])) {
  
    // email processing script
    $to = 'iljakalinkin@gmail.com'; //variables to store the destination and subject
    $subject = 'Duke Denver Film - Message from website';
    
    // list expected fields
    $expected = ['full_name', 'email', 'telephone', 'message', 'channel'];
    $required = ['full_name', 'message'];
    
    // email processing script
    require './includes/processmail.php';
    
    // set default values for variables that might not exist
    if (!isset($_POST['telephone'])) {
        $_POST['telephone'] = '';
    }
    if (!isset($_POST['channel'])) {
        $_POST['channel'] = array();
    }
    
    // create additional headers
    $headers = "From: Website Message<feedback@dukedenverfilm.dk>\r\n";
    $headers .= 'Content-Type: text/plain; charset=utf-8';
    require './includes/processmail.php';
    if ($mailSent) {
        header('Location: http://localhost:8888/thank_you.php');
        exit;
    }
}


                     
                          <?php if (($_POST && $suspect) || ($_POST && isset($errors['mailfail']))) {  ?>
            <p class=\"warning\">Sorry, your mail could not be sent. Please try later.</p>
            
            // if requred field hasn't been filled in
            // an array with at least one element is treated as true
            // the || means "OR"
            <?php } elseif ($missing || $errors) { ?>
            <p class=\"warning\">Please fix the item(s) indicated.</p>
            <?php } ?>          
            
                    <form name=\"htmlform\" method=\"post\" class=\"form\" action=\"\">
                    <fieldset>
                    <legend>Contact details</legend>
                        
                        <input type=\"text\" id=\"name\" name=\"full_name\" required=\"required\" autocapitalize=\"words\" autofocus=\"autofocus<?php // to redisplay content
                if ($missing || $errors) { echo 'value=\"' . htmlentities($full_name) . '\"'; } ?>"> 
                                          
                        <label for=\"\" placeholder=\"Your Full Name\" alt=\"Full Name\"></label>
                        <?php 
                        
                        // if $missing contains any values, the in_array() checks 
                        // if the $missing array contains the value 'full_name'
                        // if it does, the <span> is displayed
                        if ($missing && in_array('full_name', $missing)) { ?>
                        <span class=\"warning\">Please enter your name</span>
                    <?php } ?>
                        

                        <input type="email" id="email" name="email" required="required"<?php if ($missing || $errors) { echo 'value="' . htmlentities($email) . '"'; } ?>>
                        <label for="" placeholder="Your mail<?php if ($missing && in_array('email', $missing)) { ?>
                        <span class="warning">Please enter your email address</span>
                    <?php } elseif (isset($errors['email'])) { ?>
                        <span class="warning">Invalid email address</span>
                    <?php } ?>" alt="Email"></label>
                        
                        <input type="tel" id="phone" name="telephone" required="required"<?php if ($missing || $errors) { echo 'value="' . htmlentities($telephone) . '"'; } ?>>
                        <label for="" placeholder="Your telephone" alt="Telephone (optional)"></label>
                    
                        <span class="title">Contact me by:</span>
                        <div class="segmented-button">
                        <input type="radio" name="channel" value="phone" id="channel-phone" checked>
                        <label for="channel-phone" class="first">phone</label>
                        
                        <input type="radio" name="channel" value="e-mail" id="channel-email">
                        <label for="channel-email" class="last">email</label>
                        </div>
                   
                        <textarea id="message" name="message" required="required" placeholder="" autocapitalize="sentences"><?php if ($missing || $errors) { echo 'value="' . htmlentities($message) . '"'; } ?></textarea>
                        <label for="" placeholder="* Tell us a little about your ...<?php if ($missing && in_array('message', $missing)) { ?>
                        <span class="warning">Please enter your message</span>
                    <?php } ?>" alt="Message"></label>
                    
                    <input name=\"send\" type=\"submit\" value=\"Send message\" id=\"button\">
                        
                    </fieldset>
                    </form>
           

return "
                    <h1>Contact us</h1>

                    <section><p>Duke Denver Film's primary task is to convey the good story. Humour, ingenuity and the desire to create and innovate has over time proved to be our characteristics. We make films that have something to say with stories that can inspire and motivate.</p><br />
                    <p>Have a story to tell? You can write us by email <a href=\"mailto:info@dukedenverfilm.dk\">info@dukedenverfilm.dk</a> or use the form provided below.</p><br /></section>
    
                    ";

        
?>     
                
