<?php
require 'user.php';
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="styless.css">
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col">
                    <div class="col d-flex align-items-center">
                        <div class="h-50 w-75 box">
                            <h1 class="fw-bold text-center mt-5">OBJECT-ORIENTED <br> LOGIN/REGISTRATION</h1>
                        </div>
                    </div>
                    </div>
                    <div class="col">
                        <form method="POST" class="form-group">
                            <div class="box">
                                <h3 class="fw-bold pb-2">Register an account</h3>
                                <?php

                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];

                                    $user = new User();
                                    if ($user->register($username, $password)) {
                                        echo "<p class='text-center' style='color: green;'>Registration successful!</p>" ;
                                        
                                    } else {
                                        echo "Registration failed!";
                                    }
                                }
                                ?>
                                <div class="pt-2 pb-1">
                                    <input type="text" name="username" required placeholder="Username" class="form-control rounded-3">
                                </div>
                                <div class="pt-2 pb-1">
                                    <input type="password" name="password" required placeholder="Password" class="form-control rounded-3">
                                </div>
                                <div class="text-center py-2">
                                    <button type="submit" class="btn btn-success fw-bold w-100 rounded-3 py-2 mb-1">Register</button>
                                    <p>Already have an account? <a href="login.php">Log in</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

