<html lan="bg">
<head>
    <title>Manipulate text</title>
    </head>
<body>
    <form action="manipulate.php" method="post">
        <fieldset style="width=50px;">
            <legend>Please enter some text:</legend>
          <textarea rows="4" cols="50" name="text"></textarea><br />
          <input type="radio" name="function" value="str_shuffle">
          Random shuffle the characters of the strings<br>
          <input type="radio" name="function" value="strrev">
          Reverse text<br>
          <input type="radio" name="function" value="ucwords">
          First letter of each word becomes capital letter<br><hr>
        
          <input type="submit" value="Result">
            
        </fieldset> 
    </form>
    
    </body>



</html>