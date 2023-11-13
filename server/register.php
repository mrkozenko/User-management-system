<?php
include("dboperations.php");
//Для обробки запитів з реєстрації користувачів
if (isset($_POST)) {
    // check if all field exists
    if (
        isset($_POST['first-name']) && isset($_POST['second-name']) &&
        isset($_POST['phone']) && isset($_POST['mail']) &&
        isset($_POST['password']) && isset($_POST['location']) &&
        isset($_POST['birthdate'])
    ) {
        //check all fields not empty
        if (
            !empty($_POST['first-name']) && !empty($_POST['second-name']) &&
            !empty($_POST['phone']) && !empty($_POST['mail']) &&
            !empty($_POST['password']) && !empty($_POST['location']) &&
            !empty($_POST['birthdate'])
        ) {
            $full_name = $_POST['first-name'] . ' ' . $_POST['second-name'];
            $phone = $_POST['phone'];
            $email = $_POST['mail'];
            $password = $_POST['password'];
            $location = $_POST['location'];
            $birthdate = $_POST['birthdate'];

            $is_add = createUser($full_name, $phone, $email, $password, $location, $birthdate);

            if ($is_add) {
                header("Location: auth.html");
                exit();
            } else {
                echo "Користувач з такою поштою вже є в системі";
            }
        } else {
            echo "Всі поля повинні бути заповнені.";
        }
    } else {
        echo "Невірний формат даних.";
    }
    echo ' <div class="maindiv">
        <a href="../auth.html">
          <input type="button" class="button" value="Авторизація" />
        </a>
        <a href="../index.html">
          <input type="button" class="button" value="Реєстрація" />
        </a>
      </div>';

}
?>