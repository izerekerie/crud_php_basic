<?php
  include 'connect.php';
  if(isset($_POST['search'])){

    $term=$_POST['searchterm'];
    $sql = mysqli_query($connect, "SELECT * FROM users WHERE name LIKE '%$term' ");
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operation</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <form method="post" class="container">
      
    <div class="row">
    <div class="col-10 my-3">
        <div class="input-group my-2">
       

           <input type="text" name= "searchterm" class="form-control">
           <div class="input-group-prepend">
                <span class="input-group-text  bg-light">
                <a href="search.php">
                <i class="text-primary fa-solid fa-magnifying-glass"></i>
                </a>

            </span>
            </div>
        </div>
    </div>
    <div class="col-2 my-4">
   
    <button class="btn btn-primary my-5" class="">
        <a href="user.php" class="text-light">Add user</a>  
        </button>
        
    </div>
</div>
     
     
          


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
    </form>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>