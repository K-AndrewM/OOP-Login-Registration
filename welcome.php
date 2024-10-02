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
$user_gender = $userinfo->gender;

echo "Welcome, " .$user_name;

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
