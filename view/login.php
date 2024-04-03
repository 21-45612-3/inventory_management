<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form method="POST" action="../controller/check-login.php">
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required placeholder="YOUR EMAIL"><br><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required placeholder="YOUR PASSWORD">
<br>
<input type="submit" name="submit" value="Submit">
</form>

<h4>Don't Have an Account yet?</h4>
<a href="register.php">Sign up</a>
</body>
</html>