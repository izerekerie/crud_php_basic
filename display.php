<?php
  include 'connect.php';

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5" class="">
        <a href="user.php" class="text-light">Add user</a>    
   </button>

   <table class="table">
  <thead>
    <tr>
      <th scope="col">SI no</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
  <?php
$sql=" select  * from `users`";
$result=mysqli_query($con,$sql);
if($result){
  while( $row=mysqli_fetch_assoc($result)){
      $id=$row['id'];
      $name=$row['name'];
      $email=$row['email'];
      $mobile=$row['mobile'];
      $password=$row['password'];

      echo '
      <tr class="my-3">
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$mobile.'</td>
      <td>
      <button class="btn btn-primary my-2 mx-2" class="">
        <a href="update.php?updateid='.$id.'" class="text-light">Update</a>    
   </button>
   <button class="btn btn-danger my-2 mx-2" class="">
        <a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a>    
   </button>
      </td>
    </tr>
      
      ';
  }
}

  ?>
   
    
  </tbody>


</table>
    </div>
</body>
</html>