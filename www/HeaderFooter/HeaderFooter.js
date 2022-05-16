let cookieModal = document.querySelector(".cookie-consent-modal");
let cancelCookie = document.querySelector(".btn-decline");
let acceptCookie = document.querySelector(".btn-accept");

cancelCookie.addEventListener("click", () => {
  alert("You have declined the use of cookies");
  cookieModal.classList.remove("active");
});
acceptCookie.addEventListener("click", () => {
  cookieModal.classList.remove("active");
  localStorage.setItem("cookieAccepted", "yes");
});

setTimeout(() => {
  let cookieAccepted = localStorage.getItem("cookieAccepted");
  if (cookieAccepted != "yes") {
    cookieModal.classList.add("active");
  }
}, 700);
