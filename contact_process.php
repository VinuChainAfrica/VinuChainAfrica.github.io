<?php

$to = "bdev@vinuchain.org";
$userEmail = $_REQUEST['email'];
$userName = $_REQUEST['name'];
$subject = $_REQUEST['subject'];
$userNumber = $_REQUEST['number'];
$userMessage = htmlspecialchars($_REQUEST['message']);  // Escape user input

$headers = "From: $userEmail \r\n";
$headers .= "Reply-To: $userEmail \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$logo = 'img/logo.png';
$link = '#';

$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
$body   
 .= "<table style='width: 100%;'>";
$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
$body .= "</td></tr></thead><tbody><tr>";
$body .= "<td style='border:none;'><strong>Name:</strong>   
 {$userName}</td>";
$body .= "<td style='border:none;'><strong>Email:</strong> {$userEmail}</td>";
$body .= "</tr>";
$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
$body .= "<tr><td></td></tr>";
$body .= "<tr><td colspan='2' style='border:none;'>{$userMessage}</td></tr>";   

$body .= "</tbody></table>";
$body .= "</body></html>";

$send = mail($to, $subject, $body, $headers);

if ($send) {
  echo "Email sent successfully!";  // Success message
} else {
  echo "There was an error sending the email. Please try again later.";  // Error message
}

?>
