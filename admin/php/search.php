<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <title>Search</title>
  <link rel = "icon" href = "../../img/icon.png" type = "image/x-icon">
  <style>
    /* Add some custom styles here */
    body {
      padding-top: 4rem;
      font-family: 'Roboto', sans-serif;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 2rem;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-primary:hover {
      background-color: #0069d9;
      border-color: #0062cc;
    }
    .table thead th {
      background-color: #007bff;
      color: #fff;
    }
    .table tbody td {
      vertical-align: middle;
    }
    .table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../../img/icon.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
        Covid Vaccination Booking
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Profile</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Vaccination centre details search</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input class="form-control me-2" type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-outline-success mx-3">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Vaccination centre</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Slot Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","mydb");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM details WHERE CONCAT(centre,name,address) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['centre']; ?></td>
                                                    <td><?= $items['name']; ?></td>
                                                    <td><?= $items['address']; ?></td>
                                                    <td><?= $items['date']; ?></td>
                                                    <td><?= $items['status']; ?></td>
                                                    <td>
                                                      <a class='btn btn-danger btn-sm' href="delete-details.php?did=<?= $items['id']; ?>&centre=<?= $items['centre']; ?>">Delete</a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan='6'>No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan='6'>Search for Centres</td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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