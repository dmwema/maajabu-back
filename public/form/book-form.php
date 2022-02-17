<?php

    // youremail here
    $to = "dogotar777@gmail.com";
    $from = 'email';
    $name = 'name';
    $headers = "From: $from";
    $subject = "You have a message.";

    $fields = array();
    $fields{"name"} = "Your Name";
    $fields{"email"} = "Email address";
    $fields{"phone"} = "Phone number";
    $fields{"addres"} = "Address";
    $fields{"my-select-country"} = "Country";
    $fields{"my-select-service"} = "Service";
    $fields{"my-select-time"} = "Time";
    $fields{"date"} = "Date";

    $body = "Here is what was sent, form 'VOYCEO - Book Your Session':\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s:%s\n",$b,$_REQUEST[$a]); }

    $send = mail($to, $subject, $body, $headers);

?>
