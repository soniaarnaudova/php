<?php 
 if($_FILES['file']['name'] != null){
     copy($_FILES['file']['tmp_name'],$_FILES['file']['name'])
      or die("The file cannot be copied!");
 }
     else{
         die("No file is chosen.");
     }
?>
<html>
<head><title>The file is downloaded successfully</title></head>
    
    <body>
        <fieldset><legend>The file is downloaded successfully!</legend>
   <br>
            Name:<?php echo $_FILES['file']['name']; ?><br>
            Size:<?php echo $_FILES['file']['size']; ?>Bytes<br>
            Type:<?php echo $_FILES['file']['type']; ?><br>
        <a href="<?php echo $_FILES['file']['name']; ?>">Click here to see the file</a>
      </fieldset>      
    </body>
</html>