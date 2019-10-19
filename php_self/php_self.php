
<?php 

header("Cache-Control:nocache");
global $num;

if(isset($_POST['num']) and (isset($_POST['try']))){
          
          $num = $_POST['num'];
        
          $try = $_POST['try'];
        
          $self = $_SERVER['PHP_SELF'];    
         
    if($num !=null and !is_numeric($try)){
               $message = "Your try is bad!<b>Try again!</b>"; 
           }
           else if($try == $num){
               if($num != null){
               $message = "You answer is right!- Number is $num<br>";
                   $message .="<b><a href= \"$self\">";
                   $message .="Click here for new try</a></b>";
                   
               }
             
           } else if($try > $num){
                     $message = "Your try is $try. <h3>My number is smaller: $num</h3>";
           }else if($try < $num){
                    $message = "Your try is $try.<h3>My number is greater: $num</h3>" ; 
           }
            
           
        
        }else{
            if($num == null){
              $message = "I have a number between 1 and 10.";
              $message .= "<b>Guess it!</b>";
            }
        }
         echo($message);

       ?>
    
    <html>
    <head>
        <title>Guess number</title>
    </head>
    <body>
        <fieldset>
         <legend>Guess number</legend>
          <form action="<?php $self ?>" method="post">
             <input type="hidden" name="num" value="<?php echo(rand(1,10)); ?>" >
             Your number:<input type="text" size="5" name="try">
             <input type="submit" value="Click">
          </form>
        </fieldset>
    </body>
    
</html>  
    