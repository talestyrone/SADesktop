<?php
    session_start();
?>

<?php
    if (!isset($_SESSION['username']))
    {
        echo "<script>window.location.href='index.php';alert('You need to be logged in to submit a post.');</script>";
    }
?>

<?php
	if (isset($_POST['submit'])) 
    {
        $userId = $_SESSION['userId'];
        $username = $_SESSION['username'];
        $title = $_POST['title'];
        $contents = $_POST['contents'];
        $category = $_POST['category'];
        
        //Connect to db.
        $conn = mysqli_connect('localhost', 'root','','studentsassistance','3306') or die ('Cannot connect to DB');
        $query = "INSERT INTO threads (userId, username, title, contents, categoryId) VALUES ('$userId', '$username', '$title','$contents','$category');";
        
        if(mysqli_query($conn, $query)) 
        { 
           if (mysqli_affected_rows($conn) == 1)
           {
               echo "<script>alert('Your thread has been submitted.');</script>";
           }

	      else
	      {
              echo "<script>alert('Your thread has not been submitted.');</script>";
	      }
        }
       else
       {
         echo "Error: ".mysqli_error($conn);
       }
    }
?>

<!DOCTYPE html>
<html>
<title>Submit!</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="icon" href="images/favicon.ico">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 1000) {
          val.value = val.value.substring(0, 1000);
        } else {
          $('#charNum').text(999 - len);
        }
      };
    </script>
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
  <a href="#band" class="w3-bar-item w3-button w3-padding-large">Home</a>
  <a href="#tour" class="w3-bar-item w3-button w3-padding-large">Submit</a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large">Contact Us</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Placeholder</a>
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
        }
    ?>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px"><h4 class="w3-wide">
        
        <?php
            echo "Welcome, $_SESSION[username]";
        ?>
        
      </h4>

  <!-- The Band Section -->
  
  </div>

<!-- Chatbox Section -->
<div class="login-form" style="text-align: center; padding-left: 30%; padding-right: 30%;">
    <form action="submit.php" method="post">
		<h2>Submit a thread.</h2>
		<p>Fill in these fields and submit your thread for others to see.</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" name="title" placeholder="Title" required="required" id="title">
			</div>
        </div>
        
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-archive">
            <div id="charNum">1000</div></i></span>
                <textarea type="text" rows="3" maxlength="1000" id="contents" class="form-control" name="contents" placeholder="Contents" required="required" onkeydown="countChar(this)"></textarea>
                
			</div>
        </div>
        
        
        
        <div class="form-group">
			<div class="input-group">
			    
				<select id="category" name="category">
                <?php
                    $conn = mysqli_connect('localhost', 'root','','studentsassistance','3306') or die ('Cannot connect to DB');
                    $query = "SELECT * FROM categories";

                        $result = $conn->query($query);
                        while ($row = $result->fetch_assoc()) 
                        {
                            unset($categoryId, $categoryName);
                            $categoryId = $row['categoryId'];
                            $categoryName = $row['categoryName']; 
                            echo '<option value="'.$categoryId.'">'.$categoryName.'</option>';
                        }
                ?> 
                </select>
			</div>
        </div>
		<div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>&emsp;
	    <button type="logout" name="logout" class="btn btn-primary btn-lg" onclick="">Cancel</button>
        </div>
    </form>
</div>
<!-- End Page Content -->


<script>
</script>

</body>
</html>