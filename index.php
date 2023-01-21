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
    <title>Read DataBase</title>
    <link rel="stylesheet" type="text/css" href="style.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Welcome <?php echo $user['name']; ?> </h1>
        <h2 class="page-header text-center"> PHP JSON FILE CRUD</h2>
        <div class="row">
            <div class="col-12">
                
                <table class="table table-bordered ">
                    <th>Login</th>
                    <th>Password</th>
                    <th>Confirm_Password</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Action</th>
                    <tbody>
                        <?php
                        
                        $table_data = new CRUD();
                        $table_data->read_data();
                        ?> 
                    </tbody>
                </table>

            </div>
        </div>
        <a href="home.php">back</a>
        <a href="logout.php">logout</a>
    </div>
    

</body>
</html>