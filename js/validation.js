const email = document.getElementById("mail");
const emailError = document.querySelector("#mail + span.error");
const form = document.getElementById("authForm");
authUser = document.getElementById("authUserBtn");

email.addEventListener("input", function (event) {
  if (email.validity.valid) {
    emailError.textContent = "";
    emailError.className = "error";
  } else {
    showError();
  }
});

function showError() {
  if (email.validity.valueMissing) {
    emailError.textContent = "Введіть поштову адресу!";
  } else if (email.validity.typeMismatch) {
    emailError.textContent =
      "Значення, що повинне заповнювати поле повинно бути саме поштою";
  } else if (email.validity.tooShort) {
    emailError.textContent = `Мінімальна довжина пошти ${email.minLength} символів; ви ввели ${email.value.length}.`;
  }

  // Задаём соответствующую стилизацию
  emailError.className = "error active";
}
