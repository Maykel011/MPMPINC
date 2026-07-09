// ======================================================
// APPLY MODAL
// ======================================================

const applyModal = document.getElementById("applyModal");
const openApplyModal = document.getElementById("openApplyModal");
const closeApplyModal = document.getElementById("closeApplyModal");
const cancelApply = document.getElementById("cancelApply");

// =========================
// OPEN MODAL
// =========================

function openModal() {

    applyModal.style.display = "flex";

    document.body.style.overflow = "hidden";

}

// =========================
// CLOSE MODAL
// =========================

function closeModal() {

    applyModal.style.display = "none";

    document.body.style.overflow = "auto";

}

// =========================
// OPEN BUTTON
// =========================

openApplyModal.addEventListener("click", function () {

    openModal();

});

// =========================
// CLOSE (X)
// =========================

closeApplyModal.addEventListener("click", function () {

    closeModal();

});

// =========================
// CANCEL BUTTON
// =========================

cancelApply.addEventListener("click", function () {

    closeModal();

});

// =========================
// CLICK OUTSIDE MODAL
// =========================

window.addEventListener("click", function (event) {

    if (event.target === applyModal) {

        closeModal();

    }

});

// =========================
// ESC KEY
// =========================

document.addEventListener("keydown", function (event) {

    if (event.key === "Escape" && applyModal.style.display === "flex") {

        closeModal();

    }

});

// =========================
// PREVENT FORM SUBMISSION
// (Remove this once PHP processing is added)
// =========================

const applyForm = document.querySelector(".apply-modal form");

applyForm.addEventListener("submit", function (event) {

    event.preventDefault();

    alert("Application submitted successfully!");

    applyForm.reset();

    closeModal();

});