<?php
  $login =false;
  $showError =false;

if($_SERVER["REQUEST_METHOD"]=="POST"){

  
  include 'partials/_dbconnect.php';

  $username = $_POST["username"];
  $password = $_POST["password"];

  
  
      $sql = "SELECT * FROM users WHERE username ='$username' AND password = '$password' ";

      $result=mysqli_query($connect, $sql);
      $num = mysqli_num_rows($result);
      if($num==1){
        $login=true;

        session_start();
        $_SESSION['loggedin']= true;
        $_SESSION['username']= $username;
        header("location: welcome.php");
      }
      else{
        $showError="invalid login id";
      }
}
  ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LogIn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    

    
    <?php
    require 'partials/_nav.php'
    ?>

<div class="container my-5 ">
<?php
if($login){

  echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>you are logged in.
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


    <div class="container  my-2 ">
        <h2 class="text-center ">Welcome</h2>
        <h2 class="text-center ">Mohd Aaqib Khan</h2>

        <form action="/myportfolio/adminlogin/login.php"  method = "post" class="form-horizontal my-5" role="form" align="center">
        <div class="form-group" align="center">
            <div class="mb-3 col-md-4 ">
                <label for="username" class="form-label"><h5>Username</h5></label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3 col-md-4">
                <label for="password" class="form-label"><h5>Password</h5></label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            
           
            <button type="submit" class=" col-md-4 btn btn-primary">logIn</button>
         </div> 
        </form>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </div>
  </body>
</html>