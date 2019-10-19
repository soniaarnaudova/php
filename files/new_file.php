 <?php 
      $f_name = "new_file.txt";
      $file = fopen($f_name,"w");
      $text = "Hi! I test writing to a file.\n";
      fwrite($file,$text);
      fclose($file);  
      ?>
<html>
    <head><title>Create and write to a file</title></head>
  <body>
      
      <?php 
       if(file_exists($f_name)){
           $f_size = filesize($f_name);
           $message = "New File is created: ".$f_name;
           $message.="<br>Size: $f_size bytes<br>";
           echo($message);
       }else {
           echo("The file is not created.");
       }
      
      ?>
      
  </body>

</html>