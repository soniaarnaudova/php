<html>
<head><title></title></head>
<body>
<?php
include("dbConfig.php");
      session_start();
    
    //query
     echo("<b>Customer\'s info:<b>");
     echo('
        <table class="table" border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Newsletter</th>
          </tr>
         </thead>');
          $query = "SELECT * FROM users;";

           $results = mysqli_query($db, $query);
          if ($results) {
          while ($item = $results->fetch_assoc()) {
              $id = $item["id"];
              $name = $item["name"];
              $address = $item["address"];
              $phone = $item["phone"];
              $email = $item["email"];
              $newsletter = $item["newsletter"];



              echo('<tbody>
                 <tr>
                      <td><input type="text" readonly name="c_id" size="3" value="'.$id.'"/></td>
                      <td>'.$name.'</td>
                      <td>'.$address.'</td>
                      <td>'.$phone.'</td>
                      <td>'.$email.'</td>');
                      if($newsletter==1){
                         echo('<td>Yes</td>');
                      }else{
                         echo('<td>No</td>');
                       }
                 echo('</tr>
               </tbody>');

          }
        }
      ?>
    </body>
</html>
