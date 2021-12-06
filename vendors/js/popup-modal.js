var modal = document.querySelector(".popup-modal");
var trigger = document.querySelector(".profile-img img");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-popup-modal");
    console.log('hi')
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);
