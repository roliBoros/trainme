<?php

session_start();

include("connection.php");

if (empty($_SESSION['id']) AND userIdFromCookie()) {

    $_SESSION['id'] = userIdFromCookie();
}

if (empty($_SESSION['id'])) {

    header("Location: index.php");
    exit;
}

    include("header.php");

?>

    <p>Logged in! <a href="index.php?logout=1">Log out</a></p>

    <div class="container">
        <div class="selector">
            <h3 id="trainer">Trainer</h3>
                <div class="wrap-all">
                    <div class="switch-wrapper">
                        <label class="switch">
                          <input id="select-checkbox" type="checkbox" checked>
                          <div class="slider round"></div>
                        </label>
                    </div>
                    <button class="btn btn-secondary" id="btn-go" name="btn-go" type="submit" value="0">Go</button>
                </div>
            <h3 id="trainee">Trainee</h3>
        </div>

    </div>



<?php

    include("footer.php");

?>
