<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin=true;
}
else{
  $loggedin=false;
}
echo'<nav class=" navbar navbar-expand-lg bg-white">
  <div class="container-fluid">
    <a class="navbar-brand " href="/myportfolio/adminlogin/welcome.php"><h3>Admin Panel</h3></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul  class="navbar-nav me-auto mb-2 mb-lg-0 mx-5  text-center ">
        <li class="nav-item mx-5">
          <a class="nav-link" aria-current="page" href="/myportfolio/adminlogin/welcome.php"><h4>Home</h4></a>
        </li>';
        if(!$loggedin){
        echo '<li class="nav-item">
          <a class="nav-link mx-5" href="/myportfolio/adminlogin/login.php"><h4>LogIn</h4></a>
        </li>
          <!-- <li class="nav-item">
              <a class="nav-link mx-5" href="/myportfolio/adminlogin/signup.php"><h4>SignUp</h4></a>
          </li> -->
        ';}
        if($loggedin){
        echo '<li class="nav-item mx-5">
          <a class="nav-link" href="/myportfolio/adminlogin/logout.php"><h4>LogOut</h4></a>
        </li>';}
        
      echo '
        </ul>
      
    </div>
  </div>
</nav>';
?>