const loadUserAPIBtn = document.getElementById("loadApiButton");
loadUserAPIBtn.addEventListener('click', function (event) {
    getUsers();

  });


function getUsers(){
    let Http = new XMLHttpRequest();
    let url='https://jsonplaceholder.typicode.com/users/';
    Http.responseType = "json";
    Http.open("GET", url);
    Http.send();
    
    Http.onreadystatechange = (e) => {
        if (Http.readyState === XMLHttpRequest.DONE) {
            const status = Http.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                console.log(Http.response);
                generateTableFromJSON(Http.response);
                //console.log(Http.responseText);
            } else {
              // Oh no! There has been an error with the request!
            }
                //console.log(Http.responseText)
    }
    }
}