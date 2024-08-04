<?php
include "connection.php";
$id= $_GET['id'];

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $year_of_grad = $_POST['year_of_grad'];
    $animal_id = $_POST['animal_id'];

    $sql = "UPDATE `vet` SET `name`='$name',`gender`='$gender',`year_of_grad`='$year_of_grad',`animal_id`='$animal_id' WHERE id = $id";

    $result = mysqli_query($conn, $sql);   

    if($result) {
        header("Location: index_vet.php?msg=Vet updated succesfully");
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
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Vet Clinic Appointments</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-link" href="http://localhost/vet_clinic/index_appt.php">Appointments</a>
            <a class="nav-link active" aria-current="page" href="http://localhost/vet_clinic/index_animal.php">Animals</a>
            <a class="nav-link" href="http://localhost/vet_clinic/index_vet.php">Vets</a>
        </div>
        </div>
    </div>
    </nav>

    <div class="container">
        <div class="text-center margin-top: 5px;">
            <h3>Edit Vet Information</h3>
            <p class="text-muted">Save information after updates</p>
        </div>

        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM `vet` where id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        
        <div class="container"container d-flex justify-content-left>
            <form action="" method= "post" style="width=50vw; min-width:300px;">
                <div class="row">
                <div class="col">
                        <label class="form-label">Name</label>
                        <input type="text" class = "form-control" name = "name" value = "<?php echo $row["name"]?>">
                    </div>

                <div>

                    <div class="col">
                            <label class="form-label">Year of Graduation</label>
                            <input type="text" class = "form-control" name = "year_of_grad" value = "<?php echo $row["year_of_grad"]?>">
                    </div>
                <div>
                    <div class="col">
                        <label class="form-label">ID of Animal</label>
                        <input type="text" class = "form-control" name = "animal_id" value = "<?php echo $row["animal_id"]?>">
                        <select class="form-control" name="animal_id">
                        <?php
                            // Fetch vet data from the database (modify this query as needed)
                            $sql = "SELECT id, name FROM animal";
                            $result = mysqli_query($conn, $sql);

                            // Populate the dropdown options
                            echo '<option value="" disabled selected>**Click to see Clinic Animals and their ID**</option>';
                            while ($row_vet = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row_vet['id'] . '">' . $row_vet['id'] . ' - ' . $row_vet['name'] . '</option>';
                            }
                            
                        ?>
                    </select>
                    </div>


                    <div class="col">
                        <label>Gender</label>
                        <input type="radio" class = "form-check-input" name = "gender" id="Male" value="Male" <?php echo ($row['gender']=='Male')?"checked":"";?>>
                        <label for="Male" class = "form-input-label">Male</label>
                        <input type="radio" class = "form-check-input" name = "gender" id="Female" value="Female" <?php echo ($row['gender']=='female')?"checked":"";?>>
                        <label for="Female" class = "form-input-label">Female</label>
                    </div>

                <div>
                    <button type = "submit" class = "btn btn-success" name = "submit" style = "margin-top:8px;">Update</button>
                    <a href="index_vet.php" class = "btn btn-danger" style = "margin-top:8px;">Cancel</a>

                </div>
                </div>
            </form>
        </div>
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
</body>
</html>