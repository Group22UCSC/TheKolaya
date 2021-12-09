const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const login_here = document.querySelector("#login_here");
const register_here = document.querySelector("#register_here");
// const registerBtn = document.querySelector("#registrationBtn");
const container = document.querySelector(".container");
// const inputField = document.querySelector(".input-field");



sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

register_here.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

login_here.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

// registerBtn.addEventListener("click", () => {
//   inputField.style.margin = "0px";
// });