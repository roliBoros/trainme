<?php

session_start();

if (array_key_exists("id", $_COOKIE)) {
    
    $_SESSION['id'] = $_COOKIE['id'];
    
}

if (array_key_exists("id", $_SESSION)) {
    
    echo "<p>Logged in! <a href='index.php?logout=1'>Log out</a></p>";
    
    
   
    
} else {
    
    header("Location: index.php");
}

    include("header.php");

?>

    <div class="container">
        <div class="selector">
            <h3 id="trainer">Trainer</h3>
                <div class="wrap-all">
                    <div class="switch-wrapper">
                        <label class="switch">
                          <input id="select-checkbox" type="checkbox" checked="trainer" value="0">
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

