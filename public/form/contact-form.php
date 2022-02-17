<?php

    // youremail here
    $to = "dogotar777@gmail.com";
    $from = 'email';
    $name = 'name';
    $headers = "From: $from";
    $subject = "You have a message.";

    $fields = array();
    $fields{"name"} = "Your Name";
    $fields{"email"} = "Your Email";
    $fields{"phone"} = "Phone";
    $fields{"message"} = "Your Message";

    $body = "Here is what was sent , form 'VOYCEO -Contact Form':\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s:%s\n",$b,$_REQUEST[$a]); }

    $send = mail($to, $subject, $body, $headers);

?>
