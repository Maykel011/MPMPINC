<?php
require_once 'config/database.php';

/* Load Company Information */
$stmt = $pdo->query("SELECT company_name, about_us FROM company_profile LIMIT 1");
$company = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPMPI Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="images/MPMPI LOGO.png" alt="MPMPI Logo">
    </div>

    <nav>
        <a href="dashboard.php">Home</a>
        <a href="services.php">Services</a>
        <a href="clients.php">Clients</a>
        <a href="careers.php">Careers</a>
        <a href="contact.php">Contact Us</a>
    </nav>
</header>

<main>


<section class="section">
    <h2>About Us</h2>

    <p>
        <b>Metro Parking Management (Philippines) Inc.</b> (MPMPI) was established in <b>September 1998</b>
        with the core business activity in <b>Car Park Management and Consultancy</b>. As a 100%
        owned company within the Metro Parking Group, MPMPI maintains a high level of
        professionalism in the service we provide. As such, our main objective is to be the
        market leader in the car park management industry that places integrity and diligence
        as its top priority.
    </p>

    <br>

    <p>
        MPMPI was set with the initial paid-up capital of USD <b>200,000.00</b>. The parent
        company, Metro Parking Group, with 50 man-years of experience, was incorporated
        in <b>1991</b> under the umbrella of <b>Johor Corporation Group of Companies</b>. It became a market leader in 
        Malaysia and Singapore within two years of operation and is now an established leader in both countries.
    </p>

    <div class="mission-vision">
        <div class="info-box">
            <h3>Mission</h3>
            <p>
                To be the first choice in parking by providing the <b>best</b> possible experience
                each time through staff who are highly <b>motivated</b>, <b>empowered</b>, and <b>dedicated</b>
                to increasing employees' and shareholders' value.
            </p>
        </div>

        <div class="info-box">
            <h3>Vision</h3>
            <p>
                To be the best Car Park Operator in the Philippines and to <b>lead</b> in this industry.
            </p>
        </div>
    </div>
</section>
</main>

<footer>
    &copy; <?php echo date('1998'); ?> MPMPI. All Rights Reserved.
</footer>



</body>
</html>