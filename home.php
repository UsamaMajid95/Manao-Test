<?php
require 'function.php';

$select = new Select();

if(isset($_SESSION['login1'])){
    
    $user = $select->selectbyid($_SESSION['login1']);
    
}else{
    header("Location:login.html");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    
    <h1>Welcome <?php echo $user['name']; ?> </h1>

    <a href="index.php">Index Page</a><br><br>
    <a href="logout.php">Logout</a>
</body>
</html>