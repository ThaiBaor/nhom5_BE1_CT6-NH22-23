<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Login Form</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="header-logo">
        <a href="index.php" class="logo">
            <img src="./img/logo.png" alt="">
        </a>
    </div>
    <main class="container">
        <h2>Register</h2>    
        <form action="loginProgress.php" method="POST">
            <div class="input-field">
                <input type="text" name="username" id="username" placeholder="Enter Your Username" required>
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Comfirm Your Password" required>
                <div class="underline1"></div>
            </div>
            <input type="submit" value="Continue">
            </div>
        </form>
        </div>
    </main>
    <script>
    </script>
</body>

</html>