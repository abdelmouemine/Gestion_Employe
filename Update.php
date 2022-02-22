<?php
include 'Navbar.php';
include 'Connexion.php';
$Matricule=$_GET['updateMatricule'];

// récupérer les données et les afficher dans les inputs
$sql = "select * from `employe` where Matricule=$Matricule";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
    $Matricule=$row['Matricule'];
    $Nom=$row['Nom'];
    $Prénom=$row['Prénom'];
    $Date=$row['Date'];
    $Département=$row['Département'];
    $Salaire=$row['Salaire'];
    $Fonction=$row['Fonction'];
    $Photo=$row['Photo'];

if(isset($_POST['submit']))
{
    $Nom=$_POST['Nom'];
    $Prénom=$_POST['Prénom'];
    $Date=$_POST['Date'];
    $Département=$_POST['Département'];
    $Salaire=$_POST['Salaire'];
    $Fonction=$_POST['Fonction'];
    $Photo=$_POST['Photo'];
    
    $sql="update `employe` set Matricule='$Matricule',Nom='$Nom',Prénom='$Prénom',Date='$Date',Département='$Département',Salaire='$Salaire',Fonction='$Fonction',Photo='$Photo' where Matricule=$Matricule";
    $result=mysqli_query($con,$sql);

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
        <form method = "post">
            <div class="form-group">
                <label>Matricule</label>
                <input type="text" class="form-control"  placeholder="Enter Matricule" name="Matricule" disabled value=<?php echo $Matricule; ?>>
                <small id="MatriculeHelp" class="form-text text-muted">You have special Matricule you cannot change it</small>
            </div>

            <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control"  placeholder="Enter Nom" name="Nom" value=<?php echo $Nom; ?>>
            </div>

            <div class="form-group">
                <label>Prénom</label>
                <input type="text" class="form-control"  placeholder="Enter Prénom" name="Prénom" value=<?php echo $Prénom; ?>>        
            </div>

            <div class="form-group">
                <label>Date de naissance</label>
                <input type="date" class="form-control"  placeholder="Enter Date" name="Date" value=<?php echo $Date; ?>>
            </div>

            <div class="form-group">
                <label>Département</label>
                <input type="text" class="form-control"  placeholder="Enter Département" name="Département" value=<?php echo $Département; ?>>
            </div>

            <div class="form-group">
                <label>Salaire</label>
                <input type="text" class="form-control" placeholder="Enter Salaire" name="Salaire" value=<?php echo $Salaire; ?>>
            </div>

            <div class="form-group">
                <label>Fonction</label>
                <input type="text" class="form-control" placeholder="Enter Fonction" name="Fonction" value=<?php echo $Fonction; ?>>
            </div>

            <div class="form-group">
                <label>Photo</label>
                <input type="file" class="form-control" id="image_input" placeholder="Enter Photo" name="Photo" value=<?php echo $Photo; ?>>
                <div id="display_image"></div>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>

        </form>
    </div>

    <script src="script.js"></script>


    

    
</body>
</html>