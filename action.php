<?php
include "libs/mail/sendmail.php";

if (!isset($_POST['submit'])) {
    //This page should not be accessed directly. Need to submit the form.
    echo "error; you need to submit the form!";
}

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$address_1 = isset($_POST['address_1']) ? $_POST['address_1'] : '';
$address_2 = isset($_POST['address_2']) ? $_POST['address_2'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';
$region = isset($_POST['region']) ? $_POST['region'] : '';
$zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : '';
$country = isset($_POST['country']) ? $_POST['country'] : '';

$subject = MAIL_SUBJECT;
$html = "<h3>Info customer submitted</h3>";
$html .= "<p><b>Name:</b> $name</p>";
$html .= "<p><b>Email:</b> $email</p>";
$html .= "<p><b>Phone:</b> $phone</p>";
$html .= "<p><b>Address 1:</b> $address_1</p>";
if ($address_2){
    $html .= "<p><b>Address 2:</b> $address_2</p>";
}
if ($city){
    $html .= "<p><b>City:</b> $city</p>";
}
if ($region){
    $html .= "<p><b>Region:</b> $region</p>";
}
if ($zipcode){
    $html .= "<p><b>Zipcode:</b> $zipcode</p>";
}
if ($country){
    $html .= "<p><b>Country:</b> $country</p>";
}

@sendmail(MAIL_RECEIVE, $subject, $html);
@sendmail($email, $subject, $html);

//done. redirect to thank-you page.
header('Location: thank-you.html');
