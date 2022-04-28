<?php

include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $sql="insert into `users` (name,email,mobile,password)
    values('$name','$email','$mobile','$password')";

    $result=mysqli_query($con,$sql);
    if($result){
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>crud operation</title>
  </head>
  <body>
   <div class="container my-5">
   <form method="post">
  <div class="form-group my-3">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control my-2" id=""  placeholder="Enter name">
    
  </div>
  <div class="form-group my-3">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control my-2" id=""  placeholder="Enter email">
    
  </div>
  <div class="form-group my-3">
    <label for="name">Mobile</label>
    <input type="text"  name="mobile" class="form-control my-2" id=""  placeholder="Enter mobile number">
    
  </div>
  <div class="form-group my-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control my-2" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
   </div>

   
  </body>
</html>