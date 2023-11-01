function buildTable(){
    let users = getAllUsers()
    const tableBody = document.querySelector("#userTable tbody");
    users.forEach((user, index) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${index+1}</td>
            <td>${user.mail}</td>
            <td>${user["first-name"]}</td>
            <td>${user["second-name"]}</td>
            <td>${user.birthdate}</td>
            <td>${user.location}</td>
            <td>${user.password}</td>
            <td>${user.phone}</td>
        `;
    
        tableBody.appendChild(row);
    });
}

// document.addEventListener("DOMContentLoaded", function(event) {
//     buildTable()    
// });


function generateTableFromJSON(jsonAPI){
    const tableBody = document.querySelector("#userTable tbody");
    jsonAPI.forEach((user) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${user.id}</td>
            <td>${user.email}</td>
            <td>${user.name}</td>
            <td>${user.phone}</td>
            <td>${user.website}</td>
            <td>${user.username}</td>


        `;
    
        tableBody.appendChild(row);
    });
}