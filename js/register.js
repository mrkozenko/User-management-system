
const registerUser = document.getElementById("registerUser");
const form = document.getElementById('user-register-form');

registerUser.addEventListener('click', function (event) {
    event.preventDefault();
  
    // 1: get form data
    const formData = new FormData(form);
    // 2: store form data in object
    const userObject = formDataToObject(formData);
    if (addNewUser(userObject)){
        window.location = 'auth.html';
    }

  });
//зробити логіку перевірки типів(валідацію)
//зробити логіку додавання даних в сторедж
//зробити логіку відображення акаунтів з стореджу
//логіку для авторизації лише з наявного у стореджі акаунта
//submitButton.addEventListener("click",validate);
