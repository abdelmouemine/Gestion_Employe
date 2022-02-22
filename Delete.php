<?php
include 'Connexion.php';
if(isset($_GET['Matricule'])){
    $Matricule=$_GET['Matricule'];


    $sql="DELETE FROM `employe` WHERE Matricule='$Matricule'";
    $result=mysqli_query($con,$sql);
    if($result){
  
        header('location:Display.php');
    }else{
        die(mysqli_error($con));
    }
}



?>