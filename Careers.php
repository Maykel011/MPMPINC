<?php
session_start();

// Display success message if exists
$successMessage = '';
if (isset($_SESSION['application_success']) && $_SESSION['application_success']) {
    $successMessage = $_SESSION['application_message'];
    unset($_SESSION['application_success']);
    unset($_SESSION['application_message']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers - MPMPI</title>
    <link rel="stylesheet" href="css/career.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="images/mpmpi.png" alt="MPMPI Logo">
    </div>
    <nav>
        <a href="dashboard.php">About us</a>
        <a href="services.php">Services</a>
        <a href="client.php">Clients</a>
        <a href="careers.php">Careers</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<?php if($successMessage): ?>
<div class="success-banner">
    <span class="success-icon">✓</span>
    <?php echo htmlspecialchars($successMessage); ?>
    <button class="success-close" onclick="this.parentElement.remove()">&times;</button>
</div>
<?php endif; ?>

<section class="section">
    <h2>Careers</h2>
    <p>
        Metro Parking Management (Phils.) Inc. is looking for
        dedicated and hardworking individuals who are passionate
        about building a successful career.
        We provide a competitive compensation package,
        government-mandated benefits, career development,
        and opportunities for professional growth.
    </p>
</section>

<section class="section">
    <div class="application-header">
        <h2>Application Procedure</h2>
        <a href="https://ph.indeed.com/cmp/Metro-Parking-Management-(phils)-Inc.-1" target="_blank">
            <img src="images/indeed.png" alt="Indeed" class="application-title-img">
        </a>
    </div>
    <div class="career-info">
        <div class="info-box">
            <h3>Walk-In</h3>
            <p>
                4/F Salustiana D. Ty Tower <br>
                104 Paseo De Roxas corner Perea St. <br>
                Legaspi Village, Makati City
            </p>
        </div>
        <div class="info-box">
            <h3>Email</h3>
            <p>humanresource@metro-parking.com.ph</p>
        </div>
        <div class="info-box">
            <h3>Telephone</h3>
            <p>
                (02) 82463400 <br>
                Loc. 101, 107 &amp; 118
            </p>
        </div>
    </div>
</section>

<section class="section">
    <div class="job-header">
        <h2>Job Opportunities</h2>
        <button class="apply-btn" onclick="openApplyModal()">Apply Now</button>
    </div>
    <div class="job-container">
        <div class="job-box">
            <h3>Parking Attendant (Male)</h3>
            <ul>
                <li>Must be at least 19–40 years old</li>
                <li>At least High School Graduate</li>
                <li>Good written and oral communication skills</li>
                <li>Must have a pleasing personality</li>
            </ul>
        </div>
        <div class="job-box">
            <h3>Valet Driver (Male)</h3>
            <ul>
                <li>Must be at least 19–55 years old</li>
                <li>At least High School Graduate</li>
                <li>Professional Driver's License</li>
                <li>Good written and oral communication skills</li>
            </ul>
        </div>
        <div class="job-box">
            <h3>Cashier (Female)</h3>
            <ul>
                <li>18–35 years old</li>
                <li>Senior High School Graduate</li>
                <li>Good communication skills</li>
                <li>Must have a pleasing personality</li>
            </ul>
        </div>
        <div class="job-box">
            <h3>Business Development Executive (Male)</h3>
            <ul>
                <li>Graduate of any Business Course</li>
                <li>Excellent communication skills</li>
                <li>Leadership skills</li>
                <li>At least 1 year related experience</li>
            </ul>
        </div>
        <div class="job-box">
            <h3>Tax and Compliance Officer</h3>
            <ul>
                <li>Bachelor's Degree in Accountancy or Finance</li>
                <li>3+ years tax compliance experience</li>
                <li>Knowledgeable in BIR tax matters</li>
                <li>Proficient in Microsoft Office</li>
            </ul>
        </div>
    </div>
</section>

<!-- ==========================================
     APPLY MODAL
========================================== -->
<div id="applyModal" class="modal-overlay">
    <div class="modal-wrapper">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Apply</h2>
                <button class="modal-close" onclick="closeApplyModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="applicationForm" action="backend/careerBE.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Defined Position</label>
                        <select name="position" required>
                            <option value="">Select Position</option>
                            <option value="Parking Attendant (Male)">Parking Attendant (Male)</option>
                            <option value="Valet Driver (Male)">Valet Driver (Male)</option>
                            <option value="Cashier (Female)">Cashier (Female)</option>
                            <option value="Business Development Executive (Male)">Business Development Executive (Male)</option>
                            <option value="Tax and Compliance Officer">Tax and Compliance Officer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="fullname" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="example@email.com" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="tel" name="contact" placeholder="09XXXXXXXXX" maxlength="11" required>
                    </div>
                    <div class="form-group">
                        <label>Complete Address</label>
                        <textarea name="address" rows="3" placeholder="Enter your complete address" required></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" min="18" max="65" placeholder="Age" required>
                        </div>
                        <div class="form-group">
                            <label>Sex</label>
                            <select name="sex" required>
                                <option value="">Select Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Educational Attainment</label>
                        <select name="education" required>
                            <option value="">Select Educational Attainment</option>
                            <option value="High School Graduate">High School Graduate</option>
                            <option value="Senior High School Graduate">Senior High School Graduate</option>
                            <option value="College Undergraduate">College Undergraduate</option>
                            <option value="College Graduate">College Graduate</option>
                            <option value="Vocational Graduate">Vocational Graduate</option>
                            <option value="Master's Degree">Master's Degree</option>
                            <option value="Doctorate Degree">Doctorate Degree</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Related Work Experience</label>
                        <textarea name="experience" rows="4" placeholder="Describe your related work experience..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Upload Resume</label>
                        <input type="file" name="resume" accept=".pdf,.doc,.docx" required>
                        <small class="upload-note">Accepted file types: PDF, DOC, DOCX (Maximum 5MB)</small>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="submit-btn">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ==========================================
     VALIDATION MODAL
========================================== -->
<div id="validationModal" class="modal-overlay">
    <div class="modal-small">
        <div class="modal-icon warning">⚠</div>
        <h2>Incomplete Application</h2>
        <p id="validationMessage">Please complete all required fields before submitting your application.</p>
        <button class="modal-btn" onclick="closeValidationModal()">OK</button>
    </div>
</div>

<!-- ==========================================
     SUCCESS MODAL
========================================== -->
<div id="successModal" class="modal-overlay">
    <div class="modal-small success">
        <div class="modal-icon success-icon">✓</div>
        <h2 id="successTitle">Application Submitted Successfully!</h2>
        <p id="successMessageText">Thank you for applying! A confirmation email has been sent to your email address.</p>
        <button class="modal-btn success-btn" onclick="closeSuccessModal()">OK</button>
    </div>
</div>

<footer>
    &copy; <?php echo date('Y'); ?> MPMPI. All Rights Reserved.
</footer>

<script src="javascript/applicants.js"></script>
</body>
</html>