<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SupLink</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>
    <div class="container-narrow">
        <div class="masthead">
            <ul class="nav nav-pills pull-right">
                <li><a href="/home">Home</a></li>
                <li class="active"><a href="#">Login</a></li>
                <li><a href="/register">Register</a></li>
            </ul>
        <h3 class="muted">SupLink-143783</h3>
        </div>
        
        <hr>
        <?php 
        if (isset($_GET['param2'])) {
            if ($_GET['param2'] == "email") {
                ?>
                    <div class="alert alert-error">
                        Cet email n'existe pas dans la database
                    </div>
                <?php
            }
            elseif ($_GET['param2'] == "password") {
                ?>
                    <div class="alert alert-error">
                        Mauvais password
                    </div>
                <?php
            }
        }
         ?>

        <form class="form-signin" method="post" action="/php/login.php">
            <h2 class="form-signin-heading">LOGIN</h2>
            <input type="email" name="email" class="input-block-level" placeholder="Email address" required>
            <input type="password" name="password" class="input-block-level" placeholder="Password" required>
            <button class="btn btn-large btn-primary" type="submit">Sign in</button>
        </form>

        <hr>

        <div class="footer">
            <p>&copy; SupLink-143783 2013</p>
        </div>

    </div>

</body>
</html>
