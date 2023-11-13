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
            $data = array();
            $data["success"] =false;
            if ($is_exist) {
                $user = getUserDetailsByEmail($email);
                if ($user['password'] == $password) {
                session_start();
                // save user info to session
                $_SESSION['email'] = $email;
                $_SESSION['full_name'] = $user['fullname'];
                $data["success"] =true;
                $data["message"] ="";
                } else{
                    $data["message"] ="Вказаний вами пароль є помилковим";
                }
            } else {
                $data["message"] ="Користувача з такою поштою нема в системі";
            }
        } else {
            $data["message"] ="Всі поля повинні бути заповнені.";
        }
    } else {
        $data["message"] ="Невірний формат даних.";
    }
     echo json_encode($data);

}
?>