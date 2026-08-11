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

// ============================================
// SILENT PROTECTION - NO POPUPS OR WARNINGS
// ============================================

// 1. Silently disable context menu (right-click)
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    return false;
});

// 2. Silently disable drag and drop
document.addEventListener('dragstart', function(e) {
    e.preventDefault();
    return false;
});

// 3. Silently disable image right-click specifically
document.addEventListener('mousedown', function(e) {
    if (e.target.tagName === 'IMG') {
        e.preventDefault();
        return false;
    }
});

// 4. SILENTLY BLOCK ALL KEYBOARD SHORTCUTS - No warnings
document.addEventListener('keydown', function(e) {
    // Block Ctrl+P (Print)
    if (e.ctrlKey && (e.key === 'p' || e.key === 'P')) {
        e.preventDefault();
        e.stopPropagation();
        return false;
    }
    
    // Block Ctrl+S (Save)
    if (e.ctrlKey && (e.key === 's' || e.key === 'S')) {
        e.preventDefault();
        return false;
    }
    
    // Block Ctrl+U (View Source)
    if (e.ctrlKey && (e.key === 'u' || e.key === 'U')) {
        e.preventDefault();
        return false;
    }
    
    // Block F12 (Dev Tools)
    if (e.key === 'F12') {
        e.preventDefault();
        return false;
    }
    
    // Block Ctrl+Shift+I (Dev Tools)
    if (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'i')) {
        e.preventDefault();
        return false;
    }
    
    // Block Ctrl+Shift+J (Console)
    if (e.ctrlKey && e.shiftKey && (e.key === 'J' || e.key === 'j')) {
        e.preventDefault();
        return false;
    }
    
    // Block Ctrl+Shift+C (Inspect Element)
    if (e.ctrlKey && e.shiftKey && (e.key === 'C' || e.key === 'c')) {
        e.preventDefault();
        return false;
    }
    
    // Block Print Screen key (PrtScn)
    if (e.key === 'PrintScreen' || e.key === 'PrtScn') {
        e.preventDefault();
        return false;
    }
    
    // Block Windows+Shift+S (Snipping Tool)
    if (e.metaKey && e.shiftKey && (e.key === 's' || e.key === 'S')) {
        e.preventDefault();
        return false;
    }
    
    // Block Ctrl+Shift+S (Save As / Snipping Tool)
    if (e.ctrlKey && e.shiftKey && (e.key === 's' || e.key === 'S')) {
        e.preventDefault();
        return false;
    }
    
    // Block Ctrl+Alt+S (Alternative screenshot shortcut)
    if (e.ctrlKey && e.altKey && (e.key === 's' || e.key === 'S')) {
        e.preventDefault();
        return false;
    }
    
    // Block Alt+PrintScreen (Active window screenshot)
    if (e.altKey && (e.key === 'PrintScreen' || e.key === 'PrtScn')) {
        e.preventDefault();
        return false;
    }
});

// 5. Silently block the print dialog
window.onbeforeprint = function(e) {
    e.preventDefault();
    return false;
};

// 6. Silently block after print
window.onafterprint = function(e) {
    e.preventDefault();
    return false;
};

// 7. Silently override the print function
if (window.print) {
    window.print = function() {
        return false;
    };
}

// 8. Silently block copy/paste
document.addEventListener('copy', function(e) {
    e.preventDefault();
    return false;
});

document.addEventListener('cut', function(e) {
    e.preventDefault();
    return false;
});

document.addEventListener('paste', function(e) {
    e.preventDefault();
    return false;
});

// 9. Silently blur content when switching tabs/apps (helps prevent screenshots)
document.addEventListener('visibilitychange', function() {
    const modal = document.getElementById('awardModal');
    if (modal && modal.style.display === 'flex') {
        if (document.hidden) {
            // User switched tabs or apps - blur content silently
            modal.style.filter = 'blur(20px)';
            modal.style.transition = 'filter 0.1s';
        } else {
            // User came back - restore content silently
            modal.style.filter = 'blur(0px)';
            modal.style.transition = 'filter 0.1s';
        }
    }
});

// 10. Silently detect if Dev Tools is open (no console logs)
let devToolsOpen = false;
setInterval(() => {
    const threshold = 160;
    const widthThreshold = window.outerWidth - window.innerWidth > threshold;
    const heightThreshold = window.outerHeight - window.innerHeight > threshold;
    
    if (widthThreshold || heightThreshold) {
        if (!devToolsOpen) {
            devToolsOpen = true;
            // Optionally clear content or redirect silently
            // You could redirect or clear content here without notification
        }
    } else {
        devToolsOpen = false;
    }
}, 1000);

// 11. Silently prevent selection via CSS (already handled in CSS)
// This is just a backup

console.log('Services.js loaded successfully - Silent protection enabled');