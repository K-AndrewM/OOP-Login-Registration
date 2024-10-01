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
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <form method="POST">
                <div class="container w-25 my-5 border rounded-3 py-3">
                    <h2 class="text-center fw-bold">REHISTRO</h2>
                    <input type="text" name="username" required placeholder="Username" class="form-control w-100 py-2 my-3 rounded-5 mx-auto">
                    <input type="password" name="password" required placeholder="Password" class="form-control w-100 py-2 my-3 rounded-5 mx-auto">
                    <div class="text-center py-2">
                        <button type="submit" class="btn btn-success w-100 fw-bold fs-4 py-1 rounded-5">Register</button>
                        <p>Already have an account? <a href="login.php">Click here</a></p>
                        <?php
                        
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                        
                            $user = new User();
                            if ($user->register($username, $password)) {
                                echo "Registration successful!";
                            } else {
                                echo "Registration failed!";
                            }
                        }
                        ?>
                    </div>
                </div>
            </form>
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

