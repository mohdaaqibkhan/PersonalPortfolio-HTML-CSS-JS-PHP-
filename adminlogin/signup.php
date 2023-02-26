<?php
  $showAlert =false;
  $showError =false;

if($_SERVER["REQUEST_METHOD"]=="POST"){

  
  include 'partials/_dbconnect.php';

  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  // $exists=false;
  //Check Whether this username exist or not
  $existSql="SELECT * FROM `users` WHERE username = '$username'";
  $result= mysqli_query($connect, $existSql);
  $numExistRows=mysqli_num_rows($result);
  if($numExistRows>0){
    // $exists=true;
    $showError="username Already Exists";
  }
  else{
    //$exists=false;

    if(($password==$cpassword)){
        $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ( '$username', '$password', current_timestamp())";

        $result=mysqli_query($connect, $sql);
        if($result){
          $showAlert=true;
        }
    }
    else{
      $showError="Password do not match";
    }
  }
}
  ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <?php
    require 'partials/_nav.php'
    ?>


<?php
if($showAlert){

  echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> your account has been crated you can login now.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  ';
}
if($showError){

  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '. $showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  ';
}
?>


    <div class="container my-4">
        <h2 class="text-center">Signup to our website</h2>

        <form action="/myportfolio/adminlogin/signup.php" method = "post">
            <div class="mb-3 col-md-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3 col-md-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 col-md-4">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <div id="emailHelp" class="form-text">Make sure u entered the same password.</div>
            </div>
           
            <button type="submit" class=" col-md-4 btn btn-primary">SignUp</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>