const authUser = document.getElementById("authUserBtn");
const authForm = document.getElementById("authForm");
//перевірка авторизації користувача
function checkAuth(event) {
  event.preventDefault();
  if (!email.validity.valid) {
    showError();
    event.preventDefault();
  }
  const formData = new FormData(authForm);
  const userObject = formDataToObject(formData);
  let user = getUserByMail(userObject.mail);
  //перевірка чи дійсно співпадає логін та пароль
  if (isUserExist(userObject.mail) && userObject.password === user.mail) {
    alert(
      "Вітаємо в нашій спільноті!Зараз Ви зможете переглянути список всіх користувачів"
    );
    window.location = "users.html";
  } else {
    alert("Схоже, що акаунта з такою поштою не існує!");
  }
}
//івент для авторизації
authUser.addEventListener("click", checkAuth);
