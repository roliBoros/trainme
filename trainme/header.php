<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      <style>
      
          .container {
              
              text-align: center;
              width: 400px;
          }
          
          #homePageContainer {
              
              margin-top: 150px;
          }
          
          html { 
              background:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)), url(workout.jpg) no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
            }
          
          body {
              
              background: none;
              color: white;
              font-family: sans-serif;
          }
          
          #logIn {
              
              display: none;
          }
          
          .toggleForms {
              
              
          }
          
          #diary {
              
              width: 100%;
              height: 90%;
          }
          
          #logout {
              
          }
          
          #map {
              
              width:100%;
              height: 100%;
          }
          
           .selector {
              display: flex;
               width: 400px;
               margin: 0 auto;
               margin-top: 40vh;
          }
          
          #trainer {
              color: #5CB85C;
              flex:1;
          }
          
          #trainee {
              color: #2196F3;
              flex:1;
          }
          
          .switch-wrapper {
              flex:1;
              text-align: center;
          }
          .wrap-all {
              display: flex;
              flex-direction: column;
              
          }
          
          #btn-go {
              width: 100px;
              margin-top: 40px;
              color:grey;
              font-weight: bolder;
          }
          
         
          
          
          
          /* The switch - the box around the slider */
    .switch {
      position: relative;
      display: inline-block;
      width: 90px;
      height: 34px;
    
    }

    /* Hide default HTML checkbox */
    .switch input {display:none;}

    /* The slider */
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #5CB85C;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(57px);
      -ms-transform: translateX(57px);
      transform: translateX(57px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
          
      </style>
      
  </head>
    
<html>
<body>    