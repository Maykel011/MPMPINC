<?php

require_once "../database.php";

// Show errors during development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// =====================================================
// ONLY ALLOW POST
// =====================================================

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    die("Access Denied.");

}

// =====================================================
// SANITIZE FUNCTION
// =====================================================

function clean($data)
{
    return htmlspecialchars(trim($data));
}

// =====================================================
// GET FORM DATA
// =====================================================

$position      = clean($_POST['position'] ?? '');
$name          = clean($_POST['fullname'] ?? '');
$email         = clean($_POST['email'] ?? '');
$contact       = clean($_POST['contact'] ?? '');
$address       = clean($_POST['address'] ?? '');
$age           = clean($_POST['age'] ?? '');
$sex           = clean($_POST['sex'] ?? '');
$education     = clean($_POST['education'] ?? '');
$experience    = clean($_POST['experience'] ?? '');

// =====================================================
// REQUIRED FIELDS
// =====================================================

$errors = [];

if(empty($position))
    $errors[] = "Position is required.";

if(empty($name))
    $errors[] = "Full Name is required.";

if(empty($email))
    $errors[] = "Email Address is required.";

if(empty($contact))
    $errors[] = "Contact Number is required.";

if(empty($address))
    $errors[] = "Address is required.";

if(empty($age))
    $errors[] = "Age is required.";

if(empty($sex))
    $errors[] = "Sex is required.";

if(empty($education))
    $errors[] = "Educational Attainment is required.";

if(empty($experience))
    $errors[] = "Work Experience is required.";

// =====================================================
// EMAIL VALIDATION
// =====================================================

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $errors[] = "Invalid Email Address.";
}

// =====================================================
// RESUME UPLOAD
// =====================================================

$resumeName = "";
$resumePath = "";

if(isset($_FILES['resume']))
{

    $allowed = [
        "pdf",
        "doc",
        "docx"
    ];

    $fileName = $_FILES["resume"]["name"];
    $fileTmp  = $_FILES["resume"]["tmp_name"];
    $fileSize = $_FILES["resume"]["size"];

    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if(!in_array($extension, $allowed))
    {
        $errors[] = "Only PDF, DOC and DOCX files are allowed.";
    }

    if($fileSize > (5 * 1024 * 1024))
    {
        $errors[] = "Resume must not exceed 5MB.";
    }

    if(empty($errors))
    {

        if(!is_dir("../uploads"))
        {
            mkdir("../uploads",0777,true);
        }

        $resumeName = time() . "_" . preg_replace('/[^A-Za-z0-9.\-_]/', '_', $fileName);

        $resumePath = "../uploads/" . $resumeName;

        move_uploaded_file($fileTmp,$resumePath);

    }

}
else
{

    $errors[] = "Resume is required.";

}

// =====================================================
// DISPLAY ERRORS
// =====================================================

if(count($errors) > 0)
{

    echo "<h2>Application Error</h2>";

    echo "<ul>";

    foreach($errors as $error)
    {

        echo "<li>{$error}</li>";

    }

    echo "</ul>";

    exit;

}

// =====================================================
// SUCCESS
// (EMAIL WILL BE ADDED NEXT)
// =====================================================

echo "<h2>Application Received Successfully!</h2>";

echo "<p>Thank you for applying.</p>";

echo "<hr>";

echo "<b>Position:</b> {$position}<br>";
echo "<b>Name:</b> {$name}<br>";
echo "<b>Email:</b> {$email}<br>";
echo "<b>Contact:</b> {$contact}<br>";
echo "<b>Address:</b> {$address}<br>";
echo "<b>Age:</b> {$age}<br>";
echo "<b>Sex:</b> {$sex}<br>";
echo "<b>Education:</b> {$education}<br>";
echo "<b>Experience:</b> {$experience}<br>";

echo "<br>";

echo "<b>Resume Uploaded:</b> {$resumeName}";