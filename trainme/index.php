<?php

session_start();

include("connection.php");

$errorMessage = "";

if (array_key_exists("logout", $_GET)) {

    $_SESSION = array();
    setcookie("id", "", time() - 60*60);
    unset($_COOKIE['id']);
    session_destroy();

} else if (!empty($_SESSION['id']) OR userIdFromCookie()) {

    header("Location: select_user_type.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $stayLoggedIn = ($_POST['stayLoggedIn'] ?? '') == '1';

    if ($email == "") {

        $errorMessage .= "Email field is required<br>";

    } else if ($password == "") {

        $errorMessage .= "Password field is required<br>";

    } else {

        if (($_POST['signUp'] ?? '') == '1') {

            $statement = $link->prepare("SELECT id FROM users WHERE email = ?");
            $statement->execute(array($email));

            if ($statement->fetch()) {

                $errorMessage .= "An account with this email already exists<br>";

            } else {

                $statement = $link->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
                $statement->execute(array($email, password_hash($password, PASSWORD_DEFAULT)));

                $userId = (int)$link->lastInsertId();

                $_SESSION['id'] = $userId;

                if ($stayLoggedIn) {

                    setcookie("id", signUserId($userId), time() + 60*60*24*365);
                }

                header("Location: select_user_type.php");
                exit;
            }

        } else {

            $statement = $link->prepare("SELECT * FROM users WHERE email = ?");
            $statement->execute(array($email));

            $row = $statement->fetch();

            if ($row AND password_verify($password, $row['password'])) {

                $_SESSION['id'] = (int)$row['id'];

                if ($stayLoggedIn) {

                    setcookie("id", signUserId($row['id']), time() + 60*60*24*365);
                }

                header("Location: select_user_type.php");
                exit;

            } else {

                $errorMessage .= "That email/password combination could not be found<br>";
            }
        }
    }

    if ($errorMessage != "") {

        $errorMessage = "There were some error(s) in the form:<br>".$errorMessage;
    }

}


?>

    <?php include("header.php"); ?>


      <div class="container" id="homePageContainer">
        <h1>Trainme App</h1>

          <p class="lead"><strong>Find a trainer close to you and work out</strong></p>

          <div class="error"><?php echo $errorMessage; ?></div>

        <form method="post" id="signUp">
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Your email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Your password">
            </div>

            <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" name="stayLoggedIn" value="1" class="form-check-input">
                  Stay logged in
                </label>
            </div>
            <div class="form-group">
                <input type="hidden" name="signUp" value="1">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Sign up">
            </div>
            <p><a class="toggleForms">Log In</a></p>

        </form>

        <form method="post" id="logIn">
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Your email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Your password">
            </div>
            <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" name="stayLoggedIn" value="1" class="form-check-input">
                  Stay logged in
                </label>
            </div>
            <div class="form-group">
                <input type="hidden" name="signUp" value="0">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Log in">
            </div>

            <p><a class="toggleForms">Sign Up</a></p>
        </form>

      </div>

   <?php include("footer.php"); ?>


