
<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql=" select *from `users` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];
$old_filename=$row['filename'];

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $filename=$_FILES['profile']['name'];
    $temp_name=$_FILES['profile']['tmp_name'];
    $sql="update `users` set id=$id,name='$name',
    email='$email',mobile='$mobile',password='$password',filename='$filename' where id=$id ";
    $result=mysqli_query($con,$sql);
    // unlink('uploads/'.$old_filename);
    if(move_uploaded_file($temp_name,'uploads/'.$filename)){
      if($result){
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
    }else{
      $msg = "Failed to upload image";
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
   <form method="post" enctype="multipart/form-data">
  <div class="form-group my-3">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control my-2" id="" placeholder="Enter name"
    value=<?php  echo $name ?>
    >
    
  </div>
  <div class="form-group my-3">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control my-2" id=""  placeholder="Enter email"
    value=<?php  echo $email ?>
    >
   
  </div>
  <div class="form-group my-3">
    <label for="name">Mobile</label>
    <input type="text"  name="mobile" class="form-control my-2" id=""  placeholder="Enter mobile number"
    value=<?php  echo $mobile ?>
    >
  
  </div>
  <div class="form-group my-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control my-2" id="exampleInputPassword1" placeholder="Password"
    value=<?php  echo $password ?> 
    >
     
</div>
<div class="form-group my-3">
    <label for="exampleInputPassword1">picture</label>
    <input type="file" name="profile" class="form-control my-2" accept="image/*">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
   </div>

   
  </body>
</html>