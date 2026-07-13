// ==========================================
// APPLY MODAL
// ==========================================

function openApplyModal() {
    var modal = document.getElementById('applyModal');
    modal.classList.add('active');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeApplyModal() {
    var modal = document.getElementById('applyModal');
    modal.classList.remove('active');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// ==========================================
// VALIDATION MODAL
// ==========================================

function openValidationModal(message) {
    document.getElementById('validationMessage').textContent = message;
    var modal = document.getElementById('validationModal');
    modal.classList.add('active');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeValidationModal() {
    var modal = document.getElementById('validationModal');
    modal.classList.remove('active');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// ==========================================
// SUCCESS MODAL
// ==========================================

function openSuccessModal(title, message) {
    document.getElementById('successTitle').textContent = title;
    document.getElementById('successMessageText').textContent = message;
    var modal = document.getElementById('successModal');
    modal.classList.add('active');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeSuccessModal() {
    var modal = document.getElementById('successModal');
    modal.classList.remove('active');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// ==========================================
// CLOSE MODALS ON ESCAPE
// ==========================================

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        if (document.getElementById('applyModal').classList.contains('active')) {
            closeApplyModal();
        }
        if (document.getElementById('validationModal').classList.contains('active')) {
            closeValidationModal();
        }
        if (document.getElementById('successModal').classList.contains('active')) {
            closeSuccessModal();
        }
    }
});

// ==========================================
// CLOSE MODALS ON OUTSIDE CLICK
// ==========================================

window.addEventListener('click', function(e) {
    var applyModal = document.getElementById('applyModal');
    var validationModal = document.getElementById('validationModal');
    var successModal = document.getElementById('successModal');
    
    if (e.target === applyModal) {
        closeApplyModal();
    }
    if (e.target === validationModal) {
        closeValidationModal();
    }
    if (e.target === successModal) {
        closeSuccessModal();
    }
});

// ==========================================
// FORM SUBMISSION
// ==========================================

document.getElementById('applicationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Reset borders
    var allFields = this.querySelectorAll('input, select, textarea');
    allFields.forEach(function(field) {
        field.style.borderColor = '';
    });
    
    // Validate required fields
    var required = this.querySelectorAll('[required]');
    var missing = false;
    var firstInvalid = null;
    
    required.forEach(function(field) {
        if (field.type === 'file') {
            if (field.files.length === 0) {
                field.style.borderColor = '#dc3545';
                missing = true;
                if (!firstInvalid) firstInvalid = field;
            }
        } else {
            if (field.value.trim() === '') {
                field.style.borderColor = '#dc3545';
                missing = true;
                if (!firstInvalid) firstInvalid = field;
            }
        }
    });
    
    // Validate email
    var email = this.querySelector('input[name="email"]');
    if (email && email.value.trim() !== '') {
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email.value.trim())) {
            email.style.borderColor = '#dc3545';
            openValidationModal('Please enter a valid email address.');
            return;
        }
    }
    
    // Validate contact
    var contact = this.querySelector('input[name="contact"]');
    if (contact && contact.value.trim() !== '') {
        var contactPattern = /^09\d{9}$/;
        if (!contactPattern.test(contact.value.trim())) {
            contact.style.borderColor = '#dc3545';
            openValidationModal('Please enter a valid 11-digit contact number starting with 09.');
            return;
        }
    }
    
    if (missing) {
        openValidationModal('Please complete all required fields before submitting your application.');
        if (firstInvalid) {
            firstInvalid.focus();
        }
        return;
    }
    
    // Submit form via AJAX
    var submitBtn = this.querySelector('.submit-btn');
    var originalText = submitBtn.textContent;
    submitBtn.textContent = 'Submitting...';
    submitBtn.disabled = true;
    
    var formData = new FormData(this);
    
fetch('backend/careerBE.php', {
    method: 'POST',
    body: formData
})
    .then(function(response) {
        return response.text();
    })
    .then(function(data) {
        closeApplyModal();
        
        if (data.includes('Application Received Successfully') || data.includes('Application Received')) {
            openSuccessModal(
                'Application Submitted Successfully!',
                'Thank you for applying! A confirmation email has been sent to your email address.'
            );
        } else {
            openValidationModal('There was an error processing your application. Please try again.');
        }
        
        document.getElementById('applicationForm').reset();
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    })
    .catch(function(error) {
        console.error('Error:', error);
        openValidationModal('An error occurred. Please try again.');
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
});