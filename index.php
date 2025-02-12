<?php
    require_once 'includes/login_view.inc.php';
    require_once 'includes/config_session.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adibook</title>
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body>

    <main class="index-login-main">
        <div class="wrapper-main login-container">
        <div class="index-main-about">
            <h1>adibook</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="index-main-form">
            <form action="includes/login.inc.php" method="post">
                <?php check_login_errors(); ?>
                <input type="text" name="username" id="username" placeholder="Email address or phone number" autocomplete="$_COOKIE">
                <input type="password" name="pwd" id="pwd" placeholder="Password"> <br>
                <button type="submit">Log in</button>
                <a href="#">Forgotten Password?</a>
            </form>
            <a href="sign_up.php" class><div class="index-create-account">
                Create new account
            </div></a>
        </div>
        </div>
    </main>

    <?php include 'partials/footer.php';?>

</body>
</html>