<?php
// Turn off error reporting for clean JSON
error_reporting(0);
ini_set('display_errors', 0);

header('Content-Type: application/json');

require_once "../config/database.php";
require_once "../config/mailer.php";

if (!isset($pdo)) {
    echo json_encode(array('success' => false, 'message' => 'Database connection failed'));
    exit;
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
    exit;
}

function clean($data) {
    return htmlspecialchars(trim($data));
}

// Get form data
$position   = clean($_POST['position'] ?? '');
$name       = clean($_POST['fullname'] ?? '');
$email      = clean($_POST['email'] ?? '');
$contact    = clean($_POST['contact'] ?? '');
$address    = clean($_POST['address'] ?? '');
$age        = clean($_POST['age'] ?? '');
$sex        = clean($_POST['sex'] ?? '');
$education  = clean($_POST['education'] ?? '');
$experience = clean($_POST['experience'] ?? '');

$errors = array();

// Validate
if(empty($position)) $errors[] = "Position is required.";
if(empty($name)) $errors[] = "Full Name is required.";
if(empty($email)) $errors[] = "Email Address is required.";
if(empty($contact)) $errors[] = "Contact Number is required.";
if(empty($address)) $errors[] = "Address is required.";
if(empty($age)) $errors[] = "Age is required.";
if(empty($sex)) $errors[] = "Sex is required.";
if(empty($education)) $errors[] = "Educational Attainment is required.";
if(empty($experience)) $errors[] = "Work Experience is required.";

if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid Email Address.";
}

if(!empty($contact) && !preg_match('/^09\d{9}$/', $contact)) {
    $errors[] = "Contact number must be 11 digits starting with 09.";
}

// Handle file upload
$resumeName = "";
$resumePath = "";

if(isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $allowed = array('pdf', 'doc', 'docx');
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
            $errors[] = "Failed to upload resume.";
        }
    }
} else {
    $errors[] = "Resume is required.";
}

if(count($errors) > 0) {
    echo json_encode(array('success' => false, 'message' => implode(' ', $errors)));
    exit;
}

// Save to database
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
    $stmt->execute(array(
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
    ));
    
    $applicant_id = $pdo->lastInsertId();
    
} catch(Exception $e) {
    if(file_exists($resumePath)) {
        unlink($resumePath);
    }
    echo json_encode(array('success' => false, 'message' => 'Database error: ' . $e->getMessage()));
    exit;
}

// Send email
$sendToEmail = "itsmemaykel01@gmail.com";
$subject = "New Application Received - MPMPI";

$message = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; }
        .header { background: #1a3c6e; color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { padding: 20px; }
        .details { background: #f5f5f5; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .details p { margin: 8px 0; }
        .footer { text-align: center; color: #777; font-size: 12px; margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd; }
        .badge { display: inline-block; background: #28a745; color: white; padding: 5px 15px; border-radius: 20px; font-size: 14px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2 style='margin:0;'>📋 New Application Received</h2>
        </div>
        <div class='content'>
            <p>A new application has been submitted to MPMPI:</p>
            
            <div class='details'>
                <p><strong>📌 Position:</strong> " . htmlspecialchars($position) . "</p>
                <p><strong>👤 Name:</strong> " . htmlspecialchars($name) . "</p>
                <p><strong>📧 Email:</strong> " . htmlspecialchars($email) . "</p>
                <p><strong>📱 Contact:</strong> " . htmlspecialchars($contact) . "</p>
                <p><strong>🎂 Age:</strong> " . htmlspecialchars($age) . "</p>
                <p><strong>⚥ Sex:</strong> " . htmlspecialchars($sex) . "</p>
                <p><strong>🎓 Education:</strong> " . htmlspecialchars($education) . "</p>
                <p><strong>📄 Resume:</strong> " . htmlspecialchars($resumeName) . "</p>
                <p><strong>🆔 Application ID:</strong> #" . $applicant_id . "</p>
                <p><strong>📅 Date:</strong> " . date('F d, Y h:i A') . "</p>
                <p><strong>📊 Status:</strong> <span class='badge'>Pending Review</span></p>
            </div>
            
            <p style='margin-top: 20px; padding: 10px; background: #fff3cd; border-radius: 5px; color: #856404;'>
                <strong>📝 Action Required:</strong> Please log in to the admin dashboard to review this application.
            </p>
        </div>
        <div class='footer'>
            <p>&copy; " . date('Y') . " Metro Parking Management (Phils.) Inc.</p>
            <p>Automated notification system</p>
        </div>
    </div>
</body>
</html>
";

// Send email using PHPMailer
$emailSent = sendEmail($sendToEmail, $subject, $message);

// Return success response
echo json_encode(array(
    'success' => true,
    'message' => 'Application submitted successfully!',
    'applicant_id' => $applicant_id,
    'email_sent' => $emailSent,
    'email_to' => $sendToEmail
));
exit;
?>