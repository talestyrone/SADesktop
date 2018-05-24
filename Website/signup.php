<?php
    session_start();
?>

<?php
    
    if (!isset($_SESSION['username']))
    {
        $name = 'Guest';
    }     
    else
    {
        $name = $_SESSION['username'];
        echo "<script>window.location.href='index.php';alert('$name, You are logged in, you do not need to sign up.');</script>";
    }
    
    
	if (isset($_POST['submit'])) 
    {
		$username = $_POST['username'];
		$email = $_POST['email'];        
		$password = $_POST['password'];
        $date = date('Y-m-d H:i:s');
        $banStatus = 0;
		
        //Connect to db
        $conn = mysqli_connect('localhost', 'root','','studentsassistance','3306') or die('Cannot connect to DB');
        
        $safemail = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        $safeuser = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
        if(mysqli_num_rows($safeuser) > 0)
        {
            if (mysqli_num_rows($safemail) > 0)
            {
                $query = "Both username and e-mail already exist.";
                echo "<script type='text/javascript'>alert('$query');</script>";
                header("Refresh:0 url=signup.php");
            }
            else
            {
                $query = "This username already exists.";
                echo "<script type='text/javascript'>alert('$query');</script>";
                header("Refresh:0; url=signup.php");
            }
        }
        
        else
        {
            if (mysqli_num_rows($safemail) > 0)
            {
                $query = "This e-mail already exists.";
                echo "<script type='text/javascript'>alert('$query');</script>";
                header("Refresh:0; url=signup.php");
            }
            
            else
            {
                $query = "insert into users (username,email,password,registerDate,banStatus) values('$username','$email','$password','$date','$banStatus')";
                echo "<script>window.location.href='login.php';alert('You can now login with your registered details.');</script>";
            }
        }
        
        $result = mysqli_query($conn,$query);
        if(mysqli_query($conn, $query)) 
        {            
            echo "<script>window.location.href='login.php';alert('You can now login with your registered details.');</script>";
        }
        else
        {
		}
    }
?>

<!DOCTYPE html>
<html>
<title>Sign Up!</title>
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
    <a href="threads.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Threads</a>
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
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Submit</a>
  <a href="contact.php" class="w3-bar-item w3-button w3-padding-large">Contact Us</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Placeholder</a>
    <a href="signup.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Sign Up</a>
</div>

    <div class="w3-content" style="max-width:2000px;margin-top:46px"><h4 class="w3-wide">
        
        <?php
            echo "Welcome, $name";
        ?>
        
      </h4>
    </div>
    
<!-- Signup Form-->
<div class="signup-form" style="text-align: center; padding-top: 5%; padding-left: 30%; padding-right: 30%;">
    <form method="post" action="signup.php">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" name="username" placeholder="Username" required="required" maxlength="12">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input type="email" class="form-control" name="email" placeholder="Email Address" required="required" maxlength="75">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" class="form-control" name="password" placeholder="Password" required="required" maxlength="20">
			</div>
        </div>
		<div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="login.php">Login here</a></div>
	
</div>
</body>
</html>