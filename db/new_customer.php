<html><head><title>New Customer</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.js'></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/sunny/jquery-ui.css">
</head>
<?php
    $error="";
    $message="";
    include("dbConfig.php");
    session_start();
    
if(isset($_POST['submit']) && ($_POST['submit'] != '')){
  	//Sign Up
  if($_POST['submit']=="Sign Up") {
  
			if(!$_POST['email']) $error.="<br />Please enter your email";
				else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error.="<br />Please enter a valid email"; 
 		
 		
 		if(!$_POST['password']) {
            $error.="<br />Please enter your password";
        }
 		else { 
  
            if(strlen($_POST['password'])<8) $error.="<br />Please enter at least 8 characters";
 
 			if(!preg_match('/[A-Z]/', $_POST['password'])) $error.= "<br />Please include min 1 capital letter";
 		}
			if($error) $error = "There were error(s) in your sign up details:".$error;
			
			else {
                
			$query= "SELECT * FROM users WHERE email ='".mysqli_real_escape_string($db, $_POST['email'])."'";
			
			$result = mysqli_query($db, $query);	
			
			$results = mysqli_num_rows($result);
			
			if($results) $error = "That email is already registered. Do you want to log in?";
			
			else {
			
			$query = "INSERT INTO users (name,email, password,phone,address) VALUES ('".$_POST['name']."','".mysqli_real_escape_string($db, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."','".$_POST['phone']."','".$_POST['address']."')";   
            
    		mysqli_query($db, $query);

    		$_SESSION['id']= mysqli_insert_id($db);
            
    		$_SESSION['sessCustomerID']=$_SESSION['id'];
            $message = "Hi,".$_POST['name'].".";
            $_SESSION['message']=$message;
    		header("Location:index.php");
			
			}	
			
		}
   
	}
    //Log In
    if($_POST['submit'] == "Log In") {	
        
		$query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($db, $_POST['loginemail'])."' AND password='" .md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1";
        
        $result = mysqli_query($db, $query);
		
		$row = mysqli_fetch_array($result);
		
		if($row){
		
			$_SESSION['id']=$row['id'];
            $message = "Hi,".$row['name'].".";
            $_SESSION['message']=$message;
            if($row['name']=="admin"){
               $_SESSION['admin']=$row['name'];
                header("Location:addProducts.php"); 
            }else{
                 header("Location:index.php");
            }
           
           
	     } else {
		    $error = "We could not find a user with that email and password. Please try again.";
         }
	
	}
}
 ?>
 			 
 	<body>	
         <?php
 			 
 			 	if($error) {
 			 	
 			 		echo "<div class='alert alert-danger'>".addslashes($error)."</div>";
 			 	
 			 	}
 			 	
 			 	if($message) {
					echo "<div class='alert alert-success'>".addslashes($message)."</div>";
 			 	
 			 	}
 			 
 			 ?>
       <div id="contacts" class="container-fluid" style="padding:50px;background-color:#f0f7f4;width: 50%;height: 600px; ">
      
       <h3 align="center" style="color:black;">Customer's Form</h3>
           
         <form class="marginTop" method="post"> 
                 <div class="form-group">
 			 	
  					<label for="name">Your Name</label>
  					
  				<input type="text" name="name" class="form-control" placeholder="Your Name"  />
  																							   
				</div>
 			 
 			 	<div class="form-group">
 			 	
  					<label for="email">Email Address</label>
  					
  				<input type="email" name="email" class="form-control" placeholder="Your Email"  />
  																							   
				</div>
				
				<div class="form-group">
 			 	
  					<label for="password">Password</label>
  					
  				<input type="password" name="password" class="form-control" placeholder="Password" />
  																								  
				</div>
                 <div class="form-group">
 			 	
  					<label for="address">Your Address</label>
  					
  				<input type="text" name="address" class="form-control" placeholder="Your Address"  />
  																							   
				</div>
                 <div class="form-group">
 			 	
  					<label for="phone">Your Phone</label>
  					
  				<input type="text" name="phone" class="form-control" placeholder="Your Phone"  />
  		        </div>

 			 	<input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg marginTop"/> 
                 <input type="submit" name="submit" value="Log In" class="btn btn-success btn-lg marginTop"/> 
 			 	
 			 </form>
            </div>
    </body>
</html>		 