<?php
include 'Navbar.php';
include 'Connexion.php';

if(isset($_POST['submit'])){
    $Matricule=$_POST['Matricule'];
    $Nom=$_POST['Nom'];
    $Prénom=$_POST['Prénom'];
    $Date=$_POST['Date'];
    $Département=$_POST['Département'];
    $Salaire=$_POST['Salaire'];
    $Fonction=$_POST['Fonction'];
    $Photo=$_FILES['Photo']['name'];
    $fileLocation='Pictures/' .$Photo;
    $NameOfPicture=$_FILES['Photo']['tmp_name'];
    


    $sql="insert into `employe` (Matricule,Nom,Prénom,Date,Département,Salaire,Fonction,Photo)
    values('$Matricule','$Nom','$Prénom','$Date','$Département','$Salaire','$Fonction','$Photo')";
    $result=mysqli_query($con,$sql);
    move_uploaded_file($NameOfPicture,$fileLocation);
    if($result){
        header('location:Display.php');
    }
    else
    {
        die(mysqli_error($con));
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Employe</title>
</head>
<style>
    #display_image{
        width: 120px;
        height: 120px;
        border : 1px solid black;
        background-position: center;
        background-size: cover;
    }
</style>
<body>
    <div class="container">
        <form method = "post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Matricule</label>
                <input type="text" class="form-control"  placeholder="Enter Matricule" name="Matricule">
                <small id="MatriculeHelp" class="form-text text-muted">You have special Matricule</small>
            </div>

            <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control"  placeholder="Enter Nom" name="Nom">
            </div>

            <div class="form-group">
                <label>Prénom</label>
                <input type="text" class="form-control"  placeholder="Enter Prénom" name="Prénom">        
            </div>

            <div class="form-group">
                <label>Date de naissance</label>
                <input type="date" class="form-control"  placeholder="Enter Date" name="Date">
            </div>

            <div class="form-group">
                <label>Département</label>
                <input type="text" class="form-control"  placeholder="Enter Département" name="Département">
            </div>

            <div class="form-group">
                <label>Salaire</label>
                <input type="text" class="form-control" placeholder="Enter Salaire" name="Salaire">
            </div>

            <div class="form-group">
                <label>Fonction</label>
                <input type="text" class="form-control" placeholder="Enter Fonction" name="Fonction">
            </div>

            <div class="form-group">
                <label>Photo</label>
                <input type="file" id="image_input" class="form-control" placeholder="Enter Photo" name="Photo" accept="image/png, image/jpg">
                <div id="display_image"></div>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>

        </form>
    </div>

    <script src="script.js"></script>

    
</body>
</html>