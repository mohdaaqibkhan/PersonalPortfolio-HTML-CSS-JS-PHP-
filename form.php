<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $number = $_POST['number'];
    // $gender = $_POST['gender'];
    $urself = $_POST['urself'];
    
  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "aaqibPortfolio";

    
    $connection = mysqli_connect($servername, $username, $password, $database);

    if (!$connection){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{
        // echo "Connection was successful<br>";
     

        $sql = "INSERT INTO `formdata` (`name`, `email`, `date`, `number`,  `urself`) VALUES ('$name', '$email', '$date', '$number', '$urself')";

        // for check data insert or not

        $result = mysqli_query($connection, $sql);
        
        if($result)
        {
            header("location: contact.html");
        }
        else{
            // echo "the data is not inserted because of this error---->". mysqli_error($conn);
            echo "we are facing some technical issue so your entry was not submitted successfuly!! we regret the inconvinience caused!!";
        }
    }

}

?>