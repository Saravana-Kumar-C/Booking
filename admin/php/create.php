<?php

$servername="localhost";
$username="root";
$password="";
$database="mydb";

$connection = new mysqli($servername,$username,$password,$database);

$name="";
$opening="";
$closing="";
$totcount=0;

$errormessage ="";
$successmessage="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $opening = $_POST["opening"];
    $closing = $_POST["closing"];
    $totcount = 0;

    do{
        if(empty($name) || empty($opening) || empty($closing)){
            $errormessage="All the fields are required";
            break;
        }

        $sql = "INSERT INTO centre (name,opening,closing,totcount) VALUES ('$name','$opening','$closing','$totcount')";
        $result = $connection->query($sql);

        if(!$result){
            $errormessage = "Invalid query" . $connection->error;
            break;
        }

        $name="";
        $opening="";
        $closing="";
        $totcount=0;
        $successmessage = "Centre added successfully !!";

        header("location: index.php");
        exit;
    }while(false);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add new centre</title>
    <link rel = "icon" href = "../../img/icon.png" type = "image/x-icon">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 2rem;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background-color: #F8F9FA;
            border: 1px solid #CED4DA;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="../../img/icon.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
        Covid Vaccination Booking</a>
    </div>
    </nav>
    <div class="container">
        <div class="box">
            <h2>Add new vaccination centre</h2>
        <?php 
        if(!empty($errormessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errormessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>X</button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <div class="mb-3">
                <label class="form-label">Centre Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name;  ?>">
                
            </div>
            <div class="mb-3">
                <label class="form-label">Opening Time</label>
                    <input type="text" class="form-control" name="opening" value="<?php echo $opening;  ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Closing Time</label>
                    <input type="text" class="form-control" name="closing" value="<?php echo $closing;  ?>">
            </div>

            <?php 
        if(!empty($successmessage)){
            echo"
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successmessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>X</button>
                    </div>
                </div>
            </div>
            ";
        }
        ?>
            <div class="row">
                <div class="col-sm-6">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                <a class="btn btn-outline-danger" href="index.php">Cancel</a>
                </div>
                </div>

        </form>
    </div>

    
    <div class="b-example-divider"></div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top fixed-bottom">
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
          <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <span class="mb-3 mb-md-0 text-body-secondary">© 2023 Saravana Kumar C</span>
      </div>
  
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="mx-3"><a class="text-body-secondary" href="https://instagram.com/sa.raw.na?igshid=MzNlNGNkZWQ4Mg=="><img src="../../img/instagram.svg" class="bi" width="24" height="24"></svg></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="https://www.linkedin.com/in/saravana-kumar-c-98144023a/"><img src="../../img/linkedin.svg" class="bi" width="24" height="24"></svg></a></li>
      </ul>
  </footer>
</body>
</html>
