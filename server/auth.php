<?php
include("dboperations.php");
//Для обробки запитів з реєстрації користувачів
if (isset($_POST)) {
    // check if all field exists
    if (
       isset($_POST['mail']) && isset($_POST['password']) 
    ) {
        //check all fields not empty
        if (
           !empty($_POST['mail']) &&
            !empty($_POST['password'])  ) {
          
            $email = htmlspecialchars($_POST['mail']);
            $password = $_POST['password'];
           
            //check user exist and auth
            $is_exist = userExists($email);
            if ($is_exist) {
                $user = getUserDetailsByEmail($email);
                if ($user['password'] == $password) {
                session_start();
                // save user info to session
                $_SESSION['email'] = $email;
                $_SESSION['full_name'] = $user['full_name'];
                header("Location: ../users.php");
                exit();
                } else{
                    echo $user['password'];
                    echo "<br>";
                    echo $password;
                echo "Вказаний вами пароль є помилковим";
                }
            } else {
                echo "Користувача з такою поштою нема в системі";
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