const URLAPI = "https://jsonplaceholder.typicode.com/users/";
const fileJSON = "users.json";
const loadUserAPIBtn = document.getElementById("loadApiButton");
const loadUsersFile = document.getElementById("loadUsersFile");

loadUsersFile.addEventListener("click", function (event) {
  getUsers("File");
});

loadUserAPIBtn.addEventListener("click", function (event) {
  getUsers("API");
});

function getUsers(flag) {
  let Http = new XMLHttpRequest();
  Http.responseType = "json";
  if (flag === "API") {
    Http.open("GET", URLAPI);
    Http.setRequestHeader("Content-type", "application/json; charset=utf-8");
  } else {
    Http.open("GET", fileJSON, true);
  }
  Http.send();

  Http.onreadystatechange = (e) => {
    if (Http.readyState === XMLHttpRequest.DONE) {
      const status = Http.status;
      if (status >= 200 && status < 400) {
        if (Http.response != null) generateTableFromJSON(Http.response);
      } else if (status === 404) {
        alert("Помилка 404: сторінку не знайдено");
      } else {
        alert(`Сталася помилка: код - ${status}`);
      }
    }
  };
  Http.onerror = function (e) {
    alert(e.target.statusText);
    alert("Помилка підключення до інтернету або сервер недоступний");
  };
}
