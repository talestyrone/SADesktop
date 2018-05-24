<?php
    session_start();
?>
<?php
    if (!isset($_SESSION['username']))
    {
        echo "<script>window.location.href='index.php';alert('You need to be logged in to submit a post.');</script>";
    }
    else
    {
        $username = $_SESSION['username'];
    }
?>

<!DOCTYPE html>
<html>
<title>Contact Us!</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="icon" href="images/favicon.ico">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
    <a href="submit.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Submit</a>
    <a href="contact.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Contact Us</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Threads</a>
    <?php
      if (isset($_SESSION['username']))
        {
            $name = $_SESSION['username'];
            echo '<a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Logout</a>';
        }     
        else
        {
            $name = 'Guest';
            echo '<a href="signup.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Sign Up</a>';
            echo '<a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Login</a>';
        }
    ?>
      
    <a href="https://www.facebook.com/StudentsAssistance-2112653759020445/?modal=admin_todo_tour"><i class="fa fa-facebook-official w3-hover-opacity w3-xlarge w3-padding-large"></i></a>
  </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="#band" class="w3-bar-item w3-button w3-padding-large">Home</a>
  <a href="#tour" class="w3-bar-item w3-button w3-padding-large">Submit</a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large">Contact Us</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Placeholder</a>
    <a href="signup.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Sign Up</a>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">
  <!-- The Contact Section --><h4 class="w3-wide">
        
        <?php
            echo "Welcome, $_SESSION[username]";
        ?>
        
      </h4>
    </div>
    
    <div class="login-form" style="text-align: center; padding-left: 30%; padding-right: 30%;">
    <form action="sendmail.php" method="post">
		<h2>Contact us via e-mail!</h2>
		<hr>
        <i>Email:  </i>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user">
            </i></span>
                <input type="text" rows="1" maxlength="1000" id="email" class="form-control" name="email" placeholder="Email" required="required" onkeydown="countChar(this)">
                
			</div>
        </div>
        
        <i>Password:  </i>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock">
            </i></span>
                <input type="password" rows="1" maxlength="1000" id="password" class="form-control" name="password" placeholder="Password" required="required" onkeydown="countChar(this)">
                
			</div>
        </div>
        
        <i>Subject  </i>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user">
            </i></span>
                <input type="text" rows="1" maxlength="1000" id="subject" class="form-control" name="subject" placeholder="Subject" required="required" onkeydown="countChar(this)">
                
			</div>
        </div>
        
        <i>Contents:  </i>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-archive">
            </i></span>
                <textarea type="text" rows="3" maxlength="1000" id="comments" class="form-control" name="comments" placeholder="Comments" required="required" onkeydown="countChar(this)"></textarea>
                
			</div>
        </div>
        
		<div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-lg">Send</button>&emsp;
	    <button type="logout" name="logout" class="btn btn-primary btn-lg" onclick="">Cancel</button>
        </div>
    </form>
</div>
    
    
<!-- End Page Content -->
</body>
</html>