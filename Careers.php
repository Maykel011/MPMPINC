
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Careers - MPMPI</title>

    <link rel="stylesheet" href="css/careers.css">

</head>

<body>

<!-- =====================================================
     HEADER
===================================================== -->

<header>

    <div class="logo">
        <img src="images/mpmpi.png" alt="MPMPI Logo">
    </div>

    <nav>
        <a href="dashboard">About us</a>
        <a href="services">Services</a>
        <a href="client">Clients</a>
        <a href="careers">Careers</a>
        <a href="contact">Contact</a>
    </nav>

</header>

<!-- =====================================================
     CAREERS
===================================================== -->

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

<!-- =====================================================
     APPLICATION PROCEDURE
===================================================== -->

<section class="section">

    <div class="application-header">

        <h2>Application Procedure</h2>

        <a href="https://ph.indeed.com/cmp/Metro-Parking-Management-(phils)-Inc.-1"
           target="_blank">

            <img
                src="images/indeed.png"
                alt="Indeed"
                class="application-title-img">

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

            <p>

                humanresource@metro-parking.com.ph

            </p>

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

<!-- =====================================================
     JOB OPPORTUNITIES
===================================================== -->

<section class="section">

    <div class="job-header">

        <h2>Job Opportunities</h2>

        <button
            class="apply-btn"
            id="openApplyModal">

            Apply Now

        </button>

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

<!-- =====================================================
     APPLY MODAL
===================================================== -->

<div class="apply-modal" id="applyModal">

    <div class="apply-modal-content">

        <!-- Header -->

        <div class="apply-modal-header">

            <h2>Apply</h2>

            <button
                class="apply-close"
                id="closeApplyModal">

                &times;

            </button>

        </div>

        <!-- Scrollable Body -->

        <div class="apply-modal-body">

            <form>

                <form action="backend/careerBE.php" method="POST" enctype="multipart/form-data">

    <!-- Defined Position -->
    <div class="apply-group">

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

    <!-- Full Name -->
    <div class="apply-group">

        <label>Full Name</label>

        <input
            type="text"
            name="fullname"
            placeholder="Enter your full name"
            required>

    </div>

    <!-- Email -->
    <div class="apply-group">

        <label>Email Address</label>

        <input
            type="email"
            name="email"
            placeholder="example@email.com"
            required>

    </div>

    <!-- Contact -->
    <div class="apply-group">

        <label>Contact Number</label>

        <input
            type="text"
            name="contact"
            placeholder="09XXXXXXXXX"
            maxlength="11"
            required>

    </div>

    <!-- Address -->
    <div class="apply-group">

        <label>Complete Address</label>

        <textarea
            name="address"
            rows="3"
            placeholder="Enter your complete address"
            required></textarea>

    </div>

    <!-- Age & Sex -->
    <div class="apply-row">

        <div class="apply-group">

            <label>Age</label>

            <input
                type="number"
                name="age"
                min="18"
                max="65"
                placeholder="Age"
                required>

        </div>

        <div class="apply-group">

            <label>Sex</label>

            <select name="sex" required>

                <option value="">Select Sex</option>

                <option value="Male">Male</option>

                <option value="Female">Female</option>

            </select>

        </div>

    </div>

    <!-- Educational Attainment -->
    <div class="apply-group">

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

    <!-- Work Experience -->
    <div class="apply-group">

        <label>Related Work Experience</label>

        <textarea
            name="experience"
            rows="5"
            placeholder="Describe your related work experience..."
            required></textarea>

    </div>

    <!-- Resume -->
    <div class="apply-group">

        <label>Upload Resume</label>

        <input
            type="file"
            name="resume"
            accept=".pdf,.doc,.docx"
            required>

        <small class="upload-note">

            Accepted file types:
            PDF, DOC, DOCX (Maximum 5MB)

        </small>

    </div>

    <!-- Buttons -->
    <div class="apply-buttons">

        <button
            type="button"
            class="cancel-btn"
            id="cancelApply">

            Cancel

        </button>

        <button
            type="submit"
            class="submit-btn">

            Submit Application

        </button>

    </div>

</form>

        </div>

    </div>

</div>

<!-- =====================================================
     FOOTER
===================================================== -->

<footer>

    &copy; <?php echo date('Y'); ?> MPMPI.
    All Rights Reserved.

</footer>

<script src="js/apply.js"></script>

</body>
</html>