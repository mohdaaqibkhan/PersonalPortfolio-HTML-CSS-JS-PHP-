
<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}

?>

<?php
// insert query

// $insert= false; 

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "aaqibportfolio";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome-<?php echo $_SESSION['username']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <?php
    require 'partials/_nav.php'
    ?>
    <div class="container">
    <h4 class="text-center m-4">All form Data</h4>

    
    <table id="tbl" class="table bg mt-5">
            <thead>
                <tr >
                    <th scope="col">S.No. </th>
                    <th scope="col">Name </th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Concern</th>

                </tr>
            </thead>

            <tbody>
                <?php
                        $sql = "SELECT * FROM `formdata`";
                        $result = mysqli_query($conn, $sql);

                    // fetching data
                        $sno=0;
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $sno = $sno+1;
                            echo "<tr>
                            <th scope='row' >". $sno ."</th>
                            <td>". $row['name'] ."</td>
                            <td>". $row['email'] ."</td>
                            <td>". $row['number'] ."</td>
                            <td>". $row['date'] ."</td>
                            <td>". $row['urself'] ."</td>
                        </tr>";
                            }
                            
                            
                    ?>
            </tbody>
        </table>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>