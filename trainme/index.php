<?php

session_start();

$errorMessage = "";

if (array_key_exists("logout", $_GET)) {
    
    unset($_SESSION);
    setcookie("id", "", time() - 60*60);
    $_COOKIE['id'] = "";
    session_destroy();
    
} else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])) {
    
    header("Location: select_user_type.php");
}

if(array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)) {
    
    include("connection.php"); 

    
    if($_POST['email'] == ""){
        
        $errorMessage .= "   Email field is required<br>";
        
    } else if ($_POST['password'] == "") {
        
       $errorMessage .= "   Password field is required<br>";
        
    } else {
        
        if ($_POST['signUp'] == 1){
        
        $query = "SELECT 'id' FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
        
        $result = mysqli_query($link, $query);
        
        if(mysqli_num_rows($result) > 0){
            
            echo "this email is already exist";
            
        } else {
            
            $user = $_SESSION['email'];
            
            $email = $_POST['email'];
                
            $password = $_POST['password'];
            
           $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $email)."', '".mysqli_real_escape_string($link, $password)."')";
            
            mysqli_query($link, $query);
                
            $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";
                
            mysqli_query($link, $query);
                
               $_SESSION['id'] = mysqli_insert_id($link);
            
                if($_POST['stayLoggedIn'] == 1) {
                    
                    setcookie("id", mysqli_insert_id($link), time() + 60*60*24*365);
                }
            
                header("Location: select_user_type.php");
                
            } 
            
        } else {
            
            $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_array($result);
            
            if (isset($row)) {
                
                $hashedPassword = md5(md5($row['id']).$_POST['password']);
                
                if ($hashedPassword == $row['password']) {
                    
                    $_SESSION['id'] = $row['id'];
                    
                    if ($_POST['stayLoggedIn'] == 1) {
                        
                        setcookie("id", $row['id'], time() + 60*60*24*365);
                    }
                    
                    header("Location: select_user_type.php");
                } else {
                    
                    
                }
            } else {
                
                $errorMessage = "That email/password combination could not be found";
            }
        }
        
    if($errorMessage != ""){
        
        $errorMessage = "There were some error(s) in the form:<br>".$errorMessage;
    }
    
    
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
            
            <p><a class="toggleForms">Sign In</a></p>
        </form>    
          
      </div>
    
   <?php include("footer.php"); ?>
      
 