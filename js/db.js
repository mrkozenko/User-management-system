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

document.addEventListener("DOMContentLoaded", function(event) {
    buildTable()    
});