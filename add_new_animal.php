<?php
include "connection.php";

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $species = $_POST['species'];
    $owner_name = $_POST['owner_name'];
    $vet_id = $_POST['vet_id'];

    $sql = "INSERT INTO `animal`( `name`, `date_of_birth`, `gender`, `species`, `owner_name`, `vet_id`)
     VALUES ('$name','$date_of_birth','$gender','$species','$owner_name', '$vet_id')";

    $result = mysqli_query($conn, $sql);   

    if($result) {
        header("Location: index_animal.php?msg=Animal added succesfully");
    } 
    else{
        echo "Failed: ". mysqli_error($conn);
    }
}

?>


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
    <nav class="navbar navbar-expand-lg navbar-light bg-info justify-content: right">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Vet Clinic Appointments</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav_link" href="http://localhost/vet_clinic/index_appt.php">Appointments</a>
            <a class="nav-link active" aria-current="index_animals.php" href="http://localhost/vet_clinic/index_animal.php">Animals</a>
            <a class="nav-link" href="http://localhost/vet_clinic/index_vet.php">Vets</a>
        </div>
        </div>
    </div>
    </nav>

    <div class="container">
        <div class="text-center margin-top: 5px;">
            <h3>Add New Animal</h3>
            <p class="text-muted">Complete the form below to add a new animal</p>
        </div>
        
        <div class="container"container d-flex justify-content-left>
            <form action="" method= "post" style="width=50vw; min-width:300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Name</label>
                        <input type="text" class = "form-control" name = "name" placeholder="Animal Name">
                    </div>

                <div>

                    <div class="col">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class = "form-control" name = "date_of_birth" placeholder="YYYY-MM-DD">
                    </div>
                <div>
                    <div class="col">
                        <label class="form-label">Species</label>
                        <input type="text" class = "form-control" name = "species" placeholder="ex. Dog">
                    </div>

                    <div class="col">
                        <label class="form-label">Owner Name</label>
                        <input type="text" class = "form-control" name = "owner_name" placeholder="FirstName LastName">
                    </div>

                    <div class="col">
                        <label class="form-label">Vet ID</label>
                        <input type="text" class = "form-control" name = "vet_id" placeholder="Input Vet ID">
                        <select class="form-control" name="vet_id">
                        <?php
                            // Fetch vet data from the database (modify this query as needed)
                            $sql = "SELECT id, name FROM vet";
                            $result = mysqli_query($conn, $sql);

                            // Populate the dropdown options
                            echo '<option value="" disabled selected>**Click to see Clinic Vets and their ID**</option>';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id'] . '">' . $row['id'] . ' - ' . $row['name'] . '</option>';
                            }
                            
                        ?>
                    </select>
                    </div>

                    <div class="col">
                        <label>Gender</label>
                        <input type="radio" class = "form-check-input" name = "gender" id="Male" value="Male">
                        <label for="Male" class = "form-input-label">Male</label>
                        <input type="radio" class = "form-check-input" name = "gender" id="Female" value="Female">
                        <label for="Female" class = "form-input-label">Female</label>
                    </div>

                <div>
                    <button type = "submit" class = "btn btn-success" name = "submit" style = "margin-top:8px;">Save</button>
                    <a href="index_animal.php" class = "btn btn-danger" style = "margin-top:8px;">Cancel</a>

                </div>
                </div>
            </form>
        </div>
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
</body>
</html>