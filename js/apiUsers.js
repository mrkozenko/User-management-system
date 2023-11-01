const URLAPI = "https://jsonplaceholder.typicode.com/users/";
const loadUserAPIBtn = document.getElementById("loadApiButton");

loadUserAPIBtn.addEventListener("click", function (event) {
  getUsers();
});

function getUsers() {
  let Http = new XMLHttpRequest();
  Http.responseType = "json";
  Http.open("GET", URLAPI);
  Http.setRequestHeader("Content-type", "application/json; charset=utf-8");
  Http.send();

  Http.onreadystatechange = (e) => {
    if (Http.readyState === XMLHttpRequest.DONE) {
      const status = Http.status;
      if (status === 0 || (status >= 200 && status < 400)) {
        console.log(Http.response);
        generateTableFromJSON(Http.response);
      } else {
        alert(`Сталася помилка: код - ${status}`);
      }
    }
  };
}
