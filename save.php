<?php

    //get the form fields, remove html tags and whitespase.
    $name = strip_tags(trim($_POST(["name"]));
    $name = str_replace(array("\r","\n")),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]),FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    //check the data
    if (empty($name) OR empty($message) OR !filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("Location: https://github.com/hoanghiepvc/omnifood-github/blob/master/main.php?success=-1#form");
        exit;
    }
    //Set the recipient email address. Update this to your desired email address.
    $recipient = "hoanghiepphambk@gmail.com";
    //Set the mail subject
    $subject = "New contact from $name";
    
    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n $message\n";

    //build the email headers
    $email_headers = "From : $name<$email>";
    
    //send the email
    mail($recipient, $subject, $email_content, $email_headers);

    header("Location: https://github.com/hoanghiepvc/omnifood-github/blob/master/main.php?success=1#form");
        
    
    
?>