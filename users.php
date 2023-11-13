<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Дані користувачів</title>
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="css/styles.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="css/users.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="css/adaptive.css"
    />
  </head>
  <body>
    <?php session_start();

// if user auth
if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    $display = true;
} else {
    header("Location: auth.html");
    exit();
}?>

    <main>
      
      <?php 
if($display){
  echo ' <div class="user-block">сесія користувача '.
        $_SESSION['email']
    .'</div>';
}

    ?>
     <form action="./server/logout.php" method="post">
            <input type="submit" class="button" value="Вийти з сесії" />
        </form>
      <h1 style="text-align: center">Дані зареєстрованих користувачів</h1>
      <div class="maindiv">
        <table id="userTable" class="styled-table">
          <thead>
            <tr>
              <th>Ідентифікатор</th>
              <th>Ім'я та прізвище</th>
              <th>Телефон</th>
              <th>Пошта</th>
              <th>Дата народження</th>
            </tr>
          </thead>
          <tbody>
                <?php
                include("./server/dboperations.php");
                include("./server/utils.php");
                  $users = getAllUsers();
                  buildTable($users);
                ?>
          </tbody>
        </table>
      </div>
      <div class="maindiv">
        <a href="auth.html">
          <input type="button" class="button" value="Авторизація" />
        </a>
        <a href="index.html">
          <input type="button" class="button" value="Реєстрація" />
        </a>
      </div>
    </main>
  </body>
  <script src="js/user.js"></script>
  <script src="js/db.js"></script>
</html>
