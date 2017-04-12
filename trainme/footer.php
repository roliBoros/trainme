 <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
      
      <script>
        jQuery(document).ready(function ()
    {  
      
            $(".toggleForms").click(function(){

                $("#signUp").toggle();
                $("#logIn").toggle();

            });

            $("#select-checkbox").change(checkboxChanged);

            function checkboxChanged(){
                radioPos = $('#select-checkbox').prop('checked');
                
                $("#btn-go").css("color", "#FFF");

                if(radioPos){
                   $("#btn-go").css("background-color", "#2196F3");
                } else {
                    $("#btn-go").css("background-color", "#5CB85C");
                }
            }  


            $("#btn-go").click(function(){
               if($('#select-checkbox').prop('checked')){
                   window.open("trainee.php","_self");
               } else {
                   window.open("trainer.php","_self");
               }

            });
        });
          
        </script>
          
      
</body>
</html>      
 

