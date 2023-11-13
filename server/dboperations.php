<?php
include("connection.php");

function createUser($fullname, $phone, $email, $password, $location, $birthdate)
{
    $conn = get_connection_db();
    $is_done = false;
    $user_exist = userExists($email);

    if (!$user_exist) {
        $fullname = mysqli_real_escape_string($conn, $fullname);
        $phone = mysqli_real_escape_string($conn, $phone);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $location = mysqli_real_escape_string($conn, $location);
        $birthdate = mysqli_real_escape_string($conn, $birthdate);

        $insert_sql = "INSERT INTO users (fullname, phone, email, password, location, birthdate) 
                        VALUES ('$fullname', '$phone', '$email', '$password', '$location', '$birthdate')";

        $result = mysqli_query($conn, $insert_sql);

        if ($result) {
            $is_done = true;
        } else {
            echo "Ошибка при выполнении запроса: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    return $is_done;
}

function userExists($email)
{
    $conn = get_connection_db();
    $email = mysqli_real_escape_string($conn, $email);
    $select_sql = "SELECT email FROM users WHERE email = '$email'";
    
    $result = mysqli_query($conn, $select_sql);

    if ($result) {
        $exists = mysqli_num_rows($result) > 0;
        mysqli_free_result($result);
    } else {
        echo "Ошибка при выполнении запроса: " . mysqli_error($conn);
        $exists = false;
    }

    mysqli_close($conn);

    return $exists;
}

function getUserById($id)
{
    $conn = get_connection_db();
    $id = mysqli_real_escape_string($conn, $id);
    $select_sql = "SELECT * FROM users WHERE id = '$id'";
    
    $result = mysqli_query($conn, $select_sql);

    if ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            mysqli_free_result($result);
            mysqli_close($conn);
            return $row; 
        } else {
            mysqli_free_result($result);
            mysqli_close($conn);
            return null; 
        }
    } else {
        echo "Ошибка при выполнении запроса: " . mysqli_error($conn);
        mysqli_close($conn);
        return null;
    }
}
function getUserDetailsByEmail($email)
{
    $conn = get_connection_db();
    $email = mysqli_real_escape_string($conn, $email);
    $select_sql = "SELECT * FROM users WHERE email = '$email'";
    
    $result = mysqli_query($conn, $select_sql);

    if ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            mysqli_free_result($result);
            mysqli_close($conn);
            return $row; // Возвращает ассоциативный массив с данными пользователя
        } else {
            mysqli_free_result($result);
            mysqli_close($conn);
            return null; // Пользователь не найден
        }
    } else {
        echo "Ошибка при выполнении запроса: " . mysqli_error($conn);
        mysqli_close($conn);
        return null;
    }
}
function getAllUsers()
{  
    $conn = get_connection_db();

    $result = mysqli_query($conn, "SELECT id,fullname, phone,email,birthdate FROM users");

    if ($result) {
        $users = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }

        mysqli_free_result($result);

        mysqli_close($conn);

        return $users;
    } else {
        echo "Ошибка при выполнении запроса: " . mysqli_error($conn);

        mysqli_close($conn);

        return null;
    }
}

?>