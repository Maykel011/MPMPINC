// Award data
const awards = [
    {
        title: "Best Car Park 2005",
        description: "Awarded by National Product Quality Excellence and Seal of Product Quality on September 21, 2005. This prestigious award recognizes MPMPI's commitment to providing exceptional parking facilities and services that meet the highest standards of quality and customer satisfaction.",
        image: "images/awards/Best Car Park.png"
    },
    {
        title: "Most Outstanding Innovative Car Park",
        description: "Awarded by Philippine Marketing Excellence Awards Institute, Inc. and partner organizations in 2005. This award highlights MPMPI's innovative approaches to parking management and its dedication to continuous improvement in service delivery.",
        image: "images/awards/philippines marketing.png"
    },
    {
        title: "Most Admired Companies and Brands",
        description: "Metro Parking MGMT (Phils.) Inc. By the McCallum and Trout Global Associates La Veco Business Consulting Philippines Best Research Council and the Prosaver e-Philippines Marketing. This recognition affirms MPMPI's position as a respected leader in the parking industry.",
        image: "images/awards/MACB.png"
    },
    {
        title: "Star Brand Philippines",
        description: "Recognized for excellence in brand leadership and market innovation. This award celebrates MPMPI's strong brand presence and its ability to consistently deliver value to customers across the Philippines.",
        image: "images/awards/SBP.png"
    },
    {
        title: "Asian Star Brand",
        description: "Honored as a leading brand in the Asian market for quality and service excellence. This international recognition places MPMPI among the elite brands in Asia, showcasing its commitment to world-class parking management services.",
        image: "images/awards/ASIAN STAR BRANDS.png"
    }
];

let currentIndex = 0;

// Open modal with specific award index
function openModal(index) {
    currentIndex = index;
    updateModal();
    document.getElementById('awardModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

// Close modal
function closeModal() {
    document.getElementById('awardModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Navigate to next award
function nextAward() {
    currentIndex = (currentIndex + 1) % awards.length;
    updateModal();
}

// Navigate to previous award
function prevAward() {
    currentIndex = (currentIndex - 1 + awards.length) % awards.length;
    updateModal();
}

// Update modal content with current award
function updateModal() {
    const award = awards[currentIndex];
    document.getElementById('modalImage').src = award.image;
    document.getElementById('modalImage').alt = award.title;
    document.getElementById('modalTitle').textContent = award.title;
    document.getElementById('modalDescription').textContent = award.description;
    document.getElementById('modalCounter').textContent = `${currentIndex + 1} of ${awards.length}`;
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('awardModal');
    if (event.target === modal) {
        closeModal();
    }
}

// Keyboard navigation
document.addEventListener('keydown', function(event) {
    if (document.getElementById('awardModal').style.display === 'flex') {
        if (event.key === 'ArrowRight') {
            nextAward();
        } else if (event.key === 'ArrowLeft') {
            prevAward();
        } else if (event.key === 'Escape') {
            closeModal();
        }
    }
});

// Touch swipe support for mobile
let touchStartX = 0;
let touchEndX = 0;

document.addEventListener('touchstart', function(event) {
    const modal = document.getElementById('awardModal');
    if (modal.style.display === 'flex') {
        touchStartX = event.changedTouches[0].screenX;
    }
});

document.addEventListener('touchend', function(event) {
    const modal = document.getElementById('awardModal');
    if (modal.style.display === 'flex') {
        touchEndX = event.changedTouches[0].screenX;
        handleSwipe();
    }
});

function handleSwipe() {
    const swipeThreshold = 50;
    const diff = touchStartX - touchEndX;
    
    if (Math.abs(diff) > swipeThreshold) {
        if (diff > 0) {
            nextAward(); // Swipe left
        } else {
            prevAward(); // Swipe right
        }
    }
}

// Log that JavaScript is loaded (for debugging)
console.log('Services.js loaded successfully!');