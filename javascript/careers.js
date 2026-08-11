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

// 9. Silently blur content when switching tabs/apps
document.addEventListener('visibilitychange', function() {
    const modal = document.getElementById('applyModal');
    if (modal && modal.style.display === 'flex') {
        if (document.hidden) {
            modal.style.filter = 'blur(20px)';
            modal.style.transition = 'filter 0.1s';
        } else {
            modal.style.filter = 'blur(0px)';
            modal.style.transition = 'filter 0.1s';
        }
    }
    
    // Also blur the whole page when not in focus
    if (document.hidden) {
        document.body.style.filter = 'blur(10px)';
        document.body.style.transition = 'filter 0.1s';
    } else {
        document.body.style.filter = 'blur(0px)';
        document.body.style.transition = 'filter 0.1s';
    }
});

// 10. Silently detect if Dev Tools is open
let devToolsOpen = false;
setInterval(() => {
    const threshold = 160;
    const widthThreshold = window.outerWidth - window.innerWidth > threshold;
    const heightThreshold = window.outerHeight - window.innerHeight > threshold;
    
    if (widthThreshold || heightThreshold) {
        if (!devToolsOpen) {
            devToolsOpen = true;
        }
    } else {
        devToolsOpen = false;
    }
}, 1000);

console.log('careers.js loaded successfully - Silent protection enabled');