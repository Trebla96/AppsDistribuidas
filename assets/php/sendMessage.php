<?php

// Get the form fields, removes html tags and whitespace.
$name = strip_tags(trim($_POST["name"]));
$name = str_replace(array("\r", "\n"), array(" ", " "), $name);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$message = trim($_POST["message"]);
$message = wordwrap($message, 70, "\n");

// Check the data.
if (empty($name) or empty($message)) {
    // Set a 400 (bad request) response code and exit.
    http_response_code(400);
    exit(json_encode(array('status' => 'error', 'message' => 'Please complete the form and try again.')));
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Set a 400 (bad request) response code and exit.
    http_response_code(400);
    exit(json_encode(array('status' => 'error', 'message' => 'Please enter a valid email address.')));
}

exit(json_encode(array('status' => 'success', 'message' => 'Message sent successfully!')));
