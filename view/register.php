<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Registration | INV MNG SYS</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />

    </head>
    
    <body>

        <section class="text-center">

            <div class="p-5 bg-image" style="background: linear-gradient(0deg, #C8DBED 35%, #9BBBDA 100%); height: 300px;"></div>

            <div class="d-flex justify-content-center">
                <div class="card mx-4 mx-md-5 shadow-5-strong container-xl" style="
                        margin-top: -165px;
                        margin-bottom: 135px;
                        background: hsla(0, 0%, 100%, 0.8);
                        backdrop-filter: blur(30px);
                        ">
                    <div class="card-body py-5 px-md-5">

                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <h3 class="fw-bold mb-5">Register</h3>
                                <form method="POST" action="../controller/check-registration.php" class="mb-2">
                                    <div class="form-outline mb-4">
                                        <label class="form-label d-flex" for="name">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Full name" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label d-flex" for="email">Email address</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="example@email.com" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label d-flex" for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required/>
                                        <span id="passwordError" style="color: red;"></span>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label d-flex" for="confirmpassword">Confirm Password</label>
                                        <input type="password" id="confirmpassword" name= "confirmpassword" class="form-control" placeholder="Confirm Password" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label d-flex" for="usertype">Usertype</label>
                                        <select id="usertype" name="usertype" class="form-select">
                                            <option value="" selected>Select</option>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>

                                    <input type="submit" class="btn btn-primary btn-block mb-4 mt-2" name="submit" value="Sign Up">
                                </form>

                                <div class="d-flex justify-content-center gap-2">
                                    <h6>Already have an account? <a href="login.php" class="text-decoration-none">Sign In</a></h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

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
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>


    </body>
</html>
