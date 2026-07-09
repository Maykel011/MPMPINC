// ======================================================
// APPLY MODAL
// ======================================================

const applyModal = document.getElementById("applyModal");
const openApplyModal = document.getElementById("openApplyModal");
const closeApplyModal = document.getElementById("closeApplyModal");

const applyForm = document.querySelector(".apply-modal form");
const modalBody = document.querySelector(".apply-modal-body");
const submitArea = document.querySelector(".apply-buttons");

// ======================================================
// VALIDATION MODAL
// ======================================================

const validationModal = document.getElementById("validationModal");
const validationMessage = document.getElementById("validationMessage");
const validationOk = document.getElementById("validationOk");

// ======================================================
// SHOW VALIDATION MODAL
// ======================================================

function showValidationModal(message) {

    validationMessage.textContent = message;

    validationModal.style.display = "flex";

}

// ======================================================
// CLOSE VALIDATION MODAL
// ======================================================

validationOk.addEventListener("click", function () {

    validationModal.style.display = "none";

});

// Close by clicking outside

window.addEventListener("click", function (event) {

    if (event.target === validationModal) {

        validationModal.style.display = "none";

    }

});

// ======================================================
// OPEN APPLY MODAL
// ======================================================

function openModal() {

    applyModal.style.display = "flex";

    document.body.style.overflow = "hidden";

    checkScroll();

}

// ======================================================
// CLOSE APPLY MODAL
// ======================================================

function closeModal() {

    applyModal.style.display = "none";

    document.body.style.overflow = "auto";

}

// ======================================================
// OPEN BUTTON
// ======================================================

openApplyModal.addEventListener("click", function () {

    openModal();

});

// ======================================================
// CLOSE BUTTON (X)
// ======================================================

closeApplyModal.addEventListener("click", function () {

    closeModal();

});

// ======================================================
// CLICK OUTSIDE APPLY MODAL
// ======================================================

window.addEventListener("click", function (event) {

    if (event.target === applyModal) {

        closeModal();

    }

});

// ======================================================
// ESC KEY
// ======================================================

document.addEventListener("keydown", function (event) {

    if (event.key === "Escape") {

        if (applyModal.style.display === "flex") {

            closeModal();

        }

        if (validationModal.style.display === "flex") {

            validationModal.style.display = "none";

        }

    }

});

// ======================================================
// SHOW SUBMIT BUTTON ONLY AT BOTTOM
// ======================================================

function checkScroll() {

    const reachedBottom =
        modalBody.scrollTop + modalBody.clientHeight >=
        modalBody.scrollHeight - 10;

    if (reachedBottom) {

        submitArea.classList.add("show");

    } else {

        submitArea.classList.remove("show");

    }

}

modalBody.addEventListener("scroll", checkScroll);

// ======================================================
// VALIDATE FORM
// ======================================================

applyForm.addEventListener("submit", function (event) {

    let missing = false;

    const requiredFields = applyForm.querySelectorAll("[required]");

    requiredFields.forEach(function (field) {

        field.style.borderColor = "";

        if (field.type === "file") {

            if (field.files.length === 0) {

                missing = true;

                field.style.borderColor = "#dc3545";

            }

        } else {

            if (field.value.trim() === "") {

                missing = true;

                field.style.borderColor = "#dc3545";

            }

        }

    });

    if (missing) {

        event.preventDefault();

        showValidationModal(
            "Please complete all required fields before submitting your application."
        );

        return;

    }

    // Form is valid.
    // The browser will now submit to backend/careerBE.php.

});