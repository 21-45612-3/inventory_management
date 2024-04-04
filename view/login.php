<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Login | INV MNG SYS</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />

    </head>
    
    <body>

        <section class="text-center">

            <div class="p-5 bg-image" style="background: linear-gradient(0deg, #C8DBED 35%, #9BBBDA 100%); height: 300px;"></div>

            <div class="d-flex justify-content-center">
                <div class="card mx-4 mx-md-5 shadow-5-strong container-xl mb-4" style="
                        margin-top: -165px;
                        background: hsla(0, 0%, 100%, 0.8);
                        backdrop-filter: blur(30px);
                        ">
                    <div class="card-body py-5 px-md-5">

                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <h3 class="fw-bold mb-5">Sign In</h3>
                                <form method="POST" action="../controller/check-login.php" class="mb-2">
                                    <div class="form-outline mb-4">
                                        <label class="form-label d-flex" for="email">Email address</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="example@email.com" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label d-flex" for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required/>
                                    </div>

                                    <input type="submit" class="btn btn-primary btn-block mb-4" name="submit" value="Sign In">
                                </form>

                                <div class="d-flex justify-content-center gap-2">
                                    <h6>Don't have an account yet? <a href="register.php" class="text-decoration-none">Sign Up</a></h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>