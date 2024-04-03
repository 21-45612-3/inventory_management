<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>

<h2>Registration Form</h2>

<form method="POST" action="../controller/check-registration.php">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required placeholder="YOUR NAME"><br><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required placeholder="YOUR EMAIL"><br><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required placeholder="YOUR PASSWORD"><br>
    <span id="passwordError" style="color:red;"></span><br>
    
    <label for="confirmpassword">Confirm Password:</label><br>
    <input type="password" id="confirmpassword" name="confirmpassword" required placeholder="CONFIRM PASSWORD"><br>
   

    <br>

    <label for="usertype">User Type:</label><br>
    <select id="usertype" name="usertype">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br><br>

    <input type="submit" name="submit" value="Submit">
</form>
<h4>Already have an account?</h4>
<a href="login.php">Login</a>
<script>
       document.getElementById('password').addEventListener('input', function() {
        var password = document.getElementById('password').value;
        var confirmpassword = document.getElementById('confirmpassword').value;
        var passwordError = document.getElementById('passwordError');
        
        if (password !== confirmpassword) {
            passwordError.innerText = "Password must be same as confirmed password";
        } else {
            passwordError.innerText = "";
        }
    });
</script>

</body>
</html>
