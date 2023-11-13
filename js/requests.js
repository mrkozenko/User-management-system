$(document).ready(function () {
  $("#authUserBtn").click(function () {
    var email = $("#mail").val();
    var password = $("input[name='password']").val();
    sendAuthRequest(email, password);
  });
  $("#logoutForm").submit(function (event) {
    event.preventDefault();
    sendLogoutRequest();
  });
});

function sendLogoutRequest() {
  $.ajax({
    url: $(this).attr("action"),
    method: $(this).attr("method"),
    data: $(this).serialize(),
    dataType: "json",
    success: function (data) {
      window.location.href = "auth.html";
    },
    error: function (error) {
      console.error("Error during logout:", error);
    },
  });
}

function sendAuthRequest(email, password) {
  $.ajax({
    type: "POST",
    url: "server/auth.php",
    data: {
      mail: email,
      password: password,
    },
    dataType: "json",
    success: function (response) {
      console.log(response);
      if (response)
        if (response.success) {
          window.location.href = "users.php";
        } else {
          $("#message").text(response.message);
        }
    },
    error: function (e) {
      alert(e.responseText);
    },
  });
}
