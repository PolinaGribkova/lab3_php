<?php
require 'vendor/autoload.php';

// Настройки подключения к базе данных
$dbHost = "localhost:3306";
$dbUser = "root";
$dbPassword = "";
$dbName = "lab3";

// Соединение с базой данных
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Проверка подключения
if ($conn->connect_error) {
  die("Ошибка подключения: " . $conn->connect_error);
}


// Настройка цвета страницы
$backgroundColor = "#f0f0f0";

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Регистрация и Авторизация</title>
  <style>
   body {
      background-color: <?php echo isset($_COOKIE['background_color']) ? $_COOKIE['background_color'] : "#f0f0f0"; ?>;
      font-family: sans-serif;
    }
    .container {
      width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    input[type="text"], input[type="email"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .error {
      color: red;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <div class="container">

    <?php

 if (isset($_COOKIE['username'])) {
      echo "<h2>Добро пожаловать, " . $_COOKIE['username'] . "!</h2>";
    } else {
      echo "<h2>Вы не авторизованы.</h2>";
    }
	
    // Обработка регистрации
    if (isset($_POST['register'])) {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Проверка наличия пользователя с таким именем
      $sql = "SELECT * FROM users WHERE username = '$username'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo '<div class="error">Пользователь с таким именем уже существует!</div>';
      } else {
        // Создание нового пользователя
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
          echo '<div class="success">Регистрация прошла успешно!</div>';
        } else {
          echo '<div class="error">Ошибка регистрации: ' . $conn->error . '</div>';
        }
      }
    }

    // Обработка авторизации
    if (isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      // Проверка наличия пользователя в базе данных
      $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
 // Сохраняем имя пользователя
	 setcookie('username', $username);
     header("Location: index.php");
  exit;

      } else {
        echo '<div class="error">Неверный логин или пароль!</div>';
      }
    }
	
	  // Обработка выхода
    if (isset($_POST['logoff'])) {
	 setcookie('username', '');
	 $_COOKIE['username'] = '';
	   // Перенаправляем пользователя на главную страницу
  header("Location: index.php");
  exit;
    }
	
	// Обработка изменения цвета фона
if (isset($_POST['background_color'])) {
  $backgroundColor = $_POST['background_color'];

  // Устанавливаем cookie с цветом фона
  setcookie('background_color', $backgroundColor);

  // Перенаправляем пользователя на главную страницу
  header("Location: index.php");
  exit;
}

    ?>
	

    <h2>Регистрация</h2>
    <form method="post" action="">
      <input type="text" name="username" placeholder="Имя пользователя" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Пароль" required>
      <input type="submit" name="register" value="Зарегистрироваться">
    </form>

    <h2>Авторизация</h2>
    <form method="post" action="">
      <input type="text" name="username" placeholder="Имя пользователя" required>
      <input type="password" name="password" placeholder="Пароль" required>
      <input type="submit" name="login" value="Войти">
    </form>
	
	 <h2>Выход</h2>
    <form method="post" action="">
    <input type="submit" name="logoff" value="Выйти">
    </form>

	
	 <h2>Настройка цвета фона</h2>
    <form method="post" action="">
      <input type="color" name="background_color" value="<?php echo $backgroundColor; ?>">
      <input type="submit" value="Сохранить">
    </form>

  </div>

</body>
</html>


