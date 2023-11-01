//перевірка чи існує користувач
function isUserExist(mail) {
  let userExist = false;
  Object.keys(sessionStorage).forEach(function (key) {
    if (mail === key) userExist = true;
  });
  return userExist;
}
//отримати юзера по mail
function getUserByMail(mail) {
  let user = null;
  Object.keys(sessionStorage).forEach(function (key) {
    if (mail === key) {
      user = JSON.parse(sessionStorage.getItem(key));
      return user;
    }
  });
  return user;
}

//функція для додавання нового юзера в localstorage
function addNewUser(userObject) {
  if (!isUserExist(userObject.mail)) {
    sessionStorage.setItem(userObject.mail, JSON.stringify(userObject));
    return true;
  }
  return false;
}

//отримати всіх юзерів
function getAllUsers() {
  let users = [];
  Object.keys(sessionStorage).forEach(function (key) {
    console.log(key);
    users.push(JSON.parse(sessionStorage.getItem(key)));
  });
  return users;
}

//для конвертації даних форми в об'єкт юзера
function formDataToObject(formData) {
  const normalizeValues = (values) => (values.length > 1 ? values : values[0]);
  const formElemKeys = Array.from(formData.keys());

  return Object.fromEntries(
    formElemKeys.map((key) => [key, normalizeValues(formData.getAll(key))])
  );
}
