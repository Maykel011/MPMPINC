// Award data
const awards = [
    {
        title: "Best Car Park 2005",
        description: "Awarded by National Product Quality Excellence and Seal of Product Quality on September 21, 2005. This prestigious award recognizes MPMPI's commitment to providing exceptional parking facilities and services that meet the highest standards of quality and customer satisfaction.",
        image: "images/awards/NATIONAL PRODUCT EXCELLENCE.png"
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
        image: "images/awards/Star Brand Philippines.png"
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

// Update modal content with current award
function updateModal() {
    const award = awards[currentIndex];
    document.getElementById('modalImage').src = award.image;
    document.getElementById('modalImage').alt = award.title;
    document.getElementById('modalTitle').textContent = award.title;
    document.getElementById('modalDescription').textContent = award.description;
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('awardModal');
    if (event.target === modal) {
        closeModal();
    }
}

// Log that JavaScript is loaded (for debugging)
console.log('Services.js loaded successfully!');