

<!DOCTYPE html>
<html>
<head>
    <title>Books - Delete books</title>
</head>
<body>
    <?php
    session_start();
?>
<?php
     #connecting to db
    $conn = mysqli_connect('localhost', 'root', '', 'studentsassistance', '3306') 
        or die('Cannot connect to db');
    $threadId = $_GET['threadId'];
    $userId = $_SESSION['userId'];
    $query = "INSERT INTO reports (threadId, userId) VALUES ('$threadId','$userId');";
    mysqli_query($conn, $query) or die ('Error in query');
    echo "<script>window.location.href='threads.php';alert('Thank you for reporting this thread, we will now review it..');</script>";
?>
</body>
</html>