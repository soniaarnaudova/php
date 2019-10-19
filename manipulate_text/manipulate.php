<html>
 <head>
    <title>Result</title>
    </head>
    <body>
      <?php 
        $function = $_POST['function'];
        $text = $_POST['text'];
        echo( $function($text));
     ?>    
    </body>
</html>