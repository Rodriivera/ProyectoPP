const inputs = document.querySelectorAll(".input-field");
const cambiar = document.querySelectorAll(".cambiar");
const main = document.querySelector("main");

inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

cambiar.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});



function showErrorMessage() {
  var errorMessage = document.getElementById('error-message');
  if (errorMessage) {
      errorMessage.classList.add('show');
      setTimeout(function() {
          errorMessage.classList.remove('show');
      }, 5000);
  }
}
window.onload = showErrorMessage;


