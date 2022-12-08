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
        <h2>Login</h2>
        <?php
        if (isset($_COOKIE['error'])){
            ?>
        <div class="error">
            <h3 style="color: red;">Login failed</h3>
        </div>
        <br>
        <?php
        }
        else if (isset($_COOKIE['successReg'])){
            ?>
        <div class="error">
            <h3 style="color: Green;">Register successed</h3>
        </div>
        <br>
        <?php
        }
        ?> 
        <form action="loginProcess.php" method="POST">
            <div class="input-field">
                <input type="text" name="username" id="username" placeholder="Enter Your Username" required>
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
                <div class="underline"></div>
            </div>
            <br>
            <div><input type="checkbox" id="showhide"><label for="showhide" style="font-size: small;">Show password</label></div>
            <input type="submit" value="Continue" style="margin-top: 9px;">
            <a href="register.php" style="margin-top: 10px; padding-left: 94px; text-decoration:none; color: black">Register</a>
            </div>
        </form>
        </div>
    </main>
    <script>
        const togglepass = document.querySelector("#showhide");
        const pass = document.querySelector("#password");
        togglepass.addEventListener("click",function(e){
            const type = pass.getAttribute('type')==='password'? 'text':'password';
            pass.setAttribute('type', type);
        })
    </script>
</body>

</html>