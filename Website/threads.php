<?php
    session_start();
?>

<?php
    #connecting to db
    $conn = mysqli_connect('localhost', 'root', '', 'studentsassistance', '3306') 
        or die('Cannot connect to db');
    $query = "select * from threads";
    $result =mysqli_query($conn, $query) or die ("Error in query" . mysqli_error($conn));
?>



<?php
    if (!isset($_SESSION['username']))
    {
        $name = 'Guest';
    }     
    else
    {
        $name = $_SESSION['username'];
    }
?>

<!DOCTYPE html>
<html>
<title>Home!</title>
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
  <a href="#band" class="w3-bar-item w3-button w3-padding-large">Home</a>
  <a href="#tour" class="w3-bar-item w3-button w3-padding-large">Submit</a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large">Contact Us</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Threads</a>
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
            echo "Welcome, $name";
        ?>
        
      </h4>
<div style='text-align: center;'>
  <!-- The Band Section -->
  
<?php
    while($row = mysqli_fetch_assoc($result)) 
    {
        echo "<span class='input-group-addon'>$row[username]|$row[title]</span>";
        echo "<p>Contents: $row[contents]</p>" ;
        echo "<button type='button' name='report'><a href='http://localhost/NEW/reportthread.php?threadId=$row[threadId]'>Report</a></button>"; 
        echo "<hr>";
    }              
?>
    </div>
  </div>
<!-- End Page Content -->


<script>
</script>

</body>
</html>

