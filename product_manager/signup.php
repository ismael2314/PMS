
<?php
    include 'auth/auth-signup.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product_manager | Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <div class="container">
            <div class="header">
                <img src="img/logo.png" alt="logo" width="250" class="img">
                <h1 class="title">Login to PMS</h1>
            </div>
            <div class="form">
                <form method="post" onsubmit="return validate()">
                    <div>
                        <label>
                            Username
                        </label>
                        <input type="uname" name="uname" placeholder="User name" class="form-field" required>
                    </div>
                    <div>
                        <label>
                            E-mail
                        </label>
                        <input type="email" name="email" placeholder="E-mail" class="form-field" required>
                    </div>
                    <div>
                        <label>
                            Password
                        </label>
                        <input type="password" name="password" placeholder="Password" class="form-field" required>
                    </div>
                    <div>
                        <label>
                            Confirm
                        </label>
                        <input type="password" placeholder="Confirm password" class="form-field" required>
                    </div>
                    <div>
                        <button type="submit" name="sign">Sign up</button>
                    </div>
                    <hr>
                    <p>
                        <a href="login.php" hreflang="en">
                            I have an account.
                        </a> 
                    </p>
                </form>
            </div>

            <footer>
            
                <a href="soon.html" target="_blank">Home</a>
            
                <a href="soon.html" target="_blank">About us</a>
            
                <a href="soon.html" target="_blank">Help</a>
            
                <a href="soon.html" target="_blank">Feed back</a>
        
    </footer>
    </div>
</body>
</html>