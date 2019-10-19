 <?php 
      $f_name = "new_file.txt";
      $file = fopen($f_name,"a");
      $text = "Hi! I am writing to a file.\n";
      fwrite($file,$text);
      fclose($file);  
      ?>
<html>
    <head><title>Write to a file</title></head>
  <body>
      
      <?php 
      
        $f_size = filesize($f_name);
           echo("File $f_name is $f_size bytes");
       
      ?>
      
  </body>

</html>