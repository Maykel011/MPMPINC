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
        Malaysia (Metro Parking (M) Sdn Bhd) and Singapore (Metro Parking (S) Pte Ltd) within two years of operation and is now an established leader in both countries.
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
            <button class="thumb-btn active" data-video="3">JLG METRO PARKING MANAGEMENT PHILIPPINES INC.</button>
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
    // Video file mapping - only JLG Metro video
    const videos = {
        3: 'videos/' + encodeURIComponent('(3) JLG Metro Sdn Bhd.mp4')
    };

    const video = document.getElementById('corporateVideo');
    const videoSource = document.getElementById('videoSource');
    const thumbBtns = document.querySelectorAll('.thumb-btn');
    
    // Always use video 3
    let currentIndex = 3;

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

    // Click handler for thumbnail button
    thumbBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const index = parseInt(this.dataset.video);
            
            if (index !== currentIndex) {
                currentIndex = index;
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

    // Error handling - if video fails to load, try without encoding
    video.addEventListener('error', function(e) {
        console.log('Video load error, trying unencoded path...');
        // Fallback: try without encoding
        const fallbackVideos = {
            3: 'videos/(3) JLG Metro Sdn Bhd.mp4'
        };
        
        const fallbackPath = fallbackVideos[currentIndex];
        if (fallbackPath) {
            videoSource.src = fallbackPath;
            video.load();
        }
    });
});
</script>

</body>
</html>