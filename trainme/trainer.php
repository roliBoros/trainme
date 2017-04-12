<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      
      <style>
          
          body{
              font-family: sans-serif;
          }
          
          #hr{
              margin: 0 auto;
              width: 130px;
          }
      </style>
      
    <body>  

    
      <div class="container">
          <h2 class="profileSettings text-center">Profile settings</h2>
          <div id="hr"><hr></div>
        <form>
          <div class="form-group">
            <label for="name">Username</label>
            <input type="text" class="form-control" id="name" placeholder="Your username">
          </div>

          <div class="form-group">
            <label for="gender">Choose your gender</label>
            <select class="form-control" id="gender">
                <option></option> 
                <option>Male</option>
                <option>Female</option>
            </select>
          </div>
           <div class="form-group">
            <label for="age">Your Age</label>
            <input type="number" class="form-control" id="age" placeholder="Your age">
          </div>
          <div class="form-group">
            <label for="workoutStyles">Workout styles, sports, skills (list as many as you want)</label>
            <textarea class="form-control" id="workoutStyles" rows="4"></textarea>
          </div>
          <div class="form-group">
            <label for="profilePic">Profile picture</label>
            <input type="file" class="form-control-file" id="profilePic">
            <small id="fileHelp" class="form-text text-muted">maximum file size is 2Mb</small>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    

<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
      
     
      
</body>
</html>      
 

