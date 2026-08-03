<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPMPI About us</title>
    <link rel="stylesheet" href="css/about-us.css">
</head> 
<body>

<header>
    <div class="logo">
        <img src="images/mpmpi.png" alt="MPMPI Logo">
    </div>

   <nav>
        <a href="services">Services</a>
        <a href="client">Clients</a>
        <a href="careers">Careers</a>
        <a href="contact">Contact</a>
        <a href="About us">About us</a>
    </nav>
</header>

<main>

<section class="section">
    <h2>About Us</h2>

    <p>
        <b>Metro Parking Management (Philippines) Inc.</b> (MPMPI) was established in <b>September 1998</b>
        with the core business activity in <b>Car Park Management and Consultancy</b>. As a 100%
        owned company within the <b>JLG METRO SDN BHD</b>, MPMPI maintains a high level of
        professionalism in the service we provide. As such, our main objective is to be the
        market leader in the car park management industry that places integrity and diligence
        as its top priority.
    </p>

    <br>

    <p>
        MPMPI was set with the initial paid-up capital of USD <b>200,000.00</b>. The parent
        company, <b>JLG METRO SDN BHD</b>, with 50 man-years of experience, was incorporated
        in <b>1991</b> under the umbrella of <b>JLG Integra Sdn Bhd (A JCorp Company)</b>. It became a market leader in 
        Malaysia and Singapore within two years of operation and is now an established leader in both countries.
    </p>

    <!-- ========== CORPORATE VIDEO SECTION ========== -->
    <div class="corporate-video">
        <h3>Corporate Videos</h3>
        <div class="video-wrapper">
            <div class="video-container">
                <video id="corporateVideo" controls autoplay muted playsinline>
                    <source id="videoSource" src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <div class="video-thumbnails">
            <button class="thumb-btn active" data-video="1">DBHD Group</button>
            <button class="thumb-btn" data-video="2">Metro Parking v2</button>
            <button class="thumb-btn" data-video="3">JLG Metro</button>
        </div>
    </div>
    <!-- ============================================= -->

    <div class="mission-vision">

        <article class="info-box">
            <h3>Mission</h3>

            <p>
                To be the first choice in parking by providing the
                <strong>best</strong> possible experience each time
                through staff who are highly
                <strong>motivated</strong>,
                <strong>empowered</strong>, and
                <strong>dedicated</strong> to increasing employees'
                and shareholders' value.
            </p>
        </article>

        <article class="info-box">
            <h3>Vision</h3>

            <p>
                To be the best Car Park Operator in the Philippines
                and to <strong>lead</strong> in this industry.
            </p>
        </article>

    </div>
</section>
</main>
 
<footer>
    &copy; <?php echo date('1998'); ?> MPMPI. All Rights Reserved.
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Video file mapping
    const videos = {
        1: 'videos/(1) DBHD Group Corporate Video.mp4',
        2: 'videos/(2) metro parking Version 2.mp4',
        3: 'videos/(3) JLG Metro Sdn Bhd.mp4'
    };

    const video = document.getElementById('corporateVideo');
    const videoSource = document.getElementById('videoSource');
    const thumbBtns = document.querySelectorAll('.thumb-btn');
    
    // Get current video index from sessionStorage or default to random
    let currentIndex = parseInt(sessionStorage.getItem('currentVideoIndex')) || 0;
    
    // If no stored index, generate random
    if (!sessionStorage.getItem('currentVideoIndex')) {
        currentIndex = Math.floor(Math.random() * 3) + 1;
        sessionStorage.setItem('currentVideoIndex', currentIndex);
    }

    // Load the video
    function loadVideo(index) {
        const videoPath = videos[index];
        if (videoPath) {
            // Update video source
            videoSource.src = videoPath;
            video.load();
            
            // Update active button
            thumbBtns.forEach(btn => {
                btn.classList.remove('active');
                if (parseInt(btn.dataset.video) === index) {
                    btn.classList.add('active');
                }
            });
            
            // Reset video to maintain container size
            video.style.width = '100%';
            video.style.height = '100%';
            video.style.objectFit = 'contain';
        }
    }

    // Play next video when current ends
    video.addEventListener('ended', function() {
        let nextIndex = currentIndex + 1;
        if (nextIndex > 3) {
            nextIndex = 1;
        }
        currentIndex = nextIndex;
        sessionStorage.setItem('currentVideoIndex', currentIndex);
        loadVideo(currentIndex);
        video.play().catch(e => console.log('Autoplay prevented'));
    });

    // Click handler for thumbnail buttons - switches video without page refresh
    thumbBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const index = parseInt(this.dataset.video);
            
            if (index !== currentIndex) {
                currentIndex = index;
                sessionStorage.setItem('currentVideoIndex', currentIndex);
                loadVideo(currentIndex);
                
                // Play the video after switching
                setTimeout(() => {
                    video.play().catch(e => {
                        console.log('Autoplay prevented, waiting for user interaction');
                    });
                }, 100);
            }
        });
    });

    // Initial load
    loadVideo(currentIndex);
    
    // Try to play after load
    video.addEventListener('loadeddata', function() {
        video.play().catch(e => console.log('Autoplay prevented'));
    });
});
</script>

</body>
</html>