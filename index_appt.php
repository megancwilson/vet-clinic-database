

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  
    <title>Vet Clinic Appointments</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Vet Clinic Appointments</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="http://localhost/vet_clinic/index_appt.php">Appointments</a>
            <a class="nav-link" href="http://localhost/vet_clinic/index_animal.php">Animals</a>
            <a class="nav-link" href="http://localhost/vet_clinic/index_vet.php">Vets</a>
        </div>
        </div>
    </div>
    </nav>

    <div class="container">
        <div class="text-center margin-top: 5px;">
            <h3>Vet Clinic Appointments</h3>

    </div>
        <?php
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>

        <a href="add_new_appt.php" class = "btn btn-dark" style = "margin-top: 10px;">Add New</a>

        <table class="table table-hover text-center" style = "margin-top: 10px;">
    <thead class = "table-success">
        <tr>
        <th scope="col">#</th> 
        <th scope="col">Date</th>
        <th scope="col">Vet</th>
        <th scope="col">Animal Name</th>
        <th scope="col">Reason</th>
        <th scope="col">Action</th>


        </tr>
    </thead>
    <tbody>
        <?php
        include "connection.php";

            $sql = "SELECT * FROM `appointment`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <th><?php echo $row['id'] ?></th>
                    <th><?php echo $row['date_of_appt'] ?></th>
                    <th><?php echo $row['vet_name'] ?></th>
                    <th><?php echo $row['animal_name'] ?></th>
                    <th><?php echo $row['reason'] ?></th>
                    <td>
                        <a href="edit_appt.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square me-3"></i></a>
                        <a href="delete_appt.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>

                <?php
            }
        ?>
      
   </tbody>
    </table>

    </div>

    
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="container">
        
    </div>
    
</body>
</html>