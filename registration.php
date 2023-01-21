<?php
require 'function.php';

if(isset($_POST['login'])){
    
    $login =  $_POST['login'] ;
    $password =$_POST['p1'] ;
    $confirm_password=$_POST['p2'];
    $email= $_POST['email'];
    $name = $_POST['name'];
    
    $register = new Register();
    $result= $register->registration($login,$password,$confirm_password,$email,$name);
    header('Content-Type: application/json');
    echo json_encode(array('text' => $result));
    
}   
?>

