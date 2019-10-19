<html>
    <head><title>Read from file</title></head>
  <body>
      
    <?php 
      $f_file = "C:\Users\Sonia\Documents\good food\Продукти за питката.docx";
      $f_size = filesize($f_file);
      $file = fopen($f_file,"r");
      $text = fread($file,$f_size);
      fclose($file);
      echo("Size of is ".$f_size." Bytes<br>");
      echo("$text");      
      ?>
      
  </body>

</html>