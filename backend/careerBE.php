<?php
require_once "../config/database.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Access Denied.");
}

function clean($data) {
    return htmlspecialchars(trim($data));
}

$position   = clean($_POST['position'] ?? '');
$name       = clean($_POST['fullname'] ?? '');
$email      = clean($_POST['email'] ?? '');
$contact    = clean($_POST['contact'] ?? '');
$address    = clean($_POST['address'] ?? '');
$age        = clean($_POST['age'] ?? '');
$sex        = clean($_POST['sex'] ?? '');
$education  = clean($_POST['education'] ?? '');
$experience = clean($_POST['experience'] ?? '');

$errors = [];

if(empty($position)) $errors[] = "Position is required.";
if(empty($name)) $errors[] = "Full Name is required.";
if(empty($email)) $errors[] = "Email Address is required.";
if(empty($contact)) $errors[] = "Contact Number is required.";
if(empty($address)) $errors[] = "Address is required.";
if(empty($age)) $errors[] = "Age is required.";
if(empty($sex)) $errors[] = "Sex is required.";
if(empty($education)) $errors[] = "Educational Attainment is required.";
if(empty($experience)) $errors[] = "Work Experience is required.";

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid Email Address.";
}

if(!preg_match('/^09\d{9}$/', $contact)) {
    $errors[] = "Contact number must be 11 digits starting with 09.";
}

$resumeName = "";
$resumePath = "";

if(isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $allowed = ['pdf', 'doc', 'docx'];
    $fileName = $_FILES["resume"]["name"];
    $fileTmp  = $_FILES["resume"]["tmp_name"];
    $fileSize = $_FILES["resume"]["size"];
    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if(!in_array($extension, $allowed)) {
        $errors[] = "Only PDF, DOC and DOCX files are allowed.";
    }

    if($fileSize > (5 * 1024 * 1024)) {
        $errors[] = "Resume must not exceed 5MB.";
    }

    if(empty($errors)) {
        $uploadDir = "../uploads/";
        if(!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $resumeName = time() . "_" . preg_replace('/[^A-Za-z0-9.\-_]/', '_', $fileName);
        $resumePath = $uploadDir . $resumeName;

        if(!move_uploaded_file($fileTmp, $resumePath)) {
            $errors[] = "Failed to upload resume. Please try again.";
        }
    }
} else {
    $errors[] = "Resume is required.";
}

if(count($errors) > 0) {
    echo "<h2>Application Error</h2><ul>";
    foreach($errors as $error) {
        echo "<li>{$error}</li>";
    }
    echo "</ul>";
    exit;
}

try {
    $sql = "INSERT INTO applicants (
        position, fullname, email, contact, address, 
        age, sex, education, experience, resume_path, 
        application_date, status
    ) VALUES (
        :position, :fullname, :email, :contact, :address,
        :age, :sex, :education, :experience, :resume_path,
        NOW(), 'Pending'
    )";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':position'  => $position,
        ':fullname'  => $name,
        ':email'     => $email,
        ':contact'   => $contact,
        ':address'   => $address,
        ':age'       => $age,
        ':sex'       => $sex,
        ':education' => $education,
        ':experience'=> $experience,
        ':resume_path' => $resumeName
    ]);
    
    $applicant_id = $pdo->lastInsertId();
    
} catch(PDOException $e) {
    if(file_exists($resumePath)) {
        unlink($resumePath);
    }
    die("Database Error: " . $e->getMessage());
}

// Send email to test address
$testEmail = "itsmemaykel01@gmail.com";
$sendToEmail = $testEmail;

$subject = "Application Received - MPMPI Careers";

$message = '
<!DOCTYPE html>
<html>
<head>
    <style>
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .email-header {
            text-align: center;
            padding: 20px 0;
            background-color: #1a3c6e;
            color: white;
            border-radius: 8px 8px 0 0;
        }
        .email-content {
            padding: 20px;
            background-color: white;
            border-radius: 0 0 8px 8px;
        }
        .application-details {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .email-footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
        .highlight { color: #1a3c6e; font-weight: bold; }
        .test-badge {
            background: #ffc107;
            color: #000;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Application Received</h2>
        </div>
        <div class="email-content">
            <div style="text-align: center;">
                <span class="test-badge">🔬 TEST MODE</span>
            </div>
            <p>Dear <strong>' . htmlspecialchars($name) . '</strong>,</p>
            <p>Thank you for applying to <strong>Metro Parking Management (Phils.) Inc.</strong></p>
            <p>We have received your application for the position of:</p>
            <div class="application-details">
                <p><strong>Position:</strong> ' . htmlspecialchars($position) . '</p>
                <p><strong>Application Date:</strong> ' . date('F d, Y') . '</p>
                <p><strong>Status:</strong> <span class="highlight">Pending Review</span></p>
                <p><strong>Applicant Email:</strong> ' . htmlspecialchars($email) . '</p>
            </div>
            <p>Our HR team will review your application within 3-5 business days.</p>
            <p>Best regards,<br><strong>MPMPI HR Department</strong></p>
        </div>
        <div class="email-footer">
            <p>&copy; ' . date('Y') . ' Metro Parking Management (Phils.) Inc.</p>
            <p>⚠️ TEST MODE: This email was sent to the test address</p>
        </div>
    </div>
</body>
</html>
';

$headers = "From: MPMPI Careers <humanresource@metro-parking.com.ph>\r\n";
$headers .= "Reply-To: humanresource@metro-parking.com.ph\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$emailSent = mail($sendToEmail, $subject, $message, $headers);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .success-box {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .success-box h2 { color: #28a745; }
        .success-box p { color: #555; line-height: 1.6; }
    </style>
</head>
<body>
    <div class="success-box">
        <h2>Application Received Successfully!</h2>
        <p>Thank you for applying to MPMPI.</p>
        <p>A confirmation email has been sent to your email address.</p>
    </div>
</body>
</html>