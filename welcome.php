<?php 
include('dbcon.php');

require __DIR__ .'/vendor/autoload.php';
$client = new Google\Client;

$client->setCLientId("175815025217-nisclrqlgnrj1q3jbnr110ink9s1svaf.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://localhost/loginRegister-OOP/welcome.php");

if (!isset($_GET["code"])) {
    exit("Google Login Failed");
}

$token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);

$client->setAccessToken($token['access_token']);

$oauth = new Google\Service\Oauth2($client);

$userinfo = $oauth->userinfo->get();

$user_email = $userinfo->email;
$user_name = $userinfo->givenName;
$user_lastname = $userinfo->familyName;
$user_pic = $userinfo->picture;
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
            <div class="container-fluid bg-dark text-light">
                <h4 class="py-3 text-center">GOOGLE API</h4>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="container my-5">
                    <div class="container text-center"><h2>Welcome</h2></div>
                    <div class="container text-center">
                        <img src="<?=$user_pic?>" alt="" class="rounded-circle my-3" style="width: 200px;">
                    </div>
                    <div class="container text-center">
                        <h3><?=$user_name, " ". $user_lastname ?></h3>
                        <h4><?=$user_email?></h4>
                    </div>
                </div>
            </div>
        <?php

        session_start();

        if (isset($_SESSION['username'])) {
            echo 'Welcome ' .$_SESSION['username'];
            echo "<form action='logout.php' method='post'>
                    <input type='submit' value='logout'>
                    </form>";
        }

        ?>
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
