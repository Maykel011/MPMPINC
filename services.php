<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - MPMPI</title>

    <link rel="stylesheet" href="css/Services.css"> 
    <script src="javascript/Services.js" defer></script>
</head>
<body>

<!-- HEADER --> 
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

<!-- SERVICES -->
<section class="section">

    <h2>Our Services</h2>

    <p>
        It is Metro Parking's primary responsibility to provide our clients with a <b>convenient</b> parking facility
        that includes well-lit and well-maintained parking slots. We ensure proper assignment and control of parking
        spaces for both reserved and non-reserved clients.
    </p>

    <p>
        We also provide <b>Valet Parking</b> services to clients in hotel parking areas.
        Our <b>professional</b>, <b>uniformed</b> parking attendants ensure high-quality service at all times.
    </p>

    <p>
        Our accounting system maintains strict <b>Quality Control</b> to ensure reliable and responsive billing services.
        We serve season and casual customers, with quarterly statements of account. Our staff are trained to deliver
        <b>excellent customer service</b> to you. Trained to understand the importance of respecting the customer and how to enforce parking policies
        with <b>courtesy</b> and <b>professionalsm</b>. 
    </p>

</section>

<section class="section">

    <div class="iso-header">
    <h2>ISO Certification</h2>

    <img src="images/isocertification.png" 
     alt="ISO Certification" 
     class="iso-title-img"
         >

</div>

    <div class="iso-container">

        <div class="iso-text">

            <p>

                The classic perception of being an industry leader is often measured by the numbers. The higher the figures a company achieves, the more successful, competitive, and influential it is perceived to be. However, another important measure of a company's leadership is the level of satisfaction it provides to its customers.

				This is where Metro Parking Management Philippines, Inc. (MPMPI) affirms its leadership. It is the primary reason we established Metro Parking in the Philippines to provide an exceptional parking experience and deliver above-par quality service to our clients.
                    
				MPMPI takes pride in being the country's first ISO-certified company in the parking industry, demonstrating our commitment to excellence, quality, and customer satisfaction.
</br>
            </p> 
       
       		  <P>
                MPMPI's pursuit of excellence reached a significant milestone after six months of dedicated planning, preparation, and commitment to quality. 
    
                These efforts culminated in the successful attainment of the <b>ISO 9001:2000 Certification for the Management of Car Parks</b>, awarded by TUV Philippines.
                    
                The certification followed an extensive assessment of the company's management systems and operational processes. Through this rigorous evaluation, TUV Philippines verified that MPMPI consistently met the international standards for quality management in the parking industry.
                
                Officially awarded on February 27, 2006, the certification stands as a testament to MPMPI's unwavering dedication to providing reliable, efficient, and customer-focused parking management services.
            </p>

        </div>

   
    </div>

</section>

<!-- AWARDS -->

<section class="section">

    <h2>Awards</h2>

    <p>
        With success comes recognition. MPMPI is honored to have received prestigious awards in recognition of its commitment to excellence and outstanding service. These awards were conferred based on the evaluation of consumers and marketing professionals, recognizing the company's Best Marketing Practices through comprehensive surveys, focus group discussions, and market research.
    </p>

<div class="awards-box">

    <!-- AWARD 1 -->
    <div class="info-box" style="background-image: url('images/awards/Best Car Park.png');" onclick="openModal(0)">
        <div class="info-overlay">
            <div class="info-content">
                <h3>Best Car Park 2005</h3>
                <p>
                    Awarded by National Product Quality Excellence and Seal of Product Quality on September 21, 2005.
                </p>
                <span class="view-details">Click to view details →</span>
            </div>
        </div>
    </div>
    

    <!-- AWARD 2 -->
    <div class="info-box" style="background-image: url('images/awards/philippines marketing.png');" onclick="openModal(1)">
        <div class="info-overlay">
            <div class="info-content">
                <h3>Most Outstanding Innovative Car Park</h3>
                <p>
                    Awarded by Philippine Marketing Excellence Awards Institute, Inc. and partner organizations in 2005.
                </p>
                <span class="view-details">Click to view details →</span>
            </div>
        </div>
    </div>

    <!-- AWARD 3 -->
    <div class="info-box" style="background-image: url('images/awards/MACB.png');" onclick="openModal(2)">
        <div class="info-overlay">
            <div class="info-content">
                <h3>Most Admired Companies and Brands</h3>
                <p>
                    Metro Parking MGMT (Phils.) Inc. By the McCallum and Trout Global Associates La Veco Business Consulting Philippines Best Research Council and the Prosaver e-Philippines Marketing.
                </p>
                <span class="view-details">Click to view details →</span>
            </div>
        </div>
    </div>
    
    
    <!-- AWARD 4 -->
    <div class="info-box" style="background-image: url('images/awards/SBP.png');" onclick="openModal(3)">
        <div class="info-overlay">
            <div class="info-content">
                <h3>Star Brand Philippines</h3>
                <p>
                    Recognized for excellence in brand leadership and market innovation.
                </p>
                <span class="view-details">Click to view details →</span>
            </div>
        </div>
    </div>
    
    <!-- AWARD 5 -->
    <div class="info-box" style="background-image: url('images/awards/ASIAN STAR BRANDS.png');" onclick="openModal(4)">
        <div class="info-overlay">
            <div class="info-content">
                <h3>Asian Star Brand</h3>
                <p>
                    Honored as a leading brand in the Asian market for quality and service excellence.
                </p>
                <span class="view-details">Click to view details →</span>
            </div>
        </div>
    </div>
</div>

</section>

<!-- MODAL -->
<div id="awardModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        
        <div class="modal-body">
            <div class="modal-image-container">
                <img id="modalImage" src="" alt="Award Image">
            </div>
            <div class="modal-text">
                <h2 id="modalTitle"></h2>
                <p id="modalDescription"></p>
                <div class="modal-counter" id="modalCounter"></div>
            </div>
        </div>
        
        <div class="modal-nav">
            <button class="nav-btn prev-btn" onclick="prevAward()">← Previous</button>
            <button class="nav-btn next-btn" onclick="nextAward()">Next →</button>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer>
    &copy; <?php echo date('1998'); ?> MPMPI. All Rights Reserved.
</footer>

</body>
</html>